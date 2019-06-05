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

    let moveColor;
    var setGameEnd = function (winner) {
        //alert(winner);
        document.getElementById("gameId").value=id;
        document.getElementById("winner").value=winner;
        //onaj ciji je moveColor je izugbio
        //funkc vraca 0 ako su stringovi isti
        
        document.getElementById("pause").click();

        document.getElementById("completeGame").click();
        
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
            document.getElementById("setResults").innerHTML=status;
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
            document.getElementById("setResults").innerHTML=status;
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
