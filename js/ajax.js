$(function() {

  $("#comment_form").submit(function(e) { // when submit is clicked
    e.preventDefault(); // dont reload the page
    var values = $("#comment_form").serialize(); // collect form information

    var comment = $("#comment").val(); // get the comment from the input field
    $("#comment_form")[0].reset(); // reset the form
    $('#comments tbody').prepend("<tr><td></td><td>" + comment + "</td><td>just now...</td><td>X</td></tr>"); // adds a row to the table already on the page

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
});
