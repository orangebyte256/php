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
		<div id="main" style="position:absolute; z-index: 1000; margin-top: 50px; background-color: #000000; width: 600px; height: 600px; opacity: 0.95;">
		<div style="margin-top: 20px; margin-left: 20px; margin-right: 20px; margin-bottom: 20px; line-height: 22px; ">
		<font id="text_task" size="5" color="green"></font>
		<center><font id="text_link" style = "visibility: hidden;">
		<a href="./task_<?php echo $id % $task_count; ?>.html" onclick="this.target='_blank';" style="color:green;">Click me!</a>
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
				make_select("./fija_students.txt");
			}
			else
			{
				make_select("./fit_students.txt");
			}
			?>
		    </select>
		    <input type = "hidden" name = "first" value = <?php echo '"' . $_GET['id'] . '"'; ?>>
		    <input type = "submit" value = "Ok">
		</form>
		</center>
		</div>
		<script type="text/JavaScript">
		var num = Math.floor((window.innerWidth || document.body.clientWidth) / 2 - 300);
		document.getElementById('main').style.marginLeft = num.toString() + "px";
		var text_task = "Итак, чтобы пройти дальше тебе нужно решить следующую задачу:<br>";
		var text_cond = "<br>";
		<?php
		echo "text_task = text_task ";
		$handle = fopen("./task_" . ($id % $task_count) . ".txt", "r");
		if ($handle) 
		{
    		while (($line = fgets($handle)) !== false) 
			{
				echo '+ "';
				$new_line = substr($line, 0, strlen($line) - 2) . "<br>";
				echo $new_line;
				echo '"';
	 	   	}
	 	   	echo ";";
    		fclose($handle);
		}
		?>
		<?php
		echo 'text_cond = text_cond +"';
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
		echo '";'
		?>
		var tmp_text = "";
		var flag = false;
		var timerId = setInterval(function() {
			tmp_text = tmp_text + text_task.substring(0,1);
			text_task = text_task.substring(1);
			document.getElementById("text_task").innerHTML = tmp_text;
			if(!flag)
			{
				document.getElementById("text_task").innerHTML = document.getElementById("text_task").innerHTML + "_";
			}
			flag = !flag;
			if(text_task == "")
			{
				document.getElementById("text_link").style.visibility = "";
				clearTimeout(timerId);
				document.getElementById("text_task").innerHTML = tmp_text;
				tmp_text = "";
				setInterval(function() {
				if(text_cond == "")
				{
					document.getElementById("form").style.visibility = "";
				}
				tmp_text = tmp_text + text_cond.substring(0,1);
				text_cond = text_cond.substring(1);
				document.getElementById("text_cond").innerHTML = tmp_text;
				if(!flag)
				{
					document.getElementById("text_cond").innerHTML = document.getElementById("text_cond").innerHTML + "_";
				}
				flag = !flag;
				}, 75);
			}

		}, 75);
		</script>
		<canvas id="canvas"></canvas>
		<script src="stats.min.js"></script>
		<script src="script.js"></script>

	</body>
	
</html>
