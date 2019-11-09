$(function() {
    var body = $('body');
    var backgrounds = new Array(
    'url(./img/backgrounds/futuristic-city-other-planet_1441-2819.jpg)',
    'url(./img/backgrounds/girl-selfie-coliseum-sci-fi-background_33099-2107.jpg)',
    'url(./img/backgrounds/robot-war-alien-planet_1441-2743.jpg)',
    'url(./img/backgrounds/vector-game-room-with-people-playing-digital-entertainment-modern-esports-concept_33099-1204.jpg)',
    );
    var current = 0;
    
    function nextBackground() {
    body.css(
    'background',
    backgrounds[current = ++current % backgrounds.length]
    );
    
    setTimeout(nextBackground, 5000);
    }
    setTimeout(nextBackground, 5000);
    body.css('background', backgrounds[0],);
    });