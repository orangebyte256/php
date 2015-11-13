<?php

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

function is_belong($name, $file)
{
	$handle = fopen($file, "r");
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

function is_belong_to_fit($name)
{
	return is_belong($name, "./fit_students.txt");
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

function file_to_text($num)
{
	$handle = fopen("./task_" . $num . ".txt", "r");
	$result = "";
	if ($handle)
	{
		while (($line = fgets($handle)) !== false) 
		{
			$result = $result . substr($line, 0, strlen($line) - 1) . "<br>";
 	   	}
		fclose($handle);
	}
	return $result;
}

function get_task_num($id)
{
	$fija_count = 5;
	$task_count = $fija_count;
	$name = get_name($id);
	if(is_belong($name, "./fit_students.txt"))
	{
		return $id % $task_count;
	}
	else
	{
		for($i = 0; $i < $task_count; $i++)
		{
			if(is_belong($name, "./fija_students_" . $i . ".txt"))
			{
				return $i;
			}
		}
	}
}
?>
