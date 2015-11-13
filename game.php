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
		<div id="main" style="position:absolute; z-index: 1000; margin-top: 50px; background-color: #000000; width: 600px; height: 600px; opacity: 0.95;">
		<div style="margin-top: 20px; margin-left: 20px; margin-right: 20px; margin-bottom: 20px; line-height: 22px; ">
		<font id="text_task" size="5" color="green"></font>
		<center><font id="text_link" style = "visibility: hidden;">
		<a href="./task_<?php echo get_task_num($_GET["id"]); ?>.html" onclick="this.target='_blank';" style="color:green;">условие задачи в новом окне</a>
		</font></center>
		<font id="text_cond" size="5" color="green"></font>
		</div>
		<center>
		<form id = "form" method = "GET" action = "send_task.php" style = "visibility: hidden;">
		    <select required size = "1" name = "second" style="background-repeat: no-repeat; background-position: right center; padding-right: 20px; color: black; ">
			<?php
			$name = get_name($_GET["id"]);
			$is_fit = false;
			if(is_belong_to_fit($name))
			{
				$is_fit = true;
			}
			if($is_fit)
			{
				make_select("./active_fija_students_" . get_task_num($_GET['id']) . ".txt");
			}
			else
			{
				make_select("./active_fit_students.txt");
			}
			?>
		    </select>
		    <input type = "hidden" name = "first" value = <?php echo '"' . $_GET['id'] . '"'; ?>>
		    <input type = "submit" value = "Ok">
		</form>
		</center>
		</div>
		<script src="Animator.js" type="text/javascript" encoding="UTF-8"></script>
		<script type="text/javascript">
		var animator = new Animator(<?php echo '"Итак, чтобы пройти дальше тебе нужно решить следующую задачу:<br>' . file_to_text(get_task_num($_GET["id"])) . '"'; ?>, 75, "text_task", "text_link");
		animator.run(function()
			{

			var animator_2 = new Animator(<?php
				echo '"';
		if($is_fit)
		{
			echo "Ты наверное в замешательстве и ничего не можешь понять? не переживай, найди себе студента с ФИЯ и вместе вы сможите преодалеть данный этап. \
			Далее, тебе придется написать программу на си, да еще сделать так, чтобы она прошла все тесты, тогда вы получите заветный ключ. Удачи!<br> \
			Выбирай своего партнера";
		}
		else
		{
			echo "Ты наверное в замешательстве, текст переведен, но не понятно, как это все программировать? не переживай, найди себе студента с ФИТ и вместе вы сможете преодалеть данный этап. \
			Далее, твоему партнеру придется написать программу на си, да еще сделать так, чтобы она прошла все тесты, тогда вы получите заветный ключ. Удачи!<br> \
			Выбирай своего партнера";
		}
				echo '"';
		?>, 75, "text_cond", "form");
			animator_2.run(function(){});
		});
		</script>
		<canvas id="canvas"></canvas>
		<script src="stats.min.js"></script>
		<script src="script.js"></script>

	</body>
	
</html>
