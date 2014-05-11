<?php

// autoload des class

function __autoload($class_name) {
    include 'class/'.$class_name . '.class.php';
}

require_once 'config.php';
require_once 'function.inc.php';

//print_r($_FILES);

if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0) {
	$file = new files($_FILES['fichier']);
	//echo $file->file_name();
	//echo $file->file_name_tmp();
	if (in_array($file->file_extend(), $extend_files))
    {
    	$log = $file->saveFile();
    	echo $log;
    } else echo "erreur";
}


// affichage des pages 
include 'header.php';

if(isset($_GET['p']) && $_GET['p'] == "administration")
	include 'admin_dashboard.php';
else if (isset($log) && $log == "TRUE")
	include "view.php";
else 
	include 'body.php';

include 'footer.php';