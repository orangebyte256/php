<?php

include 'functions.php';

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
		<a href="./task_<?php echo get_task_num($_GET["first"]); ?>.html" onclick="this.target='_blank';" style="color:green;">условие задачи</a>
		</font></center>
		</div>
		<center>
		<form action="test.php" enctype="multipart/form-data" method="POST">
		<input type="file" name="datafile" size="400">
		<input type="hidden" name="first" value=<?php echo $_GET["first"]; ?>>
		<input type="hidden" name="second" value=<?php echo $_GET["second"]; ?>>
		<input type="hidden" name="task" value=<?php echo get_task_num($_GET["first"]); ?>>
		<input type="submit" value="Send">
		</form>
		<font size="5" color="red"><br><?php echo $_GET['result'] ?></font>
		</center>
		</div>
		<canvas id="canvas"></canvas>
		<script src="stats.min.js"></script>
		<script src="script.js"></script>

	</body>
	
</html>
