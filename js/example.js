$(document).ready(
  function main (event) {
    $("#box1").mouseover(function () {
       $("#box1").addClass("mouseover");
    });
  }
);

/*
document.addEventListener("DOMContentLoaded", main);

function main (event) {
  var box = document.getElementById("box1");
  box.addEventListener("mouseleave", changeColor);
}

function changeColor (event) {
  event.target.style.backgroundColor = "blue";
}*/
