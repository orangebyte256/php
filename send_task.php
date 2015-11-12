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

function is_belong_to_fit($name)
{
	$handle = fopen("./fit_students.txt", "r");
	while (($line = fgets($handle)) !== false) 
	{
		if($line == $name)
		{
			fclose($handle);
			return true;
		}
	}
	return false;
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
		<div style="margin-top: 20px; margin-left: 20px; margin-right: 20px; margin-bottom: 20px; line-height: 22px; ">
		<font id="text_task" size="5" color="green"></font>
		<center><font id="text_link">
		<a href="./task_<?php echo $_GET["first"] % $task_count; ?>.html" onclick="this.target='_blank';" style="color:green;">условие задачи</a>
		</font></center>
		</div>
		<center>
		<form action="test.php" enctype="multipart/form-data" method="POST">
		<input type="file" name="datafile" size="400">
		<input type="hidden" name="first" value=<?php echo $_GET["first"]; ?>>
		<input type="hidden" name="second" value=<?php echo $_GET["second"]; ?>>
		<input type="hidden" name="task" value=<?php echo $_GET["first"] % $task_count; ?>>
		<input type="submit" value="Send">
		</form>
		<p><?php echo $_GET['result'] ?></p>
		</center>
		</div>
		<script type="text/JavaScript">
		var num = Math.floor((window.innerWidth || document.body.clientWidth) / 2 - 300);
		document.getElementById('main').style.marginLeft = num.toString() + "px";
		</script>
		<canvas id="canvas"></canvas>
		<script src="stats.min.js"></script>
		<script src="script.js"></script>

	</body>
	
</html>
