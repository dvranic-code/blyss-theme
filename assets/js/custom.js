

(function($){

    // function for grabbing error messages
    function blyssDebug(msg, data) {
        try {
            console.log(msg);
            if (typeof data !== 'undefined') {
                console.log(data);
            }
        } catch (e) {
            
        }
    }

    var burgerMenu = document.querySelector('.burger-menu');


//    event listeners
    function loadEvents() {
    //    burger menu click
        burgerMenu.addEventListener('click', toggleMobMenu);
    }
    loadEvents();

//    Show and hide main menu
    function toggleMobMenu() {

        $('.burger-menu').toggleClass('change');
        $('.site-header').toggleClass('header-change');

    }

    // Desktop menu shrink
    $(window).scroll(function() {
        var $height = $(window).scrollTop();
        if ($height > 80) {
            $('.site-header').addClass('header-small');
        } else {
            $('.site-header').removeClass('header-small');
        }
    });

}(jQuery));

//    Post Blyss Galerry
if (document.querySelector('.blyss-slide') !== null ) {

    console.log('Prikolica');

    var slideIndex = 1;
    showSlides(slideIndex);

    function blyssPlusSlides(n) {
        showSlides(slideIndex += n);
    }

    function blyssCurrentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("blyss-slide");

        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex - 1].style.display = "block";

    }
}

if (document.querySelector('.hero-slide') !== null) {

    console.log('naslovna');

    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("hero-slide");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}
        x[myIndex-1].style.display = "block";
        setTimeout(carousel, 4000); // Change image every 2 seconds
    }
}


