<?php

// =============================================================================
// FUNCTIONS/BARS/SETUP.PHP
// -----------------------------------------------------------------------------
// Bar functionality.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Setup - Views
//   02. Setup - Modules
//   03. Setup - Styles
//   04. Setup - Preview
//   05. Setup - Bar Spaces
//   06. Setup - Elements
//   07. Setup - Page Templates
// =============================================================================


// Setup - Header / Footer output
// =============================================================================

add_action('cs_will_output_header', function() {
  add_filter( 'x_legacy_cranium_headers', '__return_false' );
});

add_action('cs_will_output_footer', function() {
  add_filter( 'x_legacy_cranium_footers', '__return_false' );
});


// Setup - Elements
// =============================================================================

function x_output_header_page_templates( $output_header ) {
  $output_header = ! x_is_blank( 3 ) && ! x_is_blank( 6 ) && ! x_is_blank( 7 ) && ! x_is_blank( 8 );
  return $output_header;
}

add_filter( 'cs_output_header', 'x_output_header_page_templates' );


function x_output_footer_page_templates( $output_footer ) {
  $output_footer = ! x_is_blank( 2 ) && ! x_is_blank( 3 ) && ! x_is_blank( 5 ) && ! x_is_blank( 6 );
  return $output_footer;
}

add_filter( 'cs_output_footer', 'x_output_footer_page_templates' );
