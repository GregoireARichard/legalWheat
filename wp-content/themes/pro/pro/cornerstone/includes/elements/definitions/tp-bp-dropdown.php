<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/DEFINITIONS/TP-BP-DROPDOWN.PHP
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
  'toggle',
  'dropdown',
  'dropdown:custom-atts',
  'effects',
  'effects:alt',
  'effects:scroll',
  'omega'
);



// Style
// =============================================================================

function x_element_style_tp_bp_dropdown() {
  $style = cs_get_partial_style( 'anchor', array(
    'selector'   => '',
    'key_prefix' => 'toggle'
  ) );

  $style .= cs_get_partial_style( 'effects', array(
    'selector' => '.x-anchor',
    'children' => ['.x-anchor-text-primary', '.x-anchor-text-secondary', '.x-graphic-child'],
  ) );

  $style .= cs_get_partial_style( 'dropdown' );

  return $style;
}



// Render
// =============================================================================

function x_element_render_tp_bp_dropdown( $data ) {
  if ( bp_is_active( 'activity' ) ) {
    $logged_out_link = bp_get_activity_directory_permalink();
  } else if ( bp_is_active( 'groups' ) ) {
    $logged_out_link = bp_get_groups_directory_permalink();
  } else {
    $logged_out_link = bp_get_members_directory_permalink();
  }

  $anchor_href = ( is_user_logged_in() ) ? bp_loggedin_user_domain() : $logged_out_link;

  $data = array_merge(
    $data,
    array(
      'anchor_href' => $anchor_href,
      'dropdown_is_list' => true
    ),
    cs_make_aria_atts( 'toggle_anchor', array(
      'controls' => 'dropdown',
      'haspopup' => 'true',
      'expanded' => 'false',
      'label'    => __( 'Toggle Dropdown Content', '__x__' ),
    ), $data['id'], $data['unique_id'] )
  );

  return x_get_view( 'elements', 'tp-bp-dropdown', '', $data, false );
}



// Builder Setup
// =============================================================================

function x_element_builder_setup_tp_bp_dropdown() {
  return cs_compose_controls(
    cs_partial_controls( 'anchor', cs_recall( 'settings_anchor:toggle' ) ),
    cs_partial_controls( 'dropdown', array( 'add_custom_atts' => true ) ),
    cs_partial_controls( 'effects' ),
    cs_partial_controls( 'omega', array( 'add_toggle_hash' => true ) )
  );
}



// Register Element
// =============================================================================

cs_register_element( 'tp-bp-dropdown', [
  'title'   => __( 'BuddyPress Dropdown', '__x__' ),
  'values'  => $values,
  'builder' => 'x_element_builder_setup_tp_bp_dropdown',
  'style'   => 'x_element_style_tp_bp_dropdown',
  'render'  => 'x_element_render_tp_bp_dropdown',
  'icon'    => 'native',
  'active'  => class_exists( 'BuddyPress' ),
  'group'   => 'buddypress',
] );
