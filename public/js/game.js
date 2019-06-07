Pusher.logToConsole = true;
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

if (document.getElementById("board")) {
    var board,
        boardEl = $('#board'),
        game = new Chess(),
        statusEl = $('#status'),
        fenEl = $('#fen'),
        pgnEl = $('#pgn'),
        color;

    var removeGreySquares = function() {
        $('#board .square-55d63').css('background', '');
        };

    var greySquare = function(square) {
    var squareEl = $('#board .square-' + square);

    var background = '#a9a9a9';
    if (squareEl.hasClass('black-3c85d') === true) {
        background = '#696969';
    }

    squareEl.css('background', background);
    };

    var removeHighlights = function(color) {
        boardEl.find('.square-55d63')
            .removeClass('highlight-' + color);
    };

    var state = game.fen();

    let url = "" + window.location;
    let id = url.split('/')[3];
    let format;

    if(document.getElementById('format')){
        format = "" + document.getElementById('format').value;
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
        });

        Echo.channel(`game.${id}.${format[0]}.${format[1]}`)
        .listen('.status.updated', (e) => {
            console.log(e);
            document.getElementById("setResults").innerHTML=e.status;
        });

        Echo.channel(`game.${id}.${format[0]}.${format[1]}`)
        .listen('.joined.successfully', (e) => {
            alert('Opponent joined');
        });

        Echo.channel(`game.${id}.${format[0]}.${format[1]}`)
        .listen('.game.ended', (e) => {
            document.getElementById("pause").click();
        });

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

    }

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
    var onMouseoverSquare = function(square, piece) {
        // get list of possible moves for this square
        var moves = game.moves({
          square: square,
          verbose: true
        });

        // exit if there are no moves available for this square
        if (moves.length === 0) return;

        // highlight the square they moused over
        greySquare(square);

        // highlight the possible squares for this piece
        for (var i = 0; i < moves.length; i++) {
          greySquare(moves[i].to);
        }
      };

      var onMouseoutSquare = function(square, piece) {
        removeGreySquares();
      };


    var onDrop = function (source, target) {
        removeGreySquares();

        // see if the move is legal
        var move = game.move({
            from: source,
            to: target,
            promotion: 'q' // NOTE: always promote to a queen for example simplicity
        });

        // illegal move
        if (move === null) return 'snapback';

        color = (color = 'w') ? 'white' : 'black';
        removeHighlights(color);
        boardEl.find('.square-' + source).addClass('highlight-' + color);
        boardEl.find('.square-' + target).addClass('highlight-' + color);

        updateStatus();
        state = game.fen();
    };

    // update the board position after the piece snap
    // for castling, en passant, pawn promotion
    var onSnapEnd = function () {
        board.position(game.fen());
    };

    let moveColor;
    var setGameEnd = function (winner) {
        //alert(winner);
        document.getElementById("gameId").value=id;
        document.getElementById("winner").value=winner;
        //onaj ciji je moveColor je izugbio
        //funkc vraca 0 ako su stringovi isti

        document.getElementById("pause").click();

        //document.getElementById("completeGame").click();
        $.ajax({
            url: '/gameEnd',
            type: 'POST',
            data: { gameId: id, winner: winner},
            success: function (response) {
                // console.log('timer response');
            }
        });

        $.ajax({
            url: '/status',
            type: 'POST',
            data: { id: id, status:document.getElementById("setResults").innerHTML},
            success: function (response) {
                // console.log('timer response');
            }
        });

        return true;

    };

    let updateStatus = function () {

        let status = '';
        let fen = game.fen();
        let url = "" + window.location;
        let id = url.split('/')[3];

     //   document.getElementById("nesto").innerHTML=id;
        moveColor = (game.turn() == 'w') ? 'White' : 'Black';

        document.getElementById("p1").click();
        $.ajax({
            url: '/timer',
            type: 'POST',
            data: { id: id, timer: "p2"},
            success: function (response) {
                // console.log('timer response');
            }
        });

        // checkmate?
        if (game.in_checkmate() === true) {
            status = 'Game over, ' + moveColor + ' is in checkmate.'
            if(moveColor.localeCompare('Black')){
              setGameEnd(2);
            }
          else {
            setGameEnd(1);
          }


           // alert(status);
        }
        // draw?
        else if (game.in_draw() === true) {
            status = 'Game over, drawn position';
            if(moveColor.localeCompare('Black')){
                setGameEnd(2);
              }
            else {
              setGameEnd(1);
            }
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
        document.getElementById("setResults").innerHTML=status;
        $.ajax({
            url: '/status',
            type: 'POST',
            data: { id: id, status:status},
            success: function (response) {
                // console.log('timer response');
            }
        });

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
        onMouseoutSquare: onMouseoutSquare,
        onMouseoverSquare: onMouseoverSquare,
        onSnapEnd: onSnapEnd,
        orientation: (color === 'b') ? 'black' : 'white'
    };
    board = ChessBoard('board', cfg);

    if(document.getElementById('format')){
        $.ajax({
            url: '/state',
            type: 'POST',
            async: false,
            data: { id: id },
            success: function (response) {
                game.load(response);
                board.position(response);
            }
        });
    }

    var i = 0;

    function next() {
        // console.log('ulaz next id: ' + i);
        moves = document.getElementById('fen').value;
        moves = moves.split(',');
        if(i >= moves.length -1) return;
        i++;
        game.load(moves[i]);
        board.position(moves[i]);
        // console.log('izlaz next id: ' +i);
    }

    function prev() {
        if(i <= 0) return;
        i--;
        // console.log('ulaz prev id: ' + i);
        moves = document.getElementById('fen').value;
        moves = moves.split(',');
        game.load(moves[i]);
        board.position(moves[i]);
        // console.log('izlaz prev id: ' + i);
    }

}
