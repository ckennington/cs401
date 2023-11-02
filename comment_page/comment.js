$(document).ready(function() {
  $("#message").click(function() {
     $('#message').fadeOut("fast"); 
  });

  $("#comment_form").submit(function(e) {
    e.preventDefault(); // dont reload the page
    var values = $("#comment_form").serialize();
    var name = $("#name").val(); // get the name from the input field
    var comment = $("#comment").val(); // get the comment from the input field
    console.log(comment);

    $('#comments tbody').prepend("<tr><td>" + name + "</td><td>" + comment + "</td><td>just now...</td><td></td><td>X</td></tr>"); // adds a row to the table already on the page

    $.ajax({ // perform AJAX call to PHP
        type: "POST", 
        url: "comment_handler.php",
        data: values,
        success: function() { // when HTTP 200 is returned from url
        },
        error: function () { // anything besides 200 is returned from url
          alert("FAILURE");
        }
      });
 });
})
