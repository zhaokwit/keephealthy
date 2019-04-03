window.onload = function(){
	  // get the popup window
	var modal = document.getElementById('myModal');

	// open the popup window
	var btn = document.getElementById('myBtn1');

	//get close
	var close = document.getElementById('close');

	//if button click, open the popup
	btn.onclick = function(){
		modal.style.display="flex";
	}

	//if close button clicked, close it
	close.onclick = function(){
		modal.style.display = "none";
	}

	//when the user clicks anywhere outside of the modal, close it
	window.onclick = function(event){
		if(event.target == modal){
			modal.style.display = "none";
		}
	}

}
