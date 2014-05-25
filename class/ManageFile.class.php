<?php
class ManageFile
{
	private $directory;

	public function __construct($dir)
	{
		$this->directory = $dir;
	}
	public function add(array $fileInfo)
	{
		$file = new Files($fileInfo);
		return $file;
	}
	public function getList(){
		$listFile = array();
		if ($dir = opendir($this->directory)){
			while(false !== ($fichier = readdir($dir))){
				if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != '.gitkeep' && $fichier != 'index.html'){
					$listFile[] = new Files($this->infoFile($fichier));
				}
			}
			closedir($dir);
		}
		return $listFile;
	}
	public function getInfoTotal(){
		$sizeTotal = 0;
		$count = 0;
		if ($dir = opendir($this->directory)){
			while(false !== ($fichier = readdir($dir))) {
				if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != '.gitkeep' && $fichier != '*.txt') {
					$file = new Files($this->infoFile($fichier));
					$sizeTotal += $file->file_size();
					$count++;
				}
			}
			closedir($dir);
		}
		return array( 'tailleTotal' => $sizeTotal, 'nbFile' => $count);
	}
	public function getFile($file)
	{
		$fichier = new Files($this->infoFile($file));
		return $fichier;
	}
	private function infoFile($file){
		$infoFile = array();
		$infoFile['name'] = basename($this->directory.$file);
		$infoFile['size'] = filesize($this->directory.$file);
		return $infoFile;
	}
}
