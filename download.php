<?php
$file = "./files/".$_GET['f'];

if (file_exists($file)) {
//Ajout du Dl au fichier
    $file_download = fopen($file.'.txt', 'r+');
    $dl = fgets($file_download);
    $dl++;
    fseek($file_download, 0);
    fputs($file_download, $dl);
    fclose($file_download);

//Lancement du téléchargement
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file)).'"';
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}
else {
    include 'header.php';
    include '404.php';
    include 'footer.php';
}
