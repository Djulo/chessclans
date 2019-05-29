//ovo je kod da se igra protiv random-a
/*if (document.getElementById("board")){
  var board,
  game = new Chess();

  // do not pick up pieces if the game is over
  // only pick up pieces for White
  var onDragStart = function(source, piece, position, orientation) {
    if (game.in_checkmate() === true || game.in_draw() === true ||
      piece.search(/^b/) !== -1) {
       
      return false;
    }
  };

  var makeRandomMove = function() {
    var possibleMoves = game.moves();

    // game over
    if (possibleMoves.length === 0) {
    alert("kraj igre");
    return;
    }

    var randomIndex = Math.floor(Math.random() * possibleMoves.length);
    game.move(possibleMoves[randomIndex]);
    board.position(game.fen());
  };

  var onDrop = function(source, target) {
    // see if the move is legal
   
    var move = game.move({
      from: source,
      to: target,
      promotion: 'q' // NOTE: always promote to a queen for example simplicity
    });

    // illegal move
    if (move === null) return 'snapback';

    // make random legal move for black
    //ovde da ubacim da sad igra beli ? 
   // window.setTimeout(makeRandomMove, 250);
  };

  // update the board position after the piece snap
  // for castling, en passant, pawn promotion
  var onSnapEnd = function() {
    board.position(game.fen());
  };

  var cfg = {
    draggable: true,
    position: 'start',
   // orientation: 'black',
    onDragStart: onDragStart,
    onDrop: onDrop,
    onSnapEnd: onSnapEnd
  };
  board = ChessBoard('board', cfg);
}*/


if(document.getElementById("board")){
var board,
  game = new Chess(),
  statusEl = $('#status'),
  fenEl = $('#fen'),
  pgnEl = $('#pgn');

// do not pick up pieces if the game is over
// only pick up pieces for the side to move
var onDragStart = function(source, piece, position, orientation) {
  if (game.game_over() === true ||
      (game.turn() === 'w' && piece.search(/^b/) !== -1) ||
      (game.turn() === 'b' && piece.search(/^w/) !== -1)) {
    return false;
  }
};

var onDrop = function(source, target) {
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
var onSnapEnd = function() {
  board.position(game.fen());
};
/*function showCustomer(str) {
  var xhttp; 
 
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
 // xhttp.open("GET", "getcustomer.php?q="+str, true);
 xhttp.open("GET", "getcustomer.php?q="+str, true);
  xhttp.send();
}*/

var updateStatus = function() {
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
  //stanje table
 
  statusEl.html(status);
  fenEl.html(game.fen());
  pgnEl.html(game.pgn());
  //ovo je moje da posaljem potez
  var sendMove=game.fen();
  //alert(status);
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $.ajax({
    
    url: 'game/move',
    type: 'post',
    data: { "moveIs": sendMove},
    success: function(response) { console.log(response); }
});
};
var state="rnbqkbnr/pp2pppp/2p5/3p4/3P4/4P3/PPP2PPP/RNBQKBNR w KQkq - 0 3";
var cfg = {
  draggable: true,
  position: 'start',
  onDragStart: onDragStart,
  onDrop: onDrop,
 // position: state,
  onSnapEnd: onSnapEnd
};
board = ChessBoard('board', cfg);
//staticko i, daj boze

var i=0;

function next(){


++i;
//alert(i);
  $.ajax({
    
    url: 'game/next',
    type: 'post',
    data: { "next": i},
    success: function(response) { console.log(response);
      
      board.position(response);
   /*  var cfg = {
        draggable: true,
      //  position: 'start',
        onDragStart: onDragStart,
        onDrop: onDrop,
        position: response,
        onSnapEnd: onSnapEnd
      };
      board = ChessBoard('board', cfg);
      
      */
     }
});

 // var nextFen = <?= $games[$iter]->move ?>
  //alert(nextFen);
 // game.load(nextFen);
 //var nextFen="rnbqkbnr/pp2pppp/2p5/3p4/3P4/4P3/PPP2PPP/RNBQKBNR w KQkq - 0 3";
 //board.position(nextFen);
  //alert("svetaaa");
}
function prev(){


  --i;
  //alert(i);
    $.ajax({
      
      url: 'game/next',
      type: 'post',
      data: { "next": i},
      success: function(response) { console.log(response);board.position(response); }
  });
  
   // var nextFen = <?= $games[$iter]->move ?>
    //alert(nextFen);
   // game.load(nextFen);
   //var nextFen="rnbqkbnr/pp2pppp/2p5/3p4/3P4/4P3/PPP2PPP/RNBQKBNR w KQkq - 0 3";
   //board.position(nextFen);
    //alert("svetaaa");
  }
updateStatus();
//To do: dodaj dugme da npr nastavi igru od te pozicije..;
}