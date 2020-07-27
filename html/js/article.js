  
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        loop: true,
        spaceBetween: 20,
        centeredSlides: false,
        pagination: {
        el: '.swiper-pagination',
        clickable: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
