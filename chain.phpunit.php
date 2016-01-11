<?php 
require_once("./chain.php");
class ChainTest extends PHPUnit_Framework_TestCase {
  
  function testfind() {
    $res = Chain::run(array(1,2,3))->find(2)->get(); 
    $this->assertEquals(2, $res);
    $res = Chain::run(array(1,2,3))->find(0)->get(); 
    $this->assertEquals(null, $res);
  }

  function testmap() {
    $res = Chain::run(array(1,2,3))->map(function($v){ return $v * 10 ;})->get(); 
    $this->assertEquals(array(10, 20, 30), $res);
    $res = Chain::run(array(1,2,3))->map('strval')->get();
    $this->assertEquals(array('1', '2', '3'), $res);
    $res = Chain::run(array(1,2,3))->map('strval')->map('strlen')->get();
    $this->assertEquals(array(1, 1, 1), $res);
  }


}
?>
