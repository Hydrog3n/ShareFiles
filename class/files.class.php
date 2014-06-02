<?php

class Files
{
	private $file_name;
	private $file_name_tmp;
	private $file_size;
	private $file_size_human;
	private $file_download;
	private $file_extend;
	private $file_date;

	public function __construct(array $file)
	{
		if (isset($file['tmp_name']))
			$this->file_name_tmp = $file['tmp_name'];

		if (file_exists('./files/'.$file['name'].'.txt')){
			$this->file_download = $this->downloadInfo($file['name']);
		}

		$this->file_name = $file['name'];
		$this->file_size = $this->convSizeMo($file['size']);
		$this->file_size_human = $this->convSize($file['size']);
		$this->file_extend = $this->extendType($file['name']);

		if (file_exists('./files/'.$file['name'])){
			$this->file_date = date ('d/m/Y', filemtime('./files/'.$file['name']));

		} else {
			$this->file_date = date ('d/m/Y', filemtime($file['tmp_name']));
		}

	}
	
	public function saveFile()
	{$log = false;
		if(move_uploaded_file($this->file_name_tmp, './files/'.basename($this->file_name)))
		{
			$this->createInformationFile();
			$log = true;
		}
		return $log;
	}

	public function convSize($octets)
	{
		$unit = array('O','Ko','Mo','Go','To','Po','Eo');
        for ($i=0; $octets >= 1024; $i++) {
            $octets = $octets / 1024;
        }
        $result = round($octets, 2).' '.$unit[$i];
        return $result;
	}

	private function convSizeMo($octets)
	{
		$octets = $octets / 1048576;
        $result = round($octets, 2);
        return $result;
	}

	private function downloadInfo($file_name) {
		if (file_exists('./files/'.$file_name.'.txt')){
			$file_lines = file('./files/'.$file_name.'.txt');
			$download = $file_lines[0];
		}
		return $download;
	}

	private function extendType($fileName)
	{
		return strrchr($fileName, '.');
	}

	private function createInformationFile()
	{
		$this->file_download = 0;
		$file_download = fopen('./files/'.$this->file_name().'.txt', 'x');
		fputs($file_download, 0);
		fclose($file_download);
	}
	public function file_name() { return $this->file_name;}
	public function file_name_tmp() { return $this->file_name_tmp;}
	public function file_size() { return $this->file_size;}
	public function file_size_human() { return $this->file_size_human;}
	public function file_extend() { return $this->file_extend;}
	public function file_date() { return $this->file_date;}
	public function file_download() { return $this->file_download;}
}
