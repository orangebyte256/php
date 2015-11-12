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

		$contents = file_get_contents("./active_students.txt");
		echo $contents;
		$contents = str_replace(get_name(0), '', $contents);
		echo "=================================================================================================\n";
		echo $contents;
		$contents = str_replace(get_name(1), '', $contents);
		file_put_contents("./active_students.txt", $contents);
?>