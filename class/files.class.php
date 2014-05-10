<?php

class files
{
	private $file_name;
	private $file_size;
	private $file_download;
	private $file_extend;

	public function __construct(array $file)
	{
		$this->file_name = $file['name'];
		$this->file_size = $file['size'];
		$this->file_extend = strrchr($file['name'], '.');
	}
	public function saveFile()
	{
		$log = move_uploaded_file($this->file_name, 'files/'.basename($this->file_name));
		return $log; 
	}

	public function file_name() { return $this->file_name;}
	public function file_size() { return $this->file_size;}
	public function file_extend() { return $this->file_extend;}
}