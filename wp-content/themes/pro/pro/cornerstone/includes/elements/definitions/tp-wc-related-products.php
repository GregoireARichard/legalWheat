<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/DEFINITIONS/TP-WC-UPSELLS.PHP
// -----------------------------------------------------------------------------
// V2 element definitions.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Values
//   02. Style
//   03. Render
//   04. Builder Setup
//   05. Register Element
// =============================================================================

// Values
// =============================================================================

$values = cs_compose_values(
  'products:related-products',
  'effects',
  'effects:alt',
  'effects:scroll',
  'omega',
  'omega:toggle-hash'
);



// Style
// =============================================================================

function x_element_style_tp_wc_related_products() {
  $style = cs_get_partial_style( 'products' );

  $style .= cs_get_partial_style( 'effects', array(
    'selector'   => '.x-wc-products',
    'children'   => [],
    'key_prefix' => ''
  ) );

  return $style;
}



// Render
// =============================================================================

function x_element_render_tp_wc_related_products( $data ) {
  return cs_get_partial_view( 'products', $data );
}



// Builder Setup
// =============================================================================

function x_element_builder_setup_tp_wc_related_products() {
  return cs_compose_controls(
    cs_partial_controls( 'products', array( 'type' => 'related' ) ),
    cs_partial_controls( 'effects' ),
    cs_partial_controls( 'omega', array( 'add_toggle_hash' => true ) )
  );
}



// Register Element
// =============================================================================

cs_register_element( 'tp-wc-related-products', [
  'title'   => __( 'Related Products', '__x__' ),
  'values'  => $values,
  'builder' => 'x_element_builder_setup_tp_wc_related_products',
  'style'   => 'x_element_style_tp_wc_related_products',
  'render'  => 'x_element_render_tp_wc_related_products',
  'icon'    => 'native',
  'active'  => class_exists( 'WC_API' ),
  'group'   => 'woocommerce',
] );
