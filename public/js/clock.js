/**
 * Fajl za kontrolu tajmera za sah;
 * Autori:Svetozar Micanovic, Stefan Pusica
 */

 /**
  * funkcija za formatiranje vremena
  */
(function () {
    // format duration as string
    var displayTime, getTimeString, resetButtonClasses, toggleButtons;

    getTimeString = function (time) {
      var secs;
      secs = time.get('seconds');
      if (secs < 10) {
        secs = `0${secs}`;
      }
      return `${time.get('minutes')}:${secs}`;
    };

    /**
     * funkcija koja radi sa buttonima za kontrolu tajmera
     */
    // toggle classes and disabled props of buttons
    toggleButtons = function (elem) {
      if (elem === "right") {
        // props
        $("#left .toggle").prop("disabled", false);
        $("#right .toggle").prop("disabled", true);
        //AE OVDE ZA VREME
        // moment.duration(
        // classes
        $("#right .toggle").addClass("btn-default btn-disabled");
        $("#right .toggle").removeClass("btn-primary");
        return $("#left .toggle").addClass("btn-primary");
      } else if (elem === "left") {
        // props
        $("#left .toggle").prop("disabled", true);
        $("#right .toggle").prop("disabled", false);

        // classes
        $("#left .toggle").addClass("btn-default btn-disabled");
        $("#left .toggle").removeClass("btn-primary");
        return $("#right .toggle").addClass("btn-primary");
      }
    };
    let url = "" + window.location;
    let id = url.split('/')[3];

/**
 * funkcija koja resetuje tajmere
 */
    // restores both toggles to original state
    resetButtonClasses = function () {
      $("#left input").addClass("btn-primary");
      $("#left input").removeClass("btn-default btn-disabled");
      $("#right input").addClass("btn-primary");
      return $("#right input").removeClass("btn-default btn-disabled");
    };

/**
 * funkcija za prikaz vremena
 */
    // change the time shown on page
    displayTime = function (elem, time) {
      return $(elem).html(getTimeString(time));
    };

    var leftTimer, resetAll, rightTimer, t1, t2,increment;
    // doc ready
    jQuery(function ($) {


      // init timers
      t1 = moment.duration(parseInt($('#time-input').val()), "minutes");
      t2 = moment.duration(parseInt($('#time-input').val()), "minutes");
      increment = moment.duration(parseInt($('#increment-input').val()), "seconds");
      displayTime("#left .time", t1);
      displayTime("#right .time", t2);



      // set right timer
      rightTimer = $('#right .toggle').on('click', function () {


     //   alert("GORNJI tajmer");
       //alert(  t1.minutes()*60+t1.seconds());
       t1.add(moment.duration(increment,'s'));
       displayTime("#left .time", t1);
       //alert(  t1.minutes()*60+t1.seconds());
       //ovde dodao da poveca vreme..
       // t1.add(moment.duration(5,'s'));
      //  t2.add(moment.duration(5,'s'));
        // pause other timer
       // t1.add(moment.duration(5,'s'));
       // t2.add(moment.duration(5,'s'));
    //   alert(t1);
        if (leftTimer) {
          clearInterval(leftTimer);
          toggleButtons("right");

        }
        /**
         * funkcija za setovanje vremena na desnom tajmeru
         */
        return rightTimer = setInterval(function () {
          if (t2.as('seconds') > 0) {
            t2.subtract(moment.duration(1, 's'));
            return displayTime("#right .time", t2);
          } else {
          //  window.location.href = "/gameEnd";
            //alert("Isteklo je vreme belom igracu");
            document.getElementById("setResults").innerHTML="Time expired for white player";
            //exit();
            clearInterval(rightTimer);
            clearInterval(leftTimer);
            setGameEnd(2);
            return;
            return clearInterval(self);
          }
        }, 1000);
      });
/**
 * funkcija za setovanje vremena na levom tajmeru
 */
      // set left timer
      leftTimer = $('#left .toggle').on('click', function () {
       // alert("Donji tajmer");
        //t1.add(moment.duration(5,'s'));
        // t2.add(moment.duration(5,'s'));
        t2.add(moment.duration(increment,'s'));
        displayTime("#right .time", t2);
        if (rightTimer) {
          clearInterval(rightTimer);
          toggleButtons("left");
          //t1.add(moment.duration(5,'s'));


        }
        return leftTimer = setInterval(function () {
          if (t1.as('seconds') > 0) {
            t1.subtract(moment.duration(1, 's'));
            return displayTime("#left .time", t1);
          } else {
            document.getElementById("setResults").innerHTML="Time expired for black player";
            //exit();
            clearInterval(rightTimer);
            clearInterval(leftTimer);
            setGameEnd(1);
            return;
            return clearInterval(self);
          }
        }, 1000);
      });
      /**
       * funkcija za pauziranje tajmera
       */
      // pause timer for active player
      $("#pause").on('click', function () {
        if ($("#left .toggle").prop === "disabled") {
          toggleButtons("left");
        } else {
          toggleButtons("right");
        }
        clearInterval(leftTimer);
        return clearInterval(rightTimer);
      });
      /**
       * funkcija za resetovanje tajmera
       */
      // reset both timers and toggles
      $("#reset").on('click', function () {
        $('#time-input').val(20);
        return resetAll(20);
      });
      $('#time-input').on('change', function () {
        return resetAll(parseInt($('#time-input').val()));
      });

      /**
       * funkcija za resetovanje svega
       */
      return resetAll = function (minutes) {
        clearInterval(leftTimer);
        clearInterval(rightTimer);
        t1 = moment.duration(minutes, "minutes");
        t2 = moment.duration(minutes, "minutes");
        displayTime("#left .time", t1);
        displayTime("#right .time", t2);

        // reset disabled property
        $("#left input").prop("disabled", false);
        $("#right input").prop("disabled", false);

        // reset button classes
        return resetButtonClasses();
      };
    });

  }).call(this);

  //# sourceURL=coffeescript
