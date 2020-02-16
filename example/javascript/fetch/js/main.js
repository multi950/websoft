/**
 * @preserve Made by dbwebb-staff, staff@dbwebb.se
 */
(function () {
    'use strict';

    //var myContent = document.getElementById('content');
    // var flagTarget = document.getElementById('flag');
    // var flagLink = document.getElementById('draw-elfenbenskusten');

    //myContent.innerHTML = '<h3>This is a MEGA template!</h3>';

    // function drawFlagElfenbenskusten()  {
    //     var flagElfenbenskusten = '<div class="flag elfenbenskusten"><div class="part1"></div>' +
    //     '<div class="part2"></div></div>';
    // 
    //     console.log("Drawing flag");
    //     flagTarget.innerHTML = flagElfenbenskusten;
    // }
    // 
    // 
    // flagLink.addEventListener("click", function () {
    //     console.log("Event for clicking link elfenbenskusten.");
    //     drawFlagElfenbenskusten();
    // });

//    fetch('https://api.scb.se/UF0109/v2/skolenhetsregister/sv/kommun/1081')
    fetch('data/1081.json')
        .then((response) => {
            return response.json();
        })
        .then((myJson) => {
            console.log(myJson);
                appendData(myJson);
        });

    console.log('Sandbox MEGA is ready!');

})();

function appendData(data) {
    var mainContainer = document.getElementById('content');
    for (var i = 0; i < data.Skolenheter.length; i++) {
      var div = document.createElement("div");
      div.innerHTML = 'School name ' + data.Skolenheter[i].Skolenhetsnamn + ', school code: ' + data.Skolenheter[i].Skolenhetskod;
      mainContainer.appendChild(div);
    }
  }