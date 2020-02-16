var isFlying = false;

(function () {
    birdClick();
})();

function getNewPosition() {

    var h = $(window).height() - 150;
    var w = $(window).width() - 150;

    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w);

    return [nh, nw];

}

function getPositionOutsideScreen() {

    var h = $(window).height() - 150;
    var w = $(window).width() - 150;
    var nh = Math.floor(Math.random() * h);
    var nw = Math.floor(Math.random() * w);

    var side = (Math.floor(Math.random() * 4));
    side = 3;
    switch (side) {
        case 0: {//top
            nh = -150;
            break;
        }
        case 1: {//bottom
            nh = $(window).height(); 
            break;
        }
        case 2: {//right
            nw = $(window).width() ;
            break;
        }
        case 3: {//left
            nw = -150;
            break;
        }
    }
    return [nh, nw];
}

function animateBird(fun) {
    let newPosition = fun;
    $('.bird').animate({
        top: newPosition[0],
        left: newPosition[1],
    }, 1000, function () {
        $('.bird').removeClass('flying').addClass('standing');
    });
}

function moveBird(fun) {
    let newPosition = fun;
    $('.bird').css({
        top: newPosition[0],
        left: newPosition[1]
    });
}

$('.bird').click(function () {
    birdClick()
});

function birdClick() {
    moveBird(getPositionOutsideScreen());
    $('.bird').removeClass('standing').addClass('flying');
    setTimeout(function () {
        animateBird(getNewPosition());
    }, Math.random() * 3000 + 6000);
}