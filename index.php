<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Slider - BouncingBall</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
<div class="container">
  <div class="btn"></div>
 Speed:<input id="amount"type="text">
  <div id="slider"></div> 
  <canvas id="stage" width="500" height="500" style="border:2px solid black;top: 20%;  left: 50%;" ></canvas>
</div>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>
var t;              // this will be the setInterval object.  We will control the speed with this
var factor = 120;   // 120ms / the slider value; default: 120/4 = 30
//ui slider 
$( "#slider" ).slider({
  range: "min",
  min: 1,
  max: 30,
  value: 4,
  slide: function( event, ui ) 
  {
    $( "#amount" ).val( ui.value );
	
	clearInterval(t);
    t = setInterval(DrawCanvas, 30);
  }
});
$( "#amount" ).val( $( "#slider" ).slider( "value" ) );
var speedvar = document.getElementById("amount").value;
var canvas = document.getElementById("stage");
var ctx = canvas.getContext("2d");
//var speed= speedvar;  //get value form jquery ui slider   

var posX = canvas.width/2 ;
var posY = canvas.height/4;
var r = 15;
var TheAngle = Math.random() * 360;
//var TheSpeed = speed;
//var MoveX = Math.cos(Math.PI/180 * TheAngle) * TheSpeed;
//var MoveY = Math.sin(Math.PI/180 * TheAngle) * TheSpeed;

//t = setInterval(DrawCanvas, 30);

t = setInterval(DrawCanvas, 30);
var movement_X = 0;
var movement_Y = 0;

function DrawCanvas() 
{
	ctx.clearRect(0,0,canvas.width,canvas.height);
	
	var speedvar = document.getElementById("amount").value;
    var speed = speedvar;
    var TheSpeed = speed;
	var MoveX = Math.cos(Math.PI/180 * TheAngle) * TheSpeed;
    var MoveY = Math.sin(Math.PI/180 * TheAngle) * TheSpeed;
		
	if(posX + r >= canvas.width || posX - r <= 0) 
	{
	  movement_X += 1; 
    }
	
    if(posY + r >= canvas.height || posY - r <= 0) 
	{
	  movement_Y += 1;
    }
	
	if(movement_X%2 == 0 )
	{
		MoveX = -MoveX;
	}
	if(movement_Y%2 == 0)
	{
		MoveY = -MoveY;
	}

	
    
	 posX += MoveX;
     posY += MoveY;
	
	
    ctx.beginPath();
    ctx.fillStyle = "#042fcf";
    ctx.arc(posX, posY, r, 0, Math.PI*2,false);
    ctx.fill();
    ctx.closePath();
	console.log(chdir_x);
	console.log(chdir_y);
}

</script>
</body>
</html>