<html>
<head> <title> Canvas Page </title>
	<style>
	body
	{
		background-color: #7FFFD4;
	}
	h1
	{
	text-align: center;
	color: green;}
	p{
	text-align: center;
	color: blue;}
	canvas {
    border: 1px solid purple;
    background-color: white; }
	div
	{
		text-align: center;
	}
	</style> </head>
<body>
	<a name = "firstCanvas"></a>
	<h1> Welcome to the Canvas!</h1>
	<p> Click on the canvas to make a dot :) </p>
	<div>
		<button id = "clear" type = button onclick = "clearme()" ACCESSKEY = "a" target = "myFrame"> Cle<U>a</U>r My Canvas</button>
		<FORM name = "save" method = "get" action = "9.SaveLastCanvas.php">
			<button type = "submit"> <U>S</U>ave Canvas </button>
			<input type = "hidden" name = "myState" id = "myState">
		</FORM>
		<button id = "load" type = button onclick = "loadme()" ACCESSKEY = "l">
			<U>L</U>oad 
		</button>
	</div>
		
	<canvas style="margin:0;padding:0;position:relative;left:50px;top:50px;" id="imgCanvas" width="1100" height="400" onclick="draw(event)"></canvas>
	 <?php
		$thing = serialize($_GET["myState"]);
		echo file_put_contents ('dots.txt', $thing );
		//phpinfo();
		getcwd();
		?>
	<script type = "text/javascript">
		var canvas = document.getElementById("imgCanvas");
		var context = canvas.getContext("2d");
		var dotarray = [];
		var states = [];

		function Dot (x,y)
		{
			this.color = "#8A2BE2";
			this.xpos = x;
			this.ypos = y;
			this.radius = 10;
			this.drawme = drawDot(this.xpos, this.ypos);
		}
		function getMousePosition(evt) 
		{
    		var rect = canvas.getBoundingClientRect();
    		return {
    	  		x: evt.clientX - rect.left,
    	  		y: evt.clientY - rect.top
    		};
		}
		function drawDot(x,y)
		{
			context.fillStyle = "#8A2BE2";
    		context.beginPath();
    		context.arc(x, y, 10, 0, 2 * Math.PI);
    		context.fill();
		}
		function draw(e) 
		{
			var pos = getMousePosition(e);
			var x = pos.x;
			var y = pos.y;
			var dots = new Dot(x, y);
			dotarray.push(dots);
			states.push(x);
			states.push(y);
			document.getElementById('myState').value = states;
		}
		function clearme() 
		{
			context.clearRect(0,0,canvas.width,canvas.height);
			dotarray = [];
		}	
		function paint()
		{
			for(var i = 0; i < dotarray.length; i++)
			{
				drawDot(dotarray[i].xpos, dotarray[i].ypos);
			}
		}
		function loadme()
		{
			clearme();
			var data, datas = "";// = [100,200,200,300,300,400];
			var urls = ["dots.txt"];
			xhrDoc= new XMLHttpRequest();   
			xhrDoc.open('GET', urls[0])
			if (xhrDoc.overrideMimeType)
    			xhrDoc.overrideMimeType('text/plain; charset=x-user-defined')
			xhrDoc.onreadystatechange =function()
			{
				if (this.readyState == 4)
				{
					if (this.status == 200)
					{
						datas= this.response; //Here is a string of the text data
						data = datas.slice(6,datas.length -2);
						data = data.split(',');
						console.log(data) 
						console.log("Length:" + data.length)
						var i;
						for(i = 0; i < data.length; i +=2)
						{
							var x = data[i]; //pull first piece from php
							var y = data[i+1]; //pull second piece from php
							var dot = new Dot(data[i], data[i+1]);
							dotarray.push(dot);
							states.push(x);
							states.push(y);
							console.log("Point: " + parseInt(dot.xpos), parseInt(dot.ypos))
						}
						paint();
   					}
				}                   
			}
			xhrDoc.send() //sending the request\\
			console.log("4")
		}
		window.draw = draw;	
	</script></body>
</html>
