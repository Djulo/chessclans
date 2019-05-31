/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/game.js":
/*!******************************!*\
  !*** ./resources/js/game.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

if (document.getElementById("board")) {
  var next = function next() {
    ++i;
    var url = "" + window.location;
    var id = url.split('/')[3];
    $.ajax({
      url: 'analyse/' + id + 'next',
      type: 'post',
      data: {
        next: i,
        id: i
      },
      success: function success(response) {
        //console.log(response);
        board.position(response);
      }
    });
  };

  var prev = function prev() {
    --i;
    $.ajax({
      url: 'analyse/' + id + 'next',
      type: 'post',
      data: {
        next: i,
        id: i
      },
      success: function success(response) {
        //console.log(response);
        board.position(response);
      }
    });
  };

  var board,
      game = new Chess(),
      statusEl = $('#status'),
      fenEl = $('#fen'),
      pgnEl = $('#pgn'); // do not pick up pieces if the game is over
  // only pick up pieces for the side to move

  var onDragStart = function onDragStart(source, piece, position, orientation) {
    if (game.game_over() === true || game.turn() === 'w' && piece.search(/^b/) !== -1 || game.turn() === 'b' && piece.search(/^w/) !== -1) {
      return false;
    }
  };

  var onDrop = function onDrop(source, target) {
    // see if the move is legal
    var move = game.move({
      from: source,
      to: target,
      promotion: 'q' // NOTE: always promote to a queen for example simplicity

    }); // illegal move

    if (move === null) return 'snapback';
    updateStatus();
  }; // update the board position after the piece snap
  // for castling, en passant, pawn promotion


  var onSnapEnd = function onSnapEnd() {
    board.position(game.fen());
  };

  var updateStatus = function updateStatus() {
    var status = '';
    var moveColor = 'White';

    if (game.turn() === 'b') {
      moveColor = 'Black';
    } // checkmate?


    if (game.in_checkmate() === true) {
      status = 'Game over, ' + moveColor + ' is in checkmate.';
    } // draw?
    else if (game.in_draw() === true) {
        status = 'Game over, drawn position';
      } // game still on
      else {
          status = moveColor + ' to move'; // check?

          if (game.in_check() === true) {
            status += ', ' + moveColor + ' is in check';
          }
        }

    statusEl.html(status);
    fenEl.html(game.fen());
    pgnEl.html(game.pgn()); //ovo je moje da posaljem potez

    var sendMove = game.fen();
    var url = "" + window.location;
    var id = url.split('/')[3];
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: '/move',
      type: 'POST',
      data: {
        fen: sendMove,
        id: id
      },
      success: function success(response) {
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
  Echo["private"]("game.".concat(gameId)).listen('.game.created', function (e) {
    alert('Game Created');
    console.log('game created');
  }).listen('.move.played', function (e) {
    alert('Move played');
    console.log('move played');
  });
  var i = 0;
  updateStatus();
}

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/game.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\laragon\www\chessclans\resources\js\game.js */"./resources/js/game.js");


/***/ })

/******/ });