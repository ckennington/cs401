
  /*
  $("#comment_form").submit(function( event ) {
    var values = $("#comment_form").serialize();
    var comment = $("#comment").val();
    $.ajax({
      type: "POST",
      url: "handler.php",
      data: values,
      success: function() {
        $('#newsletter tbody').prepend("<tr><td>" + 
          comment + "</td><td>Just now</td></tr>");
        $('#comment').val('');
        $('#age').val('');
      },
      error: function () {
        alert("FAILURE");
      }               
    });
    return false;
  });
  */
