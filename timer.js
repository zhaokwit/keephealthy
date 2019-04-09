window.onload = function(){
let countdown;
 
var buttons = document.getElementById("timer_button_main");
buttons.addEventListener("click", function(e){
	alert("clicked!");
 var seconds = parseInt(this.dataset.time);
 //var seconds = 150;
	timer(seconds);
});



function timer(seconds){
	var now = Date.now();
	var then = now + seconds* 1000;
	displayTimeLeft(seconds);

	countdown = setInterval(()=>{
		var secondsLeft = Math.round((then-Date.now()) / 1000);

		if (secondsLeft <0){
			clearInterval(countdown);
			return;
		}
		displayTimeLeft(secondsLeft);
	}, 1000);
}


function displayTimeLeft(seconds){
	var minutes = Math.floor(seconds/60);
	var remainderSeconds = seconds%60;
	
	document.getElementById("display_timer").innerHTML = minutes + ":" + remainderSeconds;
}
}

