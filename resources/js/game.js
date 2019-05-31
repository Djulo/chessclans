
if (document.getElementById("board")) {
    var board,
        game = new Chess(),
        statusEl = $('#status'),
        fenEl = $('#fen'),
        pgnEl = $('#pgn');

    // do not pick up pieces if the game is over
    // only pick up pieces for the side to move
    var onDragStart = function (source, piece, position, orientation) {
        if (game.game_over() === true ||
            (game.turn() === 'w' && piece.search(/^b/) !== -1) ||
            (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
            return false;
        }
    };

    var onDrop = function (source, target) {
        // see if the move is legal
        var move = game.move({
            from: source,
            to: target,
            promotion: 'q' // NOTE: always promote to a queen for example simplicity
        });

        // illegal move
        if (move === null) return 'snapback';

        updateStatus();
    };

    // update the board position after the piece snap
    // for castling, en passant, pawn promotion
    var onSnapEnd = function () {
        board.position(game.fen());
    };

    var updateStatus = function () {
        var status = '';

        var moveColor = 'White';
        if (game.turn() === 'b') {
            moveColor = 'Black';
        }

        // checkmate?
        if (game.in_checkmate() === true) {
            status = 'Game over, ' + moveColor + ' is in checkmate.';
        }

        // draw?
        else if (game.in_draw() === true) {
            status = 'Game over, drawn position';
        }

        // game still on
        else {
            status = moveColor + ' to move';

            // check?
            if (game.in_check() === true) {
                status += ', ' + moveColor + ' is in check';
            }
        }

        statusEl.html(status);
        fenEl.html(game.fen());
        pgnEl.html(game.pgn());
        //ovo je moje da posaljem potez
        var sendMove = game.fen();
        let url = "" + window.location;
        let id = url.split('/')[3];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/move',
            type: 'POST',
            data: { fen: sendMove, id: id },
            success: function (response) {
                //alert('success');
                console.log('response');
            }
        });

    };
    var state = "rnbqkbnr/pp2pppp/2p5/3p4/3P4/4P3/PPP2PPP/RNBQKBNR w KQkq - 0 3";
    var cfg = {
        draggable: true,
        position: 'start',
        onDragStart: onDragStart,
        onDrop: onDrop,
        // position: state,
        onSnapEnd: onSnapEnd
    };
    board = ChessBoard('board', cfg);

    var url = "" + window.location;
    var gameId = url.split('/')[3];

    Echo.private(`game.${gameId}`)
        .listen('.game.created', (e) => {
            alert('Game Created');
            console.log('game created');
        })
        .listen('.move.played', (e) => {
            alert('Move played');
            console.log('move played');
        });


    var i = 0;

    function next() {
        ++i;
        let url = "" + window.location;
        let id = url.split('/')[3];
        $.ajax({
            url: 'analyse/' + id + 'next',
            type: 'post',
            data: { next:i, id:i },
            success: function (response) {
                //console.log(response);
                board.position(response);
            }
        });
    }

    function prev() {
        --i;
        $.ajax({
            url: 'analyse/' + id + 'next',
            type: 'post',
            data: { next:i, id:i},
            success: function (response) {
                //console.log(response);
                board.position(response);
            }
        });
    }

    updateStatus();
}
