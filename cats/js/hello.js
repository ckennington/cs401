document.addEventListener("DOMContentLoaded", function(event) { 

  document.getElementById("title").onclick = function() {
    document.getElementById("title").style.color = getRandomColor() 
  };

	function getRandomColor() {
			var letters = '0123456789ABCDEF';
			var color = '#';
			for (var i = 0; i < 6; i++ ) {
					color += letters[Math.floor(Math.random() * 16)];
			}
			return color;
	}


})
