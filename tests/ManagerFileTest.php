<?php
class ManagerFileTest extends PHPUnit_Framework_TestCase {

  public function setUp()
  {
    require_once './class/ManageFile.class.php';
    require_once './class/Files.class.php';
  }

  public function testGetInfoTotal()
  {
    $manager = new ManageFile('./tests/filesTest/');
    $expected = array( 'tailleTotal' => "0.0", 'nbFile' => 1);
    $this->assertEquals($expected, $manager->getInfoTotal());
  }

}
