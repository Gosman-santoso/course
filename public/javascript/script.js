$(function() {
  $(document).scroll(function() {
    var $nav = $(".navbar-section");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});
