<?php

$task_count = 1;

function get_name($id)
{
	$handle = fopen("./students.txt", "r");
	$num = 0;
	for ($i = 0; $i <= $id; $i++)
	{
		$line = fgets($handle);
	}
	fclose($handle);
	return $line;
}

function get_id($name)
{
	$handle = fopen("./students.txt", "r");
	$num = 0;
	while (($line = fgets($handle)) !== false) 
	{
		if($line == $name)
		{
			fclose($handle);
			return $num;
		}
		$num = $num + 1;
	}
	return 0;
}

function make_select($name)
{
	$handle = fopen($name, "r");
	if ($handle) 
	{
		while (($line = fgets($handle)) !== false) 
		{
			echo '<option value = "';
			echo get_id($line);
			echo '">';
			echo $line;
			echo "</option>";
 	   	}
		fclose($handle);
	}
}
?>


<!doctype html>
<html>

	<head>
        <meta charset="utf-8">	
		<title>Matrix code rain</title>
		<link rel="stylesheet" href="style.css">		
	</head>
	
	<body>	
		<div id="main" style="position:absolute; z-index: 1000; margin-top: 50px; background-color: #000000; width: 600px; height: 400px; opacity: 0.95;">
		<div style="margin-top: 20px; margin-left: 20px; margin-right: 20px; margin-bottom: 20px; line-height: 22px;"><font id="text" size="5" color="green"></font>
		</div>
		<center>
		<form id = "form" method = "GET" style = "visibility: hidden;" action = "game.php">
		    <select required size = "1" name = "id" style="background-repeat: no-repeat; background-position: right center; padding-right: 20px; color: black; ">
			<?php
			make_select("./active_students.txt");
			?>
		    </select>
		    <input type = "submit" value = "Ok">
		</form>
		</center>
		</div>
		<script type="text/JavaScript">
		var num = Math.floor((window.innerWidth || document.body.clientWidth) / 2 - 300);
		document.getElementById('main').style.marginLeft = num.toString() + "px";
		var text = "Ну так что, готов узнать, насколько глубока кроличья нора?<br>Кто ты?";
		var tmp_text = "";
		var flag = false;
		var timerId = setInterval(function() {
			if(text == "")
			{
				document.getElementById("form").style.visibility = "";
			}
			tmp_text = tmp_text + text.substring(0,1);
			text = text.substring(1);
			document.getElementById("text").innerHTML = tmp_text;
			if(!flag)
			{
				document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + "_";
			}
			flag = !flag;
		}, 75);
		</script>
		<canvas id="canvas"></canvas>
		<script src="stats.min.js"></script>
		<script src="script.js"></script>

	</body>
	
</html>
