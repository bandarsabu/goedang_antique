$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top"); // navbar-fixed-top
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});

