document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById("js_button").onclick = function() {
    document.getElementById("js_button").className = "blue"; 
    console.log("button clicked");
  };
});
