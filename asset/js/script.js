    new Swiper(".card-slider", {
      slidesPerView: 1.25,
      spaceBetween: 20,
      loop: false,
      autoplay: false,
      grabCursor: true,  
      rtl: true,
      breakpoints: {
        640: {
          slidesPerView: 2.25,
        },
        1024: {
          slidesPerView: 3.25,
        }
      }
    });