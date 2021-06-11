$(function() {
  $(document).scroll(function() {
    var $nav = $(".navbar-section");
    $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
  });
});

// $(".list-container .list").click(function() {
//   $(".list-container .list").removeClass("active");
//   $(this).addClass("active");
// });
