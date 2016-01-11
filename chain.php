<?php 
class Chain {
  protected $results;
  protected $values;
  private $call_count;

  static function run(array $values) {
    $self = new Chain;
    $self->values = $values;
    $self->call_count = 0;
    $self->results = array();
    return $self;
  }

  function find($pattern) {
    foreach($this->get_data() as $v) {
      if ($v === $pattern) {
        $this->results[] = $v;
      }
    }
    return $this;
  }
  function get() {
    if (count($this->results) === 0) {
      return null;
    } elseif(count($this->results) === 1) {
      return $this->results[0];
    } else {
      return $this->results;
    }
  }

  function map($function) {
    foreach($this->get_data() as $v) {
      $this->results[] = $function($v);
    }    
    return $this;
  }

  private function get_data() {
    $data = null;
    if ($this->call_count === 0) {
      $data = $this->values;
      $this->call_count += 1;
    } else {
      $data = $this->results;
      $this->results = array();
    } 
    return $data;
  }

}
?>
