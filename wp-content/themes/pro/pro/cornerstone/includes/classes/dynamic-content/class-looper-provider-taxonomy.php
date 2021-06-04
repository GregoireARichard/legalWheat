<?php

class Cornerstone_Looper_Provider_Taxonomy extends Cornerstone_Looper_Provider_Array {

  public function get_array_items( $element ) {
    $terms = get_terms( [
      'taxonomy'   => $element['looper_provider_tax'],
      'hide_empty' => $element['looper_provider_tax_hide_empty'],
    ] );
    return is_wp_error( $terms ) ? [] : $terms;
  }

}
