<?php 
function listWord($array)
{
	foreach ($array as $key=> $value) {
		echo $value;
		if ($key = 0 || $key != count($array)-1)
			echo ", ";
	}
}

function infoFile($file) {

	$info['name'] = basename($file);
	$info['size'] = filesize($file);
	return $info;
}