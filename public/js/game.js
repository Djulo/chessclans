Pusher.logToConsole = true;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

if (document.getElementById("board")) {
    var board,
        game = new Chess(),
        statusEl = $('#status'),
        fenEl = $('#fen'),
        pgnEl = $('#pgn'),
        color;

    var state = game.fen();

    let url = "" + window.location;
    let id = url.split('/')[3];
    let format = "" + document.getElementById('format').value;
    format = format.split('+');

    Echo.channel(`game.${id}.${format[0]}.${format[1]}`)
        .listen('.move.played', (e) => {
            game.load(e['move'].fen);
            board.position(e['move'].fen);
        });

    Echo.channel(`game.${id}.${format[0]}.${format[1]}`)
        .listen('.timer.clicked', (e) => {
            // alert(e);
            document.getElementById(e.timer).click();
        })


    $.ajax({
        url: '/turn',
        type: 'POST',
        async: false,
        data: { id: id },
        success: function (response) {
            color = response;
            console.log(color);
        }
    });

    // do not pick up pieces if the game is over
    // only pick up pieces for the side to move
    var onDragStart = function (source, piece, position, orientation) {

        if (game.game_over() === true ||
            game.turn() !== color ||
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
        state = game.fen();
    };

    // update the board position after the piece snap
    // for castling, en passant, pawn promotion
    var onSnapEnd = function () {
        board.position(game.fen());
    };

    var updateStatus = function () {
        var status = '';
        var fen = game.fen();
        let url = "" + window.location;
        let id = url.split('/')[3];

        var moveColor = 'White';
        if (game.turn() === 'b') {
            moveColor = 'Black';
            document.getElementById("p1").click();
            $.ajax({
                url: '/timer',
                type: 'POST',
                data: { id: id, timer: "p1"},
                success: function (response) {
                    // console.log('timer response');
                }
            });
        }
        else {
           document.getElementById("p2").click();
           $.ajax({
            url: '/timer',
            type: 'POST',
            data: { id: id, timer: "p2"},
            success: function (response) {
                // console.log('timer response');
            }
        });
        }
        // checkmate?
        if (game.in_checkmate() === true) {
            status = 'Game over, ' + moveColor + ' is in checkmate.';
            alert(status);
        }
        // draw?
        else if (game.in_draw() === true) {
            status = 'Game over, drawn position';
            alert(status);
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
        state = game.fen();
        //ovo je moje da posaljem potez
        $.ajax({
            url: '/move',
            type: 'POST',
            data: { fen: fen, id: id },
            success: function (response) {
                // console.log('response');
            }
        });

    };

    var cfg = {
        draggable: true,
        position: state,
        onDragStart: onDragStart,
        onDrop: onDrop,
        onSnapEnd: onSnapEnd,
        orientation: (color === 'b') ? 'black' : 'white'
    };
    board = ChessBoard('board', cfg);

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

}
