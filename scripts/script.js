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

$(document).ready(function(){
  $('.our_auto-inner-basa').each(function (index, value) { 
    console.log(index + ':' + value); 
    $(this).hover(
      function () {          
          $(this).children('.our_auto-img').children('.our_auto-inner-title').hide(1000);
          $(this).children('.our_auto-inner').show(1000);
      },
      function () {
        $(this).children('.our_auto-img').children('.our_auto-inner-title').show(1000);
          $(this).children('.our_auto-inner').hide(1000);                
          
      });
  });
});



