<?php
session_start();
if($_SESSION['status'] != "success")
{
	echo "Не выйдет, читеренок)<br>";
	echo "<a href='index.php'>Попробовать честно</a>";
	exit;
}
//$_SESSION['status'] = "done";
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
		</div>
		<script src="Animator.js" type="text/javascript" encoding="UTF-8"></script>
		<script type="text/javascript">
		var animator = new Animator("Что-же, поздравляю, вы молодцы! Приходите 27 ноября в 12.00 к ... и познакомитесь, с Чеширским Котом и остальными) Ах да, ваша награда", 75, "text", "text_link");
		animator.run(function(){});		
		</script>
		<canvas id="canvas"></canvas>
		<script src="stats.min.js"></script>
		<script src="script.js"></script>

	</body>
	
</html>
