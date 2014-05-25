<?php
session_start();

// autoload des class
function __autoload($class_name) {
    include_once './class/'.$class_name . '.class.php';
}

require_once 'config.php';
require_once 'function.inc.php';

$manage = new ManageFile('./files/');

// print_r($_FILES);

if (isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0) {

	$file = $manage->add($_FILES['fichier']);
	if (!file_exists('./files/'.$file->file_name())) {
		if (in_array($file->file_extend(), $extend_files) && $file->file_size() <= $max_size)
	    {
	    	$log = $file->saveFile();

	    } else echo  "Erreur l'upload n'a pu être effectuer (Extension interdite ou Taille trop grade)";
	} else $log="TRUE";
}

// affichage des pages
include 'header.php';

if(isset($_GET['p']) && $_GET['p'] == "administration")
	include 'admin_dashboard.php';
else if ((isset($log) && $log == "TRUE" ) || isset($_GET['f']))
	include "view.php";
else
	include 'body.php';

include 'footer.php';
