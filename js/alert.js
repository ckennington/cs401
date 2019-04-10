window.onload = function() {
  var button = document.getElementById("button");
  button.onclick = changeColor;
};

function changeColor() {
  var box = document.getElementById("box1");
  box.style.background = "blue";
}
