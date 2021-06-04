<?php

abstract class Cornerstone_Looper_Provider_Array extends Cornerstone_Looper_Provider {

  protected $items = [];
  protected $size = 0;
  protected $original_items = [];

  public function setup( $element ) {

    $items = $this->get_array_items( $element );

    if ( is_array( $items ) ) {
      $offset = intval( cs_dynamic_content( $element['looper_provider_array_offset'] ) );
      $this->items = $offset === 0 ? $items : array_slice( $items, $offset );
      $this->original_items = $this->items;
      $this->size = count($this->items);
    }

  }

  protected function advance() {
    return array_shift($this->items);
  }

  public function rewind() {
    $this->items = $this->original_items;
  }
  
  public function get_index() {
    return $this->size - (count($this->items) + 1); // return zero based index
  }

  public function get_size() {
    return $this->size;
  }

  public function get_context() {
    return $this->items;
  }

  abstract function get_array_items( $element );

}
