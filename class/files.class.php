<?php

class files
{
	private $file_name;
	private $file_name_tmp;
	private $file_size;
	private $file_download;
	private $file_extend;

	public function __construct(array $file)
	{
		if (isset($file['tmp_name']))
			$this->file_name_tmp = $file['tmp_name'];

		if (file_exists("./files/".$file['name'].".txt"))
			$this->file_download = downloadInfo($file['name']);

		$this->file_name = $file['name'];
		$this->file_size = $file['size'];
		$this->file_extend = strrchr($file['name'], '.');
	}
	public function saveFile()
	{
		if(move_uploaded_file($this->file_name_tmp, 'files/'.basename($this->file_name)))
			$log = "TRUE";
		else 
			$log = "FALSE";
		return $log; 
	}

	private function downloadInfo($file_name) {

	}
	public function file_name() { return $this->file_name;}
	public function file_name_tmp() { return $this->file_name_tmp;}
	public function file_size() { return $this->file_size;}
	public function file_extend() { return $this->file_extend;}
}