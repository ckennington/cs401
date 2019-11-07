$(function() {
  $("#comment_form").submit(function(e) {
    e.preventDefault();
    e.stopPropagation();
    var values = $("#comment_form").serialize();
    var comment = $("#comment").val();
    $("#comment_form")[0].reset();
    $('#comments tbody').prepend("<tr><td>" +
       comment + "</td><td>Just now</td></tr>");
    $('#comment').val('');
    $.ajax({
      type: "POST",
      url: "comment_handler.php",
      data: values,
      success: function() {
      },
       error: function () {
        alert("FAILURE");
      }
    });
    return false;
  });
});
