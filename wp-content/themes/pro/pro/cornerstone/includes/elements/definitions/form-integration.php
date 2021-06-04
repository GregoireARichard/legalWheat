<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/DEFINITIONS/FORM-INTEGRATION.PHP
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
  'form-integration',
  'effects',
  'effects:alt',
  'effects:scroll',
  'omega',
  'omega:custom-atts'
);



// Style
// =============================================================================

function x_element_style_form_integration() {
  return x_get_view( 'styles/elements', 'form-integration', 'css', array(), false );
}



// Render
// =============================================================================

function x_element_render_form_integration( $data ) {
  return x_get_view( 'elements', 'form-integration', '', $data, false );
}



// Builder Setup
// =============================================================================

function x_element_builder_setup_form_integration() {
  return cs_compose_controls(
    cs_partial_controls( 'form-integration' ),
    cs_partial_controls( 'effects' ),
    cs_partial_controls( 'omega', array( 'add_custom_atts' => true ) )
  );
}



// Register Element
// =============================================================================

cs_register_element( 'form-integration', [
  'title'   => __( 'Form Integration', '__x__' ),
  'values'  => $values,
  'builder' => 'x_element_builder_setup_form_integration',
  'style'   => 'x_element_style_form_integration',
  'render'  => 'x_element_render_form_integration',
  'icon'    => 'native',
  'options' => [
    'inline' => [
      'content' => [
        'selector' => 'root'
      ],
    ],
  ]
] );
