$(function() {
  $("#hello").click(function () {
    $("#subtitle").toggleClass("active");
  });

  $('.message').delay(3000).fadeOut('slow').delay(1000).fadeIn(3000);
});
