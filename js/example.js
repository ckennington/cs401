window.onload = function() { 

  box = document.getElementById("box1")
  box.onclick = function () {
     box.style.backgroundColor= getRandomColor();
  }

}

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
