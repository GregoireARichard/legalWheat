<?php

// =============================================================================
// CORNERSTONE/INCLUDES/ELEMENTS/DEFINITIONS/NAV-COLLAPSED.PHP
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
  'menu-collapsed',
  'toggle',
  'off-canvas',
  'menu-item',
  cs_values( 'menu-item', 'sub' ),
  array(
    'anchor_padding'         => cs_value( '0.75em', 'style' ),
    'anchor_text_margin'     => cs_value( '5px auto 5px 5px', 'style' ),
    'sub_anchor_padding'     => cs_value( '0.75em', 'style' ),
    'sub_anchor_text_margin' => cs_value( '5px auto 5px 5px', 'style' ),
  ),
  'effects',
  'effects:alt',
  'effects:scroll',
  'omega',
  'omega:toggle-hash'
);



// Style
// =============================================================================

function x_element_style_nav_collapsed() {
  return x_get_view( 'styles/elements', 'nav-collapsed', 'css', array(), false );
}



// Render
// =============================================================================
// 01. Output as off canvas in top / bottom header bars and footer bars.
// 02. Output inline in content or left / right header bars.

function x_element_render_nav_collapsed( $data ) {

  if ( $data['_region'] === 'top' || $data['_region'] === 'bottom' || $data['_region'] === 'footer' ) { // 01

    $data = array_merge(
      $data,
      cs_make_aria_atts( 'toggle_anchor', array(
        'controls' => 'off-canvas',
        'haspopup' => 'true',
        'expanded' => 'false',
        'label'    => __( 'Toggle Off Canvas Content', '__x__' ),
      ), $data['id'], $data['unique_id'] )
    );

    cs_defer_partial( 'x_before_site_end', 'off-canvas', array_merge(
      cs_extract( $data, array( 'off_canvas' => '' ) ),
      array( 'off_canvas_content' => cs_get_partial_view( 'menu', cs_extract( $data, array( 'menu' => '', 'anchor' => '', 'sub_anchor' => '' ) ) ) )
    ) );

    return cs_get_partial_view( 'anchor', cs_extract( $data, array( 'toggle_anchor' => 'anchor', 'toggle' => '', 'effects' => '' ) ) );

  } else { // 02

    return cs_get_partial_view( 'menu', cs_extract( $data, array( 'menu' => '', 'anchor' => '', 'sub_anchor' => '', 'effects' => '' ) ) );

  }
}



// Builder Setup
// =============================================================================

function x_element_builder_setup_nav_collapsed() {
  return cs_compose_controls(
    cs_partial_controls( 'menu', array( 'type' => 'collapsed' ) ),
    cs_partial_controls( 'anchor', array_merge(
      cs_recall( 'settings_anchor:toggle' ),
      array( 'tbf_only' => true )
    ) ),
    cs_partial_controls( 'off-canvas', array( 'tbf_only' => true ) ),
    cs_partial_controls( 'anchor', array(
      'type'             => 'menu-item',
      'group'            => 'top_menu_item_anchor',
      'group_title'      => __( 'Top Links', '__x__' ),
      'is_nested'        => true,
      'label_prefix_std' => __( 'Top Menu Items', '__x__' )
    ) ),
    cs_partial_controls( 'anchor', array(
      'type'             => 'menu-item',
      'k_pre'            => 'sub',
      'group'            => 'sub_menu_item_anchor',
      'group_title'      => __( 'Sub Links', '__x__' ),
      'is_nested'        => true,
      'label_prefix_std' => __( 'Sub Menu Items', '__x__' )
    ) ),
    cs_partial_controls( 'effects' ),
    cs_partial_controls( 'omega' )
  );
}



// Register Element
// =============================================================================

cs_register_element( 'nav-collapsed', [
  'title'   => __( 'Navigation Collapsed', '__x__' ),
  'values'  => $values,
  'builder' => 'x_element_builder_setup_nav_collapsed',
  'style'   => 'x_element_style_nav_collapsed',
  'render'  => 'x_element_render_nav_collapsed',
  'icon'    => 'native',
] );
