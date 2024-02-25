$(document).ready(function() {
  scrollNav();
});

//collapse the navbar on scroll
var menu_collapse = function(){
  if ($(".navbar").offset().top > 50) {
    $(".navbar-fixed-top").addClass("top-nav-collapse");
  } else {
    $(".navbar-fixed-top").removeClass("top-nav-collapse");
  }
}
if ($(window).width() >= 768) {
  $(window).bind( "scroll", menu_collapse );
}

$( window ).resize(function() {
  if ($(window).width() >= 768) {
    $(window).bind( "scroll", menu_collapse );
    if ($(".navbar").offset().top > 50) {
      $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
      $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
  } else {
    $(window).unbind( "scroll", menu_collapse );
  }
});

function scrollNav() {
  $(".js-navbar-brand, .js-scroll-nav").on("click", function(e){
    e.preventDefault();
    var $anchor = $(this).attr("href");

    $("html, body").animate({
      scrollTop: $($anchor).offset().top - 57
    });
  });
}

function animate() {
  $(window).scroll(function() {
    var $speed = 1.3;
    var $anchorpoint = ($('.js-parallax').height() - ($(window).scrollTop() + 600)) / 2;
    var $position = 1;

    var $x = 0;
    var $y = ($position - $anchorpoint / $speed) + $anchorpoint;
    var $z = 0;

    var $translate3dValues = "translate3d(" + $x + ", " + $y + "px, " + $z + ")";
    $(".js-parallax").css("transform", $translate3dValues);
  });
}