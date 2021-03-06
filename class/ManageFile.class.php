<?php
class ManageFile
{
	static $_directory;

	public function __construct($dir)
	{
		self::$_directory = $dir;
	}

	public function add(array $fileInfo)
	{
		$file = new Files($fileInfo);
		return $file;
	}

	public function getList(){
		$listFile = array();
		if ($dir = opendir(self::$_directory)){
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
		if ($dir = opendir(self::$_directory)){
			while(false !== ($fichier = readdir($dir))) {
				if($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && $fichier != '.gitkeep' && preg_match('/.txt$/', $fichier) == 0 ) {
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
		$infoFile['name'] = basename(self::$_directory.$file);
		$infoFile['tmp_name'] = self::$_directory.$file;
		$infoFile['size'] = filesize(self::$_directory.$file);
		return $infoFile;
	}
	static public function getDir()
	{
		return self::$_directory;
	}
}
