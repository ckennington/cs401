$(function() {
  console.log("ran the javascript code on the comments page");
  $(".close").click(function() {
    $(this).parent().fadeOut();
  });

  
  $("#comment_form").submit(function( event ) {
    var values = $("#comment_form").serialize();
    var comment = $("#comment").val();
    var name = $("#name").val();
    $('#comments_table tbody').prepend("<tr><td>" + 
      name + "</td><td>" + comment + "</td><td>Just now</td><td>Delete</td></tr>");
    $('#comment').val('');
    $('#name').val('');
    $.ajax({
      type: "POST",
      url: "handler.php",
      data: values,
      success: function() {
      },
      error: function () {
        alert("FAILURE");
      }               
    });
    return false; // return without letting the html for submit again
  });
});

