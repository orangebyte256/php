<?php


//date_default_timezone_set('UTC');

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

function clear($file, $first, $second)
{
	$contents = file_get_contents($file);
	$contents = str_replace(get_name($first), '', $contents);
	$contents = str_replace(get_name($second), '', $contents);
	file_put_contents($file, $contents);
}

$basedir = '/var/www/uploads/test/';
$uploaddir = $basedir . "task_" . $_POST["task"] . "/";
$uploadfile = $uploaddir . $_POST["first"] . "_" . $_POST["second"] . "_source.c";
session_start();

if (move_uploaded_file($_FILES['datafile']['tmp_name'], $uploadfile)) 
{
	$name = $basedir . "test.sh " . $_POST["first"] . "_" . $_POST["second"] . " " . $uploaddir;
	$result = exec($name);
	if($result == "success")
	{
		$_SESSION['status'] = "success";
		
		clear("./active_students.txt", $_POST["first"], $_POST["second"]);
		clear("./fija_students.txt", $_POST["first"], $_POST["second"]);
		clear("./fit_students.txt", $_POST["first"], $_POST["second"]);
		$str = get_name($_POST["first"]) . get_name($_POST["second"]) . date('l jS \of F Y h:i:s A') . "\n";
		file_put_contents("./completed_students.txt", $str, FILE_APPEND);
		header("Location: win.php");
	}
	else
	{
		$first = (string)$_POST["first"];
		$second = (string)$_POST["second"];
		header("Location: send_task.php?result=" . $result . "&first=" . $first . "&second=" . $second);
	}
} else {
    echo "Не могу загрузить файл.Попробуй позже...\n";
}
?>
