var shuffles = 11;
var i = 0;
var correctcup = false;
var score = 0;
var gamerunning = false;
var pointused = false;
var gameJustFinished = false;
var oldscore  = 0;
$('#reset').hide();

// Add one to shuffles to send "finished" command.
shuffles++;

function start() {

	if(gameJustFinished) {
		return false;
	}

	while (i < shuffles) {
	
		gamerunning = true;
		$('#start').hide();
		$('#reset').hide();

		i++;
		//console.log("Ran once");
		var target = Math.floor(Math.random() * 3) + 1;
		//console.log("Our target cup is " + target);
		console.log("Iteration " + i);
		if (i == shuffles) {
			window.setTimeout("firecup("+target+",true)",(1200*i));
		} else {
			window.setTimeout("firecup("+target+",false)",(1200*i));
		}

	}

}

function firecup(target, islastfire) {

	if (islastfire == true) {

		gameJustFinished = true;

		console.log("Is the last firing. We are done");
		//$("#status").html("Bitch, please. Is that all you got?");
		gamerunning = false;
		$('#reset').show();
		$.post("shuffle.php", { killLight: true })
		.done(function(data) {
		  	console.log(data);
		});

		setTimeout(function() {
			gameJustFinished = false;
		}, 3000);

	} else {
		pointused = false;
		console.log("We are now firing a shuffle with the cup " + target + " selected");
		correctcup = target;
		$.post("shuffle.php", { targetcup: target })
		.done(function(data) {
		  	console.log(data);
		});
	}
	
}

$("#bulb1").click(function() {

	if (gamerunning) {
		if (correctcup == 1) {
			success();
		} else {
			failure();
		}
	}

});

$("#bulb2").click(function() {

	if (gamerunning) {
		if (correctcup == 2) {
			success();
		} else {
			failure();
		}
	}

});

$("#bulb3").click(function() {

	if (gamerunning) {
		if (correctcup == 3) {
			success();
		} else {
			failure();
		}
	}
	
});

$("#reset").click(function() {

	//$("#status").html("Firing!");
	i = 0;
	correctcup = false;
	oldscore = score;
	score = 0;
	start();
	$("#score").html("Score: 0");
	$("#status").html("<br />Your previous score was " + oldscore);
	
});


function success() {
	if (pointused == false) {
		console.log("User got it!");
		score++;
		$("#score").html("Score: "+score);
		pointused = true;
	}
}

function failure() {
	if (pointused == false ) {
		console.log("User didn't click in time or clicked wrong.");
		score--;
		$("#score").html("Score: "+score);
		pointused = true;
	}
}

$("#start").click(function() {
	start();
});

$(function() {
    FastClick.attach(document.body);
});