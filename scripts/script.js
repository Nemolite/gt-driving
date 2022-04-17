$(document).ready(function(){
  $('.otziv-slider-class').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    //autoplaySpeed: 2000,
    prevArrow: $('.slider-arows-left'),
    nextArrow: $('.slider-arows-right'),
    responsive: [    
      {
        breakpoint: 727,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});

