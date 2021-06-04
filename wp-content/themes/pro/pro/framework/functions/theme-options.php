<?php

// cs_recall( 'options_choices_off_on_bool_string' )

// =============================================================================
// THEME-OPTIONS.PHP
// -----------------------------------------------------------------------------
// Registers controls for the Theme Options page. Below is a table on how to
// setup conditions as needed.
// -----------------------------------------------------------------------------
// Standard                         | $condition = array(
//                                  |   'option' => 'x_stack',
//                                  |   'value'  => 'renew',
//                                  |   'op'     => '='
//                                  | )
// -----------------------------------------------------------------------------
// Simplified (assumes '=' as 'op') | $condition = array(
//                                  |   'x_stack' => 'renew'
//                                  | )
// -----------------------------------------------------------------------------
// Single                           | 'condition' => $condition
// -----------------------------------------------------------------------------
// Multiple                         | 'conditions' => array(
//                                  |   $condition,
//                                  |   $another_condition
//                                  | )
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Setup
//   02. Helpers
//   03. Theme Options Map
//       a. Choices
//       b. Options
//       c. Conditions
//       d. Labels
//       e. Groups
//       f. Controls
//       g. Stacks
//       h. Integrity
//       i. Renew
//       j. Icon
//       k. Ethos
//       l. Layout and Design
//       m. Typography
//       n. Buttons
//       o. Headers
//       p. Footers
//       q. Blog
//       r. Portfolio
//       s. Social
//       t. Miscellaneous
//       u. bbPress
//       v. BuddyPress
//       w. WooCommerce
//       x. Output
//   04. Integration
// =============================================================================

// Setup
// =============================================================================

cornerstone_options_register_options( x_bootstrap()->get_theme_option_defaults() );



// Helpers
// =============================================================================

function x_wrap_choices( $choices ) {
  return [ 'choices' => $choices ];
}



// Theme Options Map
// =============================================================================

function x_theme_options_register() {

  // Choices
  // -------

  $choices_stacks = [
    [ 'value' => 'integrity', 'label' => __( 'Integrity', '__x__' ) ],
    [ 'value' => 'renew',     'label' => __( 'Renew', '__x__' )     ],
    [ 'value' => 'icon',      'label' => __( 'Icon', '__x__' )      ],
    [ 'value' => 'ethos',     'label' => __( 'Ethos', '__x__' )     ],
  ];

  $choices_light_dark = [
    [ 'value' => 'light', 'label' => __( 'Light', '__x__' ) ],
    [ 'value' => 'dark',  'label' => __( 'Dark', '__x__' )  ],
  ];

  $choices_section_layouts = [
    [ 'value' => 'sidebar',    'label' => __( 'Global', '__x__' )    ],
    [ 'value' => 'full-width', 'label' => __( 'Fullwidth', '__x__' ) ],
  ];

  $choices_renew_entry_icon_position = [
    [ 'value' => 'standard', 'label' => __( 'Standard', '__x__' ) ],
    [ 'value' => 'creative', 'label' => __( 'Creative', '__x__' ) ],
  ];

  $choices_ethos_post_carousel_and_slider_display = [
    [ 'value' => 'most-commented', 'label' => __( 'Most Commented', '__x__' ) ],
    [ 'value' => 'random',         'label' => __( 'Random', '__x__' )         ],
    [ 'value' => 'featured',       'label' => __( 'Featured', '__x__' )       ],
  ];

  $choices_widget_areas = [
    [ 'value' => '0', 'icon' => 'ui:none' ],
    [ 'value' => '1', 'label' => '1'      ],
    [ 'value' => '2', 'label' => '2'      ],
    [ 'value' => '3', 'label' => '3'      ],
    [ 'value' => '4', 'label' => '4'      ],
  ];

  $choices_left_right_positioning = [
    [ 'value' => 'left',  'label' => __( 'Left', '__x__' )  ],
    [ 'value' => 'right', 'label' => __( 'Right', '__x__' ) ],
  ];

  $choices_blog_styles = [
    [ 'value' => 'standard', 'label' => __( 'Standard', '__x__' ) ],
    [ 'value' => 'masonry',  'label' => __( 'Masonry', '__x__' )  ],
  ];

  $choices_masonry_columns = [
    [ 'value' => '2', 'label' => '2' ],
    [ 'value' => '3', 'label' => '3' ],
  ];

  $choices_shop_columns = [
    [ 'value' => '1', 'label' => '1' ],
    [ 'value' => '2', 'label' => '2' ],
    [ 'value' => '3', 'label' => '3' ],
    [ 'value' => '4', 'label' => '4' ],
  ];

  $choices_woocommerce_navbar_cart_content = [
    [ 'value' => 'icon',  'label' => __( 'Icon', '__x__' )  ],
    [ 'value' => 'total', 'label' => __( 'Total', '__x__' ) ],
    [ 'value' => 'count', 'label' => __( 'Count', '__x__' ) ],
  ];

  $choices_fullwidth_boxed = [
    [ 'value' => 'full-width', 'label' => __( 'Fullwidth', '__x__' ) ],
    [ 'value' => 'boxed',      'label' => __( 'Boxed', '__x__' )     ],
  ];

  $choices_layout_content = [
    [ 'value' => 'content-sidebar', 'label' => __( 'Content / Sidebar', '__x__' ) ],
    [ 'value' => 'sidebar-content', 'label' => __( 'Sidebar / Content', '__x__' ) ],
    [ 'value' => 'full-width',      'label' => __( 'Fullwidth', '__x__' )         ],
  ];

  $choices_root_font_size_mode = [
    [ 'value' => 'stepped', 'label' => __( 'Stepped', '__x__' ) ],
    [ 'value' => 'scaling', 'label' => __( 'Scaling', '__x__' ) ],
  ];

  $choices_px_em = [
    [ 'value' => 'px', 'label' => __( 'px', '__x__' ) ],
    [ 'value' => 'em', 'label' => __( 'em', '__x__' ) ],
  ];

  $choices_list_font_families = 'list:fonts';
  $choices_list_font_weights  = 'list:font-weights';

  $choices_button_style = [
    [ 'value' => 'real',        'label' => __( '3D', '__x__' )          ],
    [ 'value' => 'flat',        'label' => __( 'Flat', '__x__' )        ],
    [ 'value' => 'transparent', 'label' => __( 'Transparent', '__x__' ) ],
  ];

  $choices_button_shape = [
    [ 'value' => 'square',  'label' => __( 'Square', '__x__' )  ],
    [ 'value' => 'rounded', 'label' => __( 'Rounded', '__x__' ) ],
    [ 'value' => 'pill',    'label' => __( 'Pill', '__x__' )    ],
  ];

  $choices_button_size = [
    [ 'value' => 'mini',    'label' => __( 'Mini', '__x__' )        ],
    [ 'value' => 'small',   'label' => __( 'Small', '__x__' )       ],
    [ 'value' => 'regular', 'label' => __( 'Regular', '__x__' )     ],
    [ 'value' => 'large',   'label' => __( 'Large', '__x__' )       ],
    [ 'value' => 'x-large', 'label' => __( 'Extra Large', '__x__' ) ],
    [ 'value' => 'jumbo',   'label' => __( 'Jumbo', '__x__' )       ],
  ];

  $choices_navbar_position = [
    [ 'value' => 'static-top',  'label' => __( 'Static Top', '__x__' )  ],
    [ 'value' => 'fixed-top',   'label' => __( 'Fixed Top', '__x__' )   ],
    [ 'value' => 'fixed-left',  'label' => __( 'Fixed Left', '__x__' )  ],
    [ 'value' => 'fixed-right', 'label' => __( 'Fixed Right', '__x__' ) ],
  ];

  $choices_navbar_scrolling = [
    [ 'value' => 'overflow-scroll',  'label' => __( 'On (no submenu support)', '__x__' ) ],
    [ 'value' => 'overflow-visible', 'label' => __( 'Off', '__x__' )                     ],
  ];

  $choices_inline_or_stacked = [
    [ 'value' => 'inline',  'label' => __( 'Inline', '__x__' )  ],
    [ 'value' => 'stacked', 'label' => __( 'Stacked', '__x__' ) ],
  ];

  $choices_cart_layout = [
    [ 'value' => 'inner' ,      'label' => __( 'Single (Inner)', '__x__' )         ],
    [ 'value' => 'outer' ,      'label' => __( 'Single (Outer)', '__x__' )         ],
    [ 'value' => 'inner-outer', 'label' => __( 'Double (Inner / Outer)', '__x__' ) ],
    [ 'value' => 'outer-inner', 'label' => __( 'Double (Outer / Inner)', '__x__' ) ],
  ];

  $choices_cart_shape = [
    [ 'value' => 'square',  'label' => __( 'Square', '__x__' )  ],
    [ 'value' => 'rounded', 'label' => __( 'Rounded', '__x__' ) ],
  ];


  // Options
  // -------

  $options_renew_entry_icon_horizontal_alignment = [
    'available_units' => [ '%' ],
    'fallback_value'  => '18%',
    'ranges'          => [
      '%' => [ 'min' => 0, 'max' => 50, 'step' => 0.5 ],
    ],
  ];

  $options_renew_entry_icon_vertical_alignment = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '25px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 50, 'step' => 1 ],
    ],
  ];

  $options_icon_color_labels = [
    'label'        => __( 'Text', '__x__' ),
    'alt_label'    => __( 'Background', '__x__' ),
    'swatch_label' => __( 'Select', '__x__' ),
  ];

  $options_ethos_posts_per_page = [
    'unit_mode' => 'unitless',
    'min'       => 1,
    'max'       => 10,
    'step'      => 1,
  ];

  $options_ethos_posts_display = [
    'unit_mode' => 'unitless',
    'min'       => 1,
    'max'       => 5,
    'step'      => 1,
  ];

  $options_ethos_post_slider_height = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '425px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 600, 'step' => 5 ],
    ],
  ];

  $options_site_width = [
    'available_units' => [ '%' ],
    'fallback_value'  => '88%',
    'ranges'          => [
      '%' => [ 'min' => 70, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_site_max_width = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '1200px',
    'ranges'          => [
      'px' => [ 'min' => 800, 'max' => 1400, 'step' => 10 ],
    ],
  ];

  $options_content_width = [
    'available_units' => [ '%' ],
    'fallback_value'  => '88%',
    'ranges'          => [
      '%' => [ 'min' => 70, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_sidebar_width = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '250px',
    'ranges'          => [
      'px' => [ 'min' => 200, 'max' => 300, 'step' => 5 ],
    ],
  ];

  $options_bg_image_fade = [
    'unit_mode'       => 'time',
    'available_units' => [ 'ms' ],
    'fallback_value'  => '750ms',
    'ranges'          => [
      'ms' => [ 'min' => 0, 'max' => 5000, 'step' => 50 ],
    ],
  ];

  $options_content_font_size = [
    'available_units' => [ 'rem' ],
    'fallback_value'  => '1rem',
    'ranges'          => [
      'rem' => [ 'min' => 0.5, 'max' => 2, 'step' => 0.005 ],
    ],
  ];

  $options_letter_spacing_compressed = [
    'available_units' => [ 'em' ],
    'fallback_value'  => '-0.015em',
    'ranges'          => [
      'em' => [ 'min' => -0.05, 'max' => 0.25, 'step' => 0.005 ],
    ],
  ];

  $options_letter_spacing_expanded = [
    'available_units' => [ 'em' ],
    'fallback_value'  => '0.085em',
    'ranges'          => [
      'em' => [ 'min' => -0.05, 'max' => 0.25, 'step' => 0.005 ],
    ],
  ];

  $options_navbar_top_height = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '90px',
    'ranges'          => [
      'px' => [ 'min' => 50, 'max' => 150, 'step' => 5 ],
    ],
  ];

  $options_navbar_side_width = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '235px',
    'ranges'          => [
      'px' => [ 'min' => 200, 'max' => 300, 'step' => 5 ],
    ],
  ];

  $options_logobar_adjust_spacing = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '15px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 50, 'step' => 1 ],
    ],
  ];

  $options_logo_font_size = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '42px',
    'ranges'          => [
      'px' => [ 'min' => 10, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_navbar_font_size = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '13px',
    'ranges'          => [
      'px' => [ 'min' => 10, 'max' => 24, 'step' => 1 ],
    ],
  ];

  $options_navbar_logo_and_links_adjust_top = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '22px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_navbar_logo_and_links_adjust_side = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '30px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_navbar_links_top_spacing = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '30px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_navbar_button_size = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '24px',
    'ranges'          => [
      'px' => [ 'min' => 20, 'max' => 50, 'step' => 1 ],
    ],
  ];

  $options_navbar_button_spacing = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '20px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 100, 'step' => 1 ],
    ],
  ];

  $options_topbar_content = [
    'height' => 4,
  ];

  $options_blog_excerpt_length = [
    'unit_mode' => 'unitless',
    'min'       => 10,
    'max'       => 200,
    'step'      => 5,
  ];

  $options_when_to_show_scroll_top_anchor = [
    'available_units' => [ '%' ],
    'fallback_value'  => '75%',
    'ranges'          => [
      '%' => [ 'min' => 0, 'max' => 100, 'step' => 5 ],
    ],
  ];

  $options_header_cart_alignment = [
    'available_units' => [ 'px' ],
    'fallback_value'  => '30px',
    'ranges'          => [
      'px' => [ 'min' => 0, 'max' => 100, 'step' => 1 ],
    ],
  ];




  // Conditions
  // ----------

  $condition_classic_headers_enabled              = [ 'virtual:classic_headers' => true ];
  $condition_classic_footers_enabled              = [ 'virtual:classic_footers' => true ];

  $condition_stack_is_integrity                   = [ 'x_stack' => 'integrity' ];
  $condition_stack_is_renew                       = [ 'x_stack' => 'renew' ];
  $condition_stack_is_icon                        = [ 'x_stack' => 'icon' ];
  $condition_stack_is_ethos                       = [ 'x_stack' => 'ethos' ];
  $condition_stack_is_not_integrity               = [ 'option' => 'x_stack', 'value' => 'integrity', 'op' => '!=' ];
  $condition_stack_is_not_icon                    = [ 'option' => 'x_stack', 'value' => 'icon', 'op' => '!=' ];

  $condition_integrity_blog_header_enable         = [ 'x_integrity_blog_header_enable' => true ];
  $condition_integrity_shop_header_enable         = [ 'x_integrity_shop_header_enable' => true ];

  $condition_renew_entry_icon_creative            = [ 'x_renew_entry_icon_position' => 'creative' ];

  $condition_ethos_post_carousel_enable           = [ 'x_ethos_post_carousel_enable' => true ];
  $condition_ethos_post_slider_blog_enable        = [ 'x_ethos_post_slider_blog_enable' => true ];
  $condition_ethos_post_slider_archive_enable     = [ 'x_ethos_post_slider_archive_enable' => true ];
  $condition_ethos_filterable_index_enable        = [ 'x_ethos_filterable_index_enable' => true ];

  $condition_layout_content_not_full_width        = [ 'option' => 'x_layout_content', 'value' => 'full-width', 'op' => '!=' ];

  $condition_root_font_size_mode_stepped          = [ 'x_root_font_size_mode' => 'stepped' ];
  $condition_root_font_size_mode_scaling          = [ 'x_root_font_size_mode' => 'scaling' ];
  $condition_font_manager_disabled                = [ 'x_enable_font_manager' => false ];
  $condition_font_manager_enabled                 = [ 'x_enable_font_manager' => true ];
  $condition_google_fonts_subsets_enabled         = [ 'x_google_fonts_subsets' => true ];

  $condition_button_background_color              = [ 'option' => 'x_button_style', 'value' => 'transparent', 'op' => '!=' ];
  $condition_button_bottom_color                  = [ 'option' => 'x_button_style', 'value' => [ 'flat', 'transparent' ], 'op' => 'NOT IN' ];

  $condition_navbar_fixed_left_or_right           = [ 'option' => 'x_navbar_positioning', 'value' => [ 'fixed-right', 'fixed-left' ], 'op' => 'IN' ];
  $condition_logo_navigation_stacked              = [ 'x_logo_navigation_layout' => 'stacked' ];
  $condition_header_has_widget_areas              = [ 'option' => 'x_header_widget_areas', 'value' => '0', 'op' => '!=' ];
  $condition_topbar_enabled                       = [ 'x_topbar_display' => true ];

  $condition_footer_bottom_display_enabled        = [ 'x_footer_bottom_display' => true ];
  $condition_footer_content_enabled               = [ 'x_footer_content_display' => true ];

  $condition_blog_style_masonry                   = [ 'x_blog_style' => 'masonry' ];
  $condition_archive_style_masonry                = [ 'x_archive_style' => 'masonry' ];
  $condition_blog_full_post_content_enable        = [ 'x_blog_enable_full_post_content' => false ];
  
  $condition_portfolio_enable                     = [ 'x_portfolio_enable' => true ];

  $condition_footer_scroll_top_enable             = [ 'x_footer_scroll_top_display' => true ];

  $condition_woocommerce_header_menu_enabled      = [ 'x_woocommerce_header_menu_enable' => true ];
  $condition_woocommerce_product_tabs_enable      = [ 'x_woocommerce_product_tabs_enable' => true ];
  $condition_woocommerce_related_products_enabled = [ 'x_woocommerce_product_related_enable' => true ];
  $condition_woocommerce_upsells_enabled          = [ 'x_woocommerce_product_upsells_enable' => true ];
  $condition_woocommerce_cross_sells_enabled      = [ 'x_woocommerce_cart_cross_sells_enable' => true ];


  // Labels
  // ------

  $labels = [
    'setup'                  => __( 'Setup', '__x__' ),
    'blog-options'           => __( 'Blog Options', '__x__' ),
    'portfolio-options'      => __( 'Portfolio Options', '__x__' ),
    'portfolio-enable'      => __( 'Portfolio Enabled', '__x__' ),
    'shop-options'           => __( 'Shop Options', '__x__' ),
    'typography-options'     => __( 'Typography Options', '__x__' ),
    'post-carousel'          => __( 'Post Carousel', '__x__' ),
    'post-slider-blog'       => __( 'Post Slider (Blog)', '__x__' ),
    'post-slider-archive'    => __( 'Post Slider (Archive)', '__x__' ),
    'root-font-size'         => __( 'Root Font Size', '__x__' ),
    'google-subsets'         => __( 'Google Subsets', '__x__' ),
    'body-and-content'       => __( 'Body and Content', '__x__' ),
    'headings'               => __( 'Headings', '__x__' ),
    'site-links'             => __( 'Site Links', '__x__' ),
    'woocommerce'            => __( 'WooCommerce', '__x__' ),
    'colors'                 => __( 'Colors', '__x__' ),
    'navbar'                 => __( 'Navbar', '__x__' ),
    'logo-and-navigation'    => __( 'Logo and Navigation', '__x__' ),
    'logo'                   => __( 'Logo', '__x__' ),
    'logo-image'             => __( 'Logo (Image)', '__x__' ),
    'logo-alignment'         => __( 'Logo (Alignment)', '__x__' ),
    'links'                  => __( 'Links', '__x__' ),
    'links-alignment'        => __( 'Links (Alignment)', '__x__' ),
    'search'                 => __( 'Search', '__x__' ),
    'mobile-button'          => __( 'Mobile Button', '__x__' ),
    'widgetbar'              => __( 'Widgetbar', '__x__' ),
    'miscellaneous'          => __( 'Miscellaneous', '__x__' ),
    'archives'               => __( 'Archives', '__x__' ),
    'content'                => __( 'Content', '__x__' ),
    'open-graph'             => __( 'Open Graph', '__x__' ),
    'font-awesome'           => __( 'Font Awesome', '__x__' ),
    'titles'                 => __( 'Titles', '__x__' ),
    'subtitles'              => __( 'Subtitles', '__x__' ),
    'columns'                => __( 'Columns', '__x__' ),
    'shop'                   => __( 'Shop', '__x__' ),
    'single-product-tabs'    => __( 'Single Product (Tabs)', '__x__' ),
    'single-product-related' => __( 'Single Product (Related Products)', '__x__' ),
    'single-product-upsells' => __( 'Single Product (Upsells)', '__x__' ),
    'cart'                   => __( 'Cart', '__x__' ),
    'widgets'                => __( 'Widgets', '__x__' ),
    'labels'                 => __( 'Labels', '__x__' ),
    'social'                 => __( 'Social', '__x__' ),
    'scroll-top-anchor'      => __( 'Scroll Top Anchor', '__x__' ),
    'navbar-cart'            => __( 'Navbar Cart', '__x__' ),
  ];


  // Groups
  // ------

  $groups = [
    'x-stack'                           => __( 'Stack', '__x__' ),
    'x-stack:setup'                     => $labels['setup'],
    'x-stack:blog'                      => $labels['blog-options'],
    'x-stack:portfolio'                 => $labels['portfolio-options'],
    'x-stack:shop'                      => $labels['shop-options'],
    'x-stack:post-carousel'             => $labels['post-carousel'],
    'x-stack:post-slider-blog'          => $labels['post-slider-blog'],
    'x-stack:post-slider-archive'       => $labels['post-slider-archive'],

    'x-layout-and-design'               => __( 'Layout and Design', '__x__' ),
    'x-layout-and-design:setup'         => $labels['setup'],

    'x-typography'                      => __( 'Typography', '__x__' ),
    'x-typography:setup'                => $labels['setup'],
    'x-typography:root-font-size'       => $labels['root-font-size'],
    'x-typography:google-subsets'       => $labels['google-subsets'],
    'x-typography:body-and-content'     => $labels['body-and-content'],
    'x-typography:headings'             => $labels['headings'],
    'x-typography:site-links'           => $labels['site-links'],

    'x-buttons'                         => __( 'Buttons', '__x__' ),
    'x-buttons:setup'                   => $labels['setup'],
    'x-buttons:colors'                  => $labels['colors'],

    'x-headers'                         => __( 'Headers', '__x__' ),
    'x-headers:navbar'                  => $labels['navbar'],
    'x-headers:logo-and-navigation'     => $labels['logo-and-navigation'],
    'x-headers:logo'                    => $labels['logo'],
    'x-headers:logo-image'              => $labels['logo-image'],
    'x-headers:logo-alignment'          => $labels['logo-alignment'],
    'x-headers:links'                   => $labels['links'],
    'x-headers:links-alignment'         => $labels['links-alignment'],
    'x-headers:search'                  => $labels['search'],
    'x-headers:mobile-button'           => $labels['mobile-button'],
    'x-headers:widgetbar'               => $labels['widgetbar'],
    'x-headers:miscellaneous'           => $labels['miscellaneous'],

    'x-footers'                         => __( 'Footers', '__x__' ),
    'x-footers:setup'                   => $labels['setup'],

    'x-blog'                            => __( 'Blog', '__x__' ),
    'x-blog:setup'                      => $labels['setup'],
    'x-blog:archives'                   => $labels['archives'],
    'x-blog:content'                    => $labels['content'],

    'x-portfolio'                       => __( 'Portfolio', '__x__' ),
    'x-portfolio:setup'                 => $labels['setup'],
    'x-portfolio:labels'                => $labels['labels'],
    'x-portfolio:social'                => $labels['social'],

    'x-social'                          => __( 'Social', '__x__' ),
    'x-social:setup'                    => $labels['setup'],
    'x-social:open-graph'               => $labels['open-graph'],

    'x-miscellaneous'                   => __( 'Miscellaneous', '__x__' ),
    'x-miscellaneous:scroll-top-anchor' => $labels['scroll-top-anchor'],
    'x-miscellaneous:font-awesome'      => $labels['font-awesome'],
  ];


  // Controls
  // --------

  $controls = [];


  // Stacks
  // ------

  $controls[] = [
    'type'        => 'group',
    // 'label'       => $labels['setup'],
    'group'       => 'x-stack:setup',
    'description' => __( 'Select the Stack you would like to use as your base style and adjust its settings accordingly below.', '__x__' ),
    // 'description' => __( 'Renew features a gorgeous look and feel that lends a clean, modern look to your site. All of your content will take center stage with Renew in place.', '__x__' ),
    // 'description' => __( 'Icon features a stunning, modern, fullscreen design with a unique fixed sidebar layout that scolls with users on larger screens as you move down the page. The end result is attractive, app-like, and intuitive.', '__x__' ),
    // 'description' => __( 'Ethos is a magazine-centric design that works great for blogs, news sites, or anything else that is content heavy with a focus on information. Customize the appearance of various items below and take note that some of these accent colors will be used for additional elements. For example, the "Navbar Background Color" option will also update the appearance of the widget titles in your sidebar.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_stack',
        'type'    => 'select',
        'label'   => __( 'Stack', '__x__' ),
        'options' => [ 'choices' => $choices_stacks ],
      ],


      // Integrity
      // ---------

      [
        'key'        => 'x_integrity_design',
        'type'       => 'choose',
        'label'      => __( 'Design', '__x__' ),
        'options'    => [ 'choices' => $choices_light_dark ],
        'conditions' => [ $condition_stack_is_integrity ],
      ],
      [
        'key'        => 'x_integrity_topbar_transparency_enable',
        'type'       => 'toggle',
        'label'      => __( 'Transparent Topbar', '__x__' ),
        'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
        'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_integrity_navbar_transparency_enable',
        'type'       => 'toggle',
        'label'      => __( 'Transparent Navbar', '__x__' ),
        'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
        'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_integrity_footer_transparency_enable',
        'type'       => 'toggle',
        'label'      => __( 'Transparent Footer', '__x__' ),
        'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
        'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled ],
      ],


      // Renew
      // -----

      [
        'keys' => [
          'value' => 'x_renew_topbar_text_color',
          'alt'   => 'x_renew_topbar_link_color_hover',
        ],
        'type'       => 'color',
        'label'      => __( 'Topbar', '__x__' ),
        'options'    => cs_recall( 'options_swatch_base_interaction_labels' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_renew_topbar_background',
        'type'       => 'color',
        'label'      => __( 'Topbar Background', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_renew_logobar_background',
        'type'       => 'color',
        'label'      => __( 'Logobar Background', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_renew_navbar_background',
        'type'       => 'color',
        'label'      => __( 'Navbar Background', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_renew_navbar_button_color',
        'type'       => 'color',
        'label'      => __( 'Toggle', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'keys' => [
          'value' => 'x_renew_navbar_button_background',
          'alt'   => 'x_renew_navbar_button_background_hover',
        ],
        'type'       => 'color',
        'label'      => __( 'Toggle Background', '__x__' ),
        'options'    => cs_recall( 'options_swatch_base_interaction_labels' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_renew_entry_icon_color',
        'type'       => 'color',
        'label'      => __( 'Entry Icons', '__x__' ),
        'conditions' => [ $condition_stack_is_renew ],
      ],
      [
        'key'        => 'x_renew_footer_text_color',
        'type'       => 'color',
        'label'      => __( 'Footer', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_footers_enabled ],
      ],
      [
        'key'        => 'x_renew_footer_background',
        'type'       => 'color',
        'label'      => __( 'Footer Background', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_footers_enabled ],
      ],


      // Ethos
      // -----

      [
        'key'        => 'x_ethos_topbar_background',
        'type'       => 'color',
        'label'      => __( 'Topbar Background', '__x__' ),
        'conditions' => [ $condition_stack_is_ethos, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_ethos_navbar_background',
        'type'       => 'color',
        'label'      => __( 'Navbar Background', '__x__' ),
        'conditions' => [ $condition_stack_is_ethos, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_ethos_sidebar_widget_headings_color',
        'type'       => 'color',
        'label'      => __( 'Widget Headings', '__x__' ),
        'conditions' => [ $condition_stack_is_ethos ],
      ],
      [
        'key'        => 'x_ethos_sidebar_color',
        'type'       => 'color',
        'label'      => __( 'Widget Text', '__x__' ),
        'conditions' => [ $condition_stack_is_ethos ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['blog-options'],
    'group'       => 'x-stack:blog',
    // 'description' => __( 'Enabling the blog header will turn on the area above your posts on the index page that contains your title and subtitle. Disabling it will result in more content being visible above the fold.', '__x__' ),
    // 'description' => __( 'The entry icon color is for the post icons to the left of each title. Selecting "Creative" under the "Entry Icon Position" setting will allow you to align your entry icons in a different manner on your posts index page when "Content Left, Sidebar Right" or "Fullwidth" are selected as your "Content Layout" and when your blog "Style" is set to "Standard." This feature is intended to be paired with a "Boxed" layout.', '__x__' ),
    // 'description' => __( 'Enabling the filterable index will bypass the standard output of your blog page, allowing you to specify categories to highlight. Upon selecting this option, a text input will appear to enter in the IDs of the categories you would like to showcase. This input accepts a list of numeric IDs separated by a comma (e.g. 14, 1, 817).', '__x__' ),
    'controls'    => [

      // Integrity
      // ---------

      [
        'key'        => 'x_integrity_blog_header_enable',
        'type'       => 'toggle',
        'label'      => __( 'Header', '__x__' ),
        'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
        'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_integrity_blog_title',
        'type'       => 'text',
        'label'      => __( 'Title', '__x__' ),
        'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled, $condition_integrity_blog_header_enable ],
      ],
      [
        'key'        => 'x_integrity_blog_subtitle',
        'type'       => 'text',
        'label'      => __( 'Subtitle', '__x__' ),
        'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled, $condition_integrity_blog_header_enable ],
      ],


      // Renew
      // -----

      [
        'key'        => 'x_renew_blog_title',
        'type'       => 'text',
        'label'      => __( 'Title', '__x__' ),
        'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
      ],
      [
        'key'        => 'x_renew_entry_icon_position',
        'type'       => 'select',
        'label'      => __( 'Entry Icon', '__x__' ),
        'options'    => [ 'choices' => $choices_renew_entry_icon_position ],
        'conditions' => [ $condition_stack_is_renew ],
      ],
      [
        'key'        => 'x_renew_entry_icon_position_horizontal',
        'type'       => 'unit-slider',
        'label'      => __( 'Horizontal Alignment', '__x__' ),
        'options'    => $options_renew_entry_icon_horizontal_alignment,
        'conditions' => [ $condition_stack_is_renew, $condition_renew_entry_icon_creative ],
      ],
      [
        'key'        => 'x_renew_entry_icon_position_vertical',
        'type'       => 'unit-slider',
        'label'      => __( 'Vertical Alignment', '__x__' ),
        'options'    => $options_renew_entry_icon_vertical_alignment,
        'conditions' => [ $condition_stack_is_renew, $condition_renew_entry_icon_creative ],
      ],


      // Icon
      // ----

      [
        'key'        => 'x_icon_post_title_icon_enable',
        'type'       => 'toggle',
        'label'      => __( 'Post Icons', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'key'        => 'x_icon_post_standard_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Standard<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_standard_color',
          'alt'   => 'x_icon_post_standard_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_standard_colors_enable' => true ] ],
      ],
      [
        'key'        => 'x_icon_post_image_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Image<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_image_color',
          'alt'   => 'x_icon_post_image_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_image_colors_enable' => true ] ],
      ],
      [
        'key'        => 'x_icon_post_gallery_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Gallery<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_gallery_color',
          'alt'   => 'x_icon_post_gallery_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_gallery_colors_enable' => true ] ],
      ],
      [
        'key'        => 'x_icon_post_video_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Video<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_video_color',
          'alt'   => 'x_icon_post_video_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_video_colors_enable' => true ] ],
      ],
      [
        'key'        => 'x_icon_post_audio_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Audio<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_audio_color',
          'alt'   => 'x_icon_post_audio_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_audio_colors_enable' => true ] ],
      ],
      [
        'key'        => 'x_icon_post_quote_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Quote<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_quote_color',
          'alt'   => 'x_icon_post_quote_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_quote_colors_enable' => true ] ],
      ],
      [
        'key'        => 'x_icon_post_link_colors_enable',
        'type'       => 'toggle',
        'label'      => __( 'Link<br/>Colors', '__x__' ),
        'conditions' => [ $condition_stack_is_icon ],
      ],
      [
        'keys' => [
          'value' => 'x_icon_post_link_color',
          'alt'   => 'x_icon_post_link_background',
        ],
        'type'       => 'color',
        'label'      => '&nbsp;',
        'options'    => $options_icon_color_labels,
        'conditions' => [ $condition_stack_is_icon, [ 'x_icon_post_link_colors_enable' => true ] ],
      ],


      // Ethos
      // -----

      [
        'key'        => 'x_ethos_filterable_index_enable',
        'type'       => 'toggle',
        'label'      => __( 'Filterable Index', '__x__' ),
        'conditions' => [ $condition_stack_is_ethos ],
      ],
      [
        'key'        => 'x_ethos_filterable_index_categories',
        'type'       => 'text',
        'label'      => __( 'Category IDs', '__x__' ),
        'conditions' => [ $condition_stack_is_ethos, $condition_ethos_filterable_index_enable ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['portfolio-options'],
    'group'       => 'x-stack:portfolio',
    'conditions'  => [ $condition_stack_is_integrity, $condition_classic_headers_enabled ],
    // 'description' => __( 'Enabling portfolio index sharing will turn on social sharing links for each post on the portfolio index page. Activate and deactivate individual sharing links underneath the main Portfolio section.', '__x__' ),
    'controls'    => [
      [
        'key'   => 'x_integrity_portfolio_archive_sort_button_text',
        'type'  => 'text',
        'label' => __( 'Sort Button Text', '__x__' ),
      ],
      [
        'key'   => 'x_integrity_portfolio_archive_post_sharing_enable',
        'type'  => 'toggle',
        'label' => __( 'Index Sharing', '__x__' ),
      ],
    ],
  ];

  if ( X_WOOCOMMERCE_IS_ACTIVE ) {
    $controls[] = [
      'type'        => 'group',
      'label'       => $labels['shop-options'],
      'group'       => 'x-stack:shop',
      // 'description' => __( 'Enabling the shop header will turn on the area above your posts on the index page that contains your title and subtitle. Disabling it will result in more content being visible above the fold.', '__x__' ),
      // 'description' => __( 'Provide a title you would like to use for your shop. This will show up on the index page as well as in your breadcrumbs.', '__x__' ),
      // 'description' => __( 'Provide a title you would like to use for your shop. This will show up on the index page as well as in your breadcrumbs.', '__x__' ),
      // 'description' => __( 'Provide a title you would like to use for your shop. This will show up on the index page as well as in your breadcrumbs.', '__x__' ),
      'controls'    => [

        // Integrity
        // ---------

        [
          'key'        => 'x_integrity_shop_header_enable',
          'type'       => 'toggle',
          'label'      => __( 'Header', '__x__' ),
          'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
          'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled ],
        ],
        [
          'key'        => 'x_integrity_shop_title',
          'type'       => 'text',
          'label'      => __( 'Title', '__x__' ),
          'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled, $condition_integrity_shop_header_enable ]
        ],
        [
          'key'        => 'x_integrity_shop_subtitle',
          'type'       => 'text',
          'label'      => __( 'Subtitle', '__x__' ),
          'conditions' => [ $condition_stack_is_integrity, $condition_classic_headers_enabled, $condition_integrity_shop_header_enable ]
        ],


        // Renew
        // -----

        [
          'key'        => 'x_renew_shop_title',
          'type'       => 'text',
          'label'      => __( 'Title', '__x__' ),
          'conditions' => [ $condition_stack_is_renew, $condition_classic_headers_enabled ],
        ],


        // Icon
        // ----

        [
          'key'        => 'x_icon_shop_title',
          'type'       => 'text',
          'label'      => __( 'Title', '__x__' ),
          'conditions' => [ $condition_stack_is_icon, $condition_classic_headers_enabled ],
        ],


        // Ethos
        // -----

        [
          'key'        => 'x_ethos_shop_title',
          'type'       => 'text',
          'label'      => __( 'Title', '__x__' ),
          'conditions' => [ $condition_stack_is_ethos, $condition_classic_headers_enabled ],
        ],
      ],
    ];
  }

  $controls[] = [
    'key'         => 'x_ethos_post_carousel_enable',
    'type'        => 'group',
    'label'       => $labels['post-carousel'],
    'group'       => 'x-stack:post-carousel',
    'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
    'conditions'  => [ $condition_stack_is_ethos, $condition_classic_headers_enabled ],
    // 'description' => __( 'The "Post Carousel" is an element located above the masthead, which allows you to showcase your posts in various formats. If "Featured" is selected, you can choose which posts you would like to appear in this location in the post meta options.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_ethos_post_carousel_display',
        'type'       => 'select',
        'label'      => __( 'Display', '__x__' ),
        'options'    => [ 'choices' => $choices_ethos_post_carousel_and_slider_display ],
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
      [
        'key'        => 'x_ethos_post_carousel_count',
        'type'       => 'unit-slider',
        'label'      => __( 'Posts Per Page', '__x__' ),
        'options'    => $options_ethos_posts_per_page,
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
      [
        'key'        => 'x_ethos_post_carousel_display_count_extra_large',
        'type'       => 'unit-slider',
        'label'      => __( 'Extra Large<br/>Count', '__x__' ),
        'options'    => $options_ethos_posts_display,
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
      [
        'key'        => 'x_ethos_post_carousel_display_count_large',
        'type'       => 'unit-slider',
        'label'      => __( 'Large<br/>Count', '__x__' ),
        'options'    => $options_ethos_posts_display,
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
      [
        'key'        => 'x_ethos_post_carousel_display_count_medium',
        'type'       => 'unit-slider',
        'label'      => __( 'Medium<br/>Count', '__x__' ),
        'options'    => $options_ethos_posts_display,
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
      [
        'key'        => 'x_ethos_post_carousel_display_count_small',
        'type'       => 'unit-slider',
        'label'      => __( 'Small<br/>Count', '__x__' ),
        'options'    => $options_ethos_posts_display,
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
      [
        'key'        => 'x_ethos_post_carousel_display_count_extra_small',
        'type'       => 'unit-slider',
        'label'      => __( 'Extra Small<br/>Count', '__x__' ),
        'options'    => $options_ethos_posts_display,
        'conditions' => [ $condition_ethos_post_carousel_enable ],
      ],
    ],
  ];

  $controls[] = [
    'key'         => 'x_ethos_post_slider_blog_enable',
    'type'        => 'group',
    'label'       => $labels['post-slider-blog'],
    'group'       => 'x-stack:post-slider-blog',
    'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
    'conditions'  => [ $condition_stack_is_ethos ],
    // 'description' => __( 'The blog "Post Slider" is located at the top of the posts index page, which allows you to showcase your posts in various formats. If "Featured" is selected, you can choose which posts you would like to appear in this location in the post meta options. The archive "Post Slider" is located at the top of all archive pages, which allows you to showcase your posts in various formats. If "Featured" is selected, you can choose which posts you would like to appear in this location in the post meta options.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_ethos_post_slider_blog_display',
        'type'       => 'select',
        'label'      => __( 'Display', '__x__' ),
        'options'    => [ 'choices' => $choices_ethos_post_carousel_and_slider_display ],
        'conditions' => [ $condition_ethos_post_slider_blog_enable ],
      ],
      [
        'key'        => 'x_ethos_post_slider_blog_count',
        'type'       => 'unit-slider',
        'label'      => __( 'Posts Per Page', '__x__' ),
        'options'    => $options_ethos_posts_per_page,
        'conditions' => [ $condition_ethos_post_slider_blog_enable ],
      ],
      [
        'key'        => 'x_ethos_post_slider_blog_height',
        'type'       => 'unit-slider',
        'label'      => __( 'Height', '__x__' ),
        'options'    => $options_ethos_post_slider_height,
        'conditions' => [ $condition_ethos_post_slider_blog_enable ],
      ],
    ],
  ];

  $controls[] = [
    'key'         => 'x_ethos_post_slider_archive_enable',
    'type'        => 'group',
    'label'       => $labels['post-slider-archive'],
    'group'       => 'x-stack:post-slider-archive',
    'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
    'conditions'  => [ $condition_stack_is_ethos ],
    // 'description' => __( 'The blog "Post Slider" is located at the top of the posts index page, which allows you to showcase your posts in various formats. If "Featured" is selected, you can choose which posts you would like to appear in this location in the post meta options. The archive "Post Slider" is located at the top of all archive pages, which allows you to showcase your posts in various formats. If "Featured" is selected, you can choose which posts you would like to appear in this location in the post meta options.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_ethos_post_slider_archive_display',
        'type'       => 'select',
        'label'      => __( 'Display', '__x__' ),
        'options'    => [ 'choices' => $choices_ethos_post_carousel_and_slider_display ],
        'conditions' => [ $condition_ethos_post_slider_archive_enable ],
      ],
      [
        'key'        => 'x_ethos_post_slider_archive_count',
        'type'       => 'unit-slider',
        'label'      => __( 'Posts Per Page', '__x__' ),
        'options'    => $options_ethos_posts_per_page,
        'conditions' => [ $condition_ethos_post_slider_archive_enable ],
      ],
      [
        'key'        => 'x_ethos_post_slider_archive_height',
        'type'       => 'unit-slider',
        'label'      => __( 'Height', '__x__' ),
        'options'    => $options_ethos_post_slider_height,
        'conditions' => [ $condition_ethos_post_slider_archive_enable ],
      ],
    ],
  ];


  // Layout and Design
  // -----------------

  $controls[] = [
    'type'        => 'group',
    // 'label'       => $labels['setup'],
    'group'       => 'x-layout-and-design:setup',
    // 'description' => __( 'Select your site\'s global layout options here. "Site Width" is the percentage of the screen your site should take up while you can think of "Site Max Width" as an upper limit that your site will never be wider than. "Content Layout" has to do with your site\'s global setup of having a sidebar or not. The "Background Pattern" setting will override the "Background Color" unless the image used is transparent, and the "Background Image" option will take precedence over both. The "Background Image Fade (ms)" option allows you to set a time in milliseconds for your image to fade in. To disable this feature, set the value to "0."', '__x__' ),
    'description' => __( 'Specify the values for various fundamental features of your site such as the primary width, max width, et cetera.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_layout_site',
        'type'    => 'choose',
        'label'   => __( 'Site Layout', '__x__' ),
        'options' => [ 'choices' => $choices_fullwidth_boxed ],
      ],
      [
        'key'     => 'x_layout_content',
        'type'    => 'select',
        'label'   => __( 'Content Layout', '__x__' ),
        'options' => [ 'choices' => $choices_layout_content ],
      ],
      [
        'key'     => 'x_layout_site_width',
        'type'    => 'unit-slider',
        'label'   => __( 'Site Width', '__x__' ),
        'options' => $options_site_width,
      ],
      [
        'key'     => 'x_layout_site_max_width',
        'type'    => 'unit-slider',
        'label'   => __( 'Site Max Width', '__x__' ),
        'options' => $options_site_max_width,
      ],      [
        'key'        => 'x_layout_content_width',
        'type'       => 'unit-slider',
        'label'      => __( 'Content Width', '__x__' ),
        'options'    => $options_content_width,
        'conditions' => [ $condition_stack_is_not_icon, $condition_layout_content_not_full_width ],
      ],
      [
        'key'        => 'x_layout_sidebar_width',
        'type'       => 'unit-slider',
        'label'      => __( 'Sidebar Width', '__x__' ),
        'options'    => $options_sidebar_width,
        'conditions' => [ $condition_stack_is_icon, $condition_layout_content_not_full_width ],
      ],
      [
        'key'   => 'x_design_bg_color',
        'type'  => 'color',
        'label' => __( 'Background Color', '__x__' ),
      ],
      [
        'key'     => 'x_design_bg_image_pattern',
        'type'    => 'image',
        'label'   => __( 'Background Pattern', '__x__' ),
        'options' => [ 'pattern' => true ],
      ],
      [
        'key'   => 'x_design_bg_image_full',
        'type'  => 'image',
        'label' => __( 'Background Image', '__x__' ),
      ],
      [
        'key'     => 'x_design_bg_image_full_fade',
        'type'    => 'unit-slider',
        'label'   => __( 'Background Image Fade', '__x__' ),
        'options' => $options_bg_image_fade,
      ],
    ],
  ];


  // Typography
  // ----------

  $controls[] = [
    'key'         => 'x_enable_font_manager',
    'type'        => 'group',
    'label'       => __( 'Enable Font Manager', '__x__' ),
    'group'       => 'x-typography:setup',
    // 'description' => __( 'Here you will find global typography options for your body copy and headings, while more specific typography options for elements like your navbar are found grouped with that element to make customization more streamlined. If you are using Google Fonts, you can also enable custom subsets here for expanded character sets.', '__x__' ),
    'description' => __( 'Assign your own font selections instead of directly using System or Google Fonts.', '__x__' ),
    'options'     => cs_recall( 'options_group_toggle_off_on_bool' ),
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['root-font-size'],
    'group'       => 'x-typography:root-font-size',
    'description' => __( 'Select the method for outputting your site\'s root font size, then adjust the settings to suit your design. "Stepped" mode allows you to set a font size at each of your site\'s breakpoints, whereas "Scaling" will dynamically scale between a range of minimum and maximum font sizes and breakpoints that you specify.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_root_font_size_mode',
        'type'    => 'choose',
        'label'   => __( 'Mode', '__x__' ),
        'options' => [ 'choices' => $choices_root_font_size_mode ],
      ],
      [
        'key'        => 'x_root_font_size_stepped_unit',
        'type'       => 'choose',
        'label'      => __( 'Unit', '__x__' ),
        'options'    => [ 'choices' => $choices_px_em ],
        'conditions' => [ $condition_root_font_size_mode_stepped ],
      ],
      [
        'key'        => 'x_root_font_size_stepped_xs',
        'type'       => 'text',
        'label'      => __( 'XS Breakpoint', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_stepped ],
      ],
      [
        'key'        => 'x_root_font_size_stepped_sm',
        'type'       => 'text',
        'label'      => __( 'SM Breakpoint', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_stepped ],
      ],
      [
        'key'        => 'x_root_font_size_stepped_md',
        'type'       => 'text',
        'label'      => __( 'MD Breakpoint', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_stepped ],
      ],
      [
        'key'        => 'x_root_font_size_stepped_lg',
        'type'       => 'text',
        'label'      => __( 'LG Breakpoint', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_stepped ],
      ],
      [
        'key'        => 'x_root_font_size_stepped_xl',
        'type'       => 'text',
        'label'      => __( 'XL Breakpoint', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_stepped ],
      ],
      [
        'key'        => 'x_root_font_size_scaling_unit',
        'type'       => 'choose',
        'label'      => __( 'Font Size Unit', '__x__' ),
        'options'    => [ 'choices' => $choices_px_em ],
        'conditions' => [ $condition_root_font_size_mode_scaling ],
      ],
      [
        'key'        => 'x_root_font_size_scaling_min',
        'type'       => 'text',
        'label'      => __( 'Minimum Font Size', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_scaling ],
      ],
      [
        'key'        => 'x_root_font_size_scaling_max',
        'type'       => 'text',
        'label'      => __( 'Maximum Font Size', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_scaling ],
      ],
      [
        'key'        => 'x_root_font_size_scaling_lower_limit',
        'type'       => 'text',
        'label'      => __( 'Lower Limit', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_scaling ],
      ],
      [
        'key'        => 'x_root_font_size_scaling_upper_limit',
        'type'       => 'text',
        'label'      => __( 'Upper Limit', '__x__' ),
        'conditions' => [ $condition_root_font_size_mode_scaling ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['body-and-content'],
    'group'       => 'x-typography:body-and-content',
    'description' => __( '"Content Font Size" will affect the sizing of all copy inside a post or page content area. It uses rems, which are a unit relative to your root font size. For example, if your root font size is 10px and you want your content font size to be 12px, you would enter "1.2" as a value. Headings are set with percentages and sized proportionally to these settings.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_body_font_family_selection',
        'type'       => 'font-family',
        'label'      => __( 'Font Family', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_body_font_family',
        'type'       => 'select',
        'label'      => __( 'Font Family', '__x__' ),
        'options'    => [ 'choices' => $choices_list_font_families ],
        'conditions' => [ $condition_font_manager_disabled ],
      ],
      [
        'keys' => [
          'value'       => 'x_body_font_weight_selection',
          'font_family' => 'x_body_font_family_selection'
        ],
        'type'       => 'font-weight',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_body_font_weight',
        'type'       => 'select',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_disabled ],
        'options'    => [
          'filter'  => [ 'key' => 'choices', 'method' => 'font-weights', 'source' => 'x_body_font_family' ],
          'choices' => $choices_list_font_weights,
        ],
      ],
      [
        'key'        => 'x_body_font_italic',
        'type'       => 'toggle',
        'label'      => __( 'Italic', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'   => 'x_body_font_color',
        'type'  => 'color',
        'label' => __( 'Color', '__x__' ),
      ],
      [
        'key'     => 'x_content_font_size_rem',
        'type'    => 'unit-slider',
        'label'   => __( 'Content Font Size', '__x__' ),
        'options' => $options_content_font_size,
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['headings'],
    'group'       => 'x-typography:headings',
    'description' => __( 'The letter spacing controls for each heading level will only affect that heading if it does not have a "looks like" class or if the "looks like" class matches that level. For example, if you have an &lt;h1&gt; with no modifier class, the &lt;h1&gt; slider will affect that heading. However, if your &lt;h1&gt; has an .h2 modifier class, then the &lt;h2&gt; slider will take over as it is supposed to appear as an &lt;h2&gt;.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_headings_font_family_selection',
        'type'       => 'font-family',
        'label'      => __( 'Font Family', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_headings_font_family',
        'type'       => 'select',
        'label'      => __( 'Font Family', '__x__' ),
        'conditions' => [ $condition_font_manager_disabled ],
        'options'    => [ 'choices' => $choices_list_font_families ],
      ],
      [
        'keys' => [
          'value'       => 'x_headings_font_weight_selection',
          'font_family' => 'x_headings_font_family_selection'
        ],
        'type'       => 'font-weight',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_headings_font_weight',
        'type'       => 'select',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_disabled ],
        'options'    => [
          'filter'  => [ 'key' => 'choices', 'method' => 'font-weights', 'source' => 'x_headings_font_family' ],
          'choices' => $choices_list_font_weights,
        ],
      ],
      [
        'key'     => 'x_h1_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'h1 Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'     => 'x_h2_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'h2 Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'     => 'x_h3_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'h3 Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'     => 'x_h4_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'h4 Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'     => 'x_h5_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'h5 Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'     => 'x_h6_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'h6 Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'        => 'x_headings_font_italic',
        'type'       => 'toggle',
        'label'      => __( 'Italic', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'     => 'x_headings_uppercase_enable',
        'type'    => 'toggle',
        'label'   => __( 'Uppercase', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'   => 'x_headings_font_color',
        'type'  => 'color',
        'label' => __( 'Color', '__x__' ),
      ],
      [
        'key'     => 'x_headings_widget_icons_enable',
        'type'    => 'toggle',
        'label'   => __( 'Widget Icons', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['site-links'],
    'group'       => 'x-typography:site-links',
    'description' => __( 'Site link colors are also used as accents for various elements throughout your site, so make sure to select something you really enjoy and keep an eye out for how it affects your design.', '__x__' ),
    'controls'    => [
      [
        'keys' => [
          'value' => 'x_site_link_color',
          'alt'   => 'x_site_link_color_hover',
        ],
        'type'    => 'color',
        'label'   => __( 'Color', '__x__' ),
        'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
      ],
    ],
  ];

  $controls[] = [
    'key'        => 'x_google_fonts_subsets',
    'type'       => 'group',
    'label'      => $labels['google-subsets'],
    'group'      => 'x-typography:google-subsets',
    'conditions' => [ $condition_font_manager_disabled ],
    'options'    => cs_recall( 'options_group_toggle_off_on_bool' ),
    'controls'   => [
      [
        'key'        => 'x_google_fonts_subset_cyrillic',
        'type'       => 'toggle',
        'label'      => __( 'Cyrillic', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_google_fonts_subsets_enabled ],
      ],
      [
        'key'        => 'x_google_fonts_subset_greek',
        'type'       => 'toggle',
        'label'      => __( 'Greek', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_google_fonts_subsets_enabled ],
      ],
      [
        'key'        => 'x_google_fonts_subset_vietnamese',
        'type'       => 'toggle',
        'label'      => __( 'Vietnamese', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_google_fonts_subsets_enabled ],
      ],
    ],
  ];


  // Buttons
  // -------

  $controls[] = [
    'type'        => 'group',
    // 'label'       => $labels['setup'],
    'group'       => 'x-buttons:setup',
    // 'description' => __( 'Retina ready, limitless colors, and multiple shapes. The buttons available in X are fun to use, simple to implement, and look great on all devices no matter the size.', '__x__' ),
    'description' => __( 'The button styles specified here will be utilized for native WordPress elements such as comment forms, add to cart actions, et cetera.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_button_style',
        'type'    => 'select',
        'label'   => __( 'Style', '__x__' ),
        'options' => [ 'choices' => $choices_button_style ],
      ],
      [
        'key'     => 'x_button_shape',
        'type'    => 'select',
        'label'   => __( 'Shape', '__x__' ),
        'options' => [ 'choices' => $choices_button_shape ],
      ],
      [
        'key'     => 'x_button_size',
        'type'    => 'select',
        'label'   => __( 'Size', '__x__' ),
        'options' => [ 'choices' => $choices_button_size ],
      ],
      [
        'keys' => [
          'value' => 'x_button_color',
          'alt'   => 'x_button_color_hover',
        ],
        'type'    => 'color',
        'label'   => __( 'Color', '__x__' ),
        'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
      ],
      [
        'keys' => [
          'value' => 'x_button_background_color',
          'alt'   => 'x_button_background_color_hover',
        ],
        'type'       => 'color',
        'label'      => __( 'Background', '__x__' ),
        'options'    => cs_recall( 'options_swatch_base_interaction_labels' ),
        'conditions' => [ $condition_button_background_color ],
      ],
      [
        'keys' => [
          'value' => 'x_button_border_color',
          'alt'   => 'x_button_border_color_hover',
        ],
        'type'    => 'color',
        'label'   => __( 'Border', '__x__' ),
        'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
      ],
      [
        'keys' => [
          'value' => 'x_button_bottom_color',
          'alt'   => 'x_button_bottom_color_hover',
        ],
        'type'       => 'color',
        'label'      => __( 'Bottom', '__x__' ),
        'options'    => cs_recall( 'options_swatch_base_interaction_labels' ),
        'conditions' => [ $condition_button_bottom_color ],
      ],
    ],
  ];


  // Headers
  // -------

  $controls[] = [
    'type'        => 'group',
    // 'label'       => $labels['navbar'],
    'group'       => 'x-headers:navbar',
    // 'description' => 'component:options/launch-headers',
    'description' => __( '"Top Height" must still be set even when using "Fixed Left" or "Fixed Right" positioning because on tablet and mobile devices, the menu is pushed to the top.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_navbar_positioning',
        'type'    => 'select',
        'label'   => __( 'Position', '__x__' ),
        'options' => [ 'choices' => $choices_navbar_position ],
      ],
      [
        'key'        => 'x_fixed_menu_scroll',
        'type'       => 'select',
        'label'      => __( 'Scrolling', '__x__' ),
        'options'    => [ 'choices' => $choices_navbar_scrolling ],
        'conditions' => [ $condition_navbar_fixed_left_or_right ],
      ],
      [
        'key'     => 'x_navbar_height',
        'type'    => 'unit-slider',
        'label'   => __( 'Top Height', '__x__' ),
        'options' => $options_navbar_top_height,
      ],
      [
        'key'        => 'x_navbar_width',
        'type'       => 'unit-slider',
        'label'      => __( 'Side Width', '__x__' ),
        'options'    => $options_navbar_side_width,
        'conditions' => [ $condition_navbar_fixed_left_or_right ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['logo-and-navigation'],
    'group'       => 'x-headers:logo-and-navigation',
    'description' => __( 'Selecting "Inline" for your logo and navigation layout will place them both in the navbar. Selecting "Stacked" will place the logo in a separate section above the navbar.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_logo_navigation_layout',
        'type'    => 'choose',
        'label'   => __( 'Layout', '__x__' ),
        'options' => [ 'choices' => $choices_inline_or_stacked ],
      ],
      [
        'key'        => 'x_logobar_adjust_spacing_top',
        'type'       => 'unit-slider',
        'label'      => __( 'Logobar Top', '__x__' ),
        'options'    => $options_logobar_adjust_spacing,
        'conditions' => [ $condition_logo_navigation_stacked ],
      ],
      [
        'key'        => 'x_logobar_adjust_spacing_bottom',
        'type'       => 'unit-slider',
        'label'      => __( 'Logobar Bottom', '__x__' ),
        'options'    => $options_logobar_adjust_spacing,
        'conditions' => [ $condition_logo_navigation_stacked ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['logo'],
    'group'       => 'x-headers:logo',
    'description' => __( 'Your logo will show up as the site title by default, but can be overwritten below (it is also used as the alt text should you choose to use an image). Alternately, if you would like to use an image, upload it below. Logo alignment can also be adjusted in this section.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'   => 'x_logo_text',
        'type'  => 'text',
        'label' => __( 'Text', '__x__' ),
      ],
      [
        'key'     => 'x_logo_visually_hidden_h1',
        'type'    => 'toggle',
        'label'   => __( 'Hidden &lt;h1&gt;', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_logo_font_size',
        'type'    => 'unit-slider',
        'label'   => __( 'Font Size', '__x__' ),
        'options' => $options_logo_font_size,
      ],
      [
        'key'        => 'x_logo_font_family_selection',
        'type'       => 'font-family',
        'label'      => __( 'Font Family', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_logo_font_family',
        'type'       => 'select',
        'label'      => __( 'Font Family', '__x__' ),
        'options'    => [ 'choices' => $choices_list_font_families ],
        'conditions' => [ $condition_font_manager_disabled ],
      ],
      [
        'keys' => [
          'value'       => 'x_logo_font_weight_selection',
          'font_family' => 'x_logo_font_family_selection'
        ],
        'type'       => 'font-weight',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_logo_font_weight',
        'type'       => 'select',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_disabled ],
        'options'    => [
          'filter'  => [ 'key' => 'choices', 'method' => 'font-weights', 'source' => 'x_logo_font_family' ],
          'choices' => $choices_list_font_weights,
        ],
      ],
      [
        'key'     => 'x_logo_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'        => 'x_logo_font_italic',
        'type'       => 'toggle',
        'label'      => __( 'Italic', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'     => 'x_logo_uppercase_enable',
        'type'    => 'toggle',
        'label'   => __( 'Uppercase', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'   => 'x_logo_font_color',
        'type'  => 'color',
        'label' => __( 'Color', '__x__' ),
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['logo-image'],
    'group'       => 'x-headers:logo-image',
    'description' => __( 'To make your logo retina ready, enter in the width of your uploaded image in the "Logo Width (px)" field and we\'ll take care of all the calculations for you. If you want your logo to stay the original size that was uploaded, leave the field blank.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'   => 'x_logo',
        'type'  => 'image',
        'label' => __( 'Image', '__x__' ),
      ],
      [
        'key'   => 'x_logo_width',
        'type'  => 'text',
        'label' => __( 'Image Width (px)', '__x__' ),
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['logo-alignment'],
    'group'       => 'x-headers:logo-alignment',
    'description' => __( 'Use the following controls to vertically align your logo as desired. Make sure to adjust your top alignment even if your navbar is fixed to a side as it will reformat to the top on smaller screens (this control will be hidden if you do not have a side navigation position selected).', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_logo_adjust_navbar_top',
        'type'    => 'unit-slider',
        'label'   => __( 'Top Alignment', '__x__' ),
        'options' => $options_navbar_logo_and_links_adjust_top,
      ],
      [
        'key'     => 'x_logo_adjust_navbar_side',
        'type'    => 'unit-slider',
        'label'   => __( 'Side Alignment', '__x__' ),
        'options' => $options_navbar_logo_and_links_adjust_side,
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['links'],
    'group'       => 'x-headers:links',
    'description' => __( 'Alter the appearance of the top-level navbar links for your site here and their alignment and spacing in the section below.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_navbar_font_size',
        'type'    => 'unit-slider',
        'label'   => __( 'Font Size', '__x__' ),
        'options' => $options_navbar_font_size,
      ],
      [
        'key'        => 'x_navbar_font_family_selection',
        'type'       => 'font-family',
        'label'      => __( 'Font Family', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'        => 'x_navbar_font_family',
        'type'       => 'select',
        'label'      => __( 'Font Family', '__x__' ),
        'options'    => [ 'choices' => $choices_list_font_families ],
        'conditions' => [ $condition_font_manager_disabled ],
      ],
      [
        'keys' => [
          'value'       => 'x_navbar_font_weight_selection',
          'font_family' => 'x_navbar_font_family_selection'
        ],
        'type'       => 'font-weight',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_enabled ]
      ],
      [
        'key'        => 'x_navbar_font_weight',
        'type'       => 'select',
        'label'      => __( 'Font Weight', '__x__' ),
        'conditions' => [ $condition_font_manager_disabled ],
        'options'    => [
          'filter'  => [ 'key' => 'choices', 'method' => 'font-weights', 'source' => 'x_navbar_font_family' ],
          'choices' => $choices_list_font_weights,
        ],
      ],
      [
        'key'     => 'x_navbar_letter_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'Letter Spacing', '__x__' ),
        'options' => $options_letter_spacing_compressed,
      ],
      [
        'key'        => 'x_navbar_font_italic',
        'type'       => 'toggle',
        'label'      => __( 'Italic', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_font_manager_enabled ],
      ],
      [
        'key'     => 'x_navbar_uppercase_enable',
        'type'    => 'toggle',
        'label'   => __( 'Uppercase', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'keys' => [
          'value' => 'x_navbar_link_color',
          'alt'   => 'x_navbar_link_color_hover',
        ],
        'type'    => 'color',
        'label'   => __( 'Color', '__x__' ),
        'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['links-alignment'],
    'group'       => 'x-headers:links-alignment',
    'description' => __( 'Customize the vertical alignment of your links for both top and side navbar positions as well as alter the vertical spacing between links for top navbar positions with the "Link Spacing" control.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_navbar_adjust_links_top',
        'type'    => 'unit-slider',
        'label'   => __( 'Top Alignment', '__x__' ),
        'options' => $options_navbar_logo_and_links_adjust_top,
      ],
      [
        'key'     => 'x_navbar_adjust_links_side',
        'type'    => 'unit-slider',
        'label'   => __( 'Side Alignment', '__x__' ),
        'options' => $options_navbar_logo_and_links_adjust_side,
      ],
      [
        'key'     => 'x_navbar_adjust_links_top_spacing',
        'type'    => 'unit-slider',
        'label'   => __( 'Top Spacing', '__x__' ),
        'options' => $options_navbar_links_top_spacing,
      ],
    ],
  ];

  $controls[] = [
    'key'         => 'x_header_search_enable',
    'type'        => 'group',
    'label'       => $labels['search'],
    'group'       => 'x-headers:search',
    'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'description' => __( 'Activate search functionality for the navbar. If activated, an icon will appear that when clicked will activate the search modal.', '__x__' ),
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['mobile-button'],
    'group'       => 'x-headers:mobile-button',
    'description' => __( 'Adjust the vertical alignment and size of the mobile button that appears on smaller screen sizes in your navbar.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_navbar_adjust_button_size',
        'type'    => 'unit-slider',
        'label'   => __( 'Size', '__x__' ),
        'options' => $options_navbar_button_size,
      ],
      [
        'key'     => 'x_navbar_adjust_button',
        'type'    => 'unit-slider',
        'label'   => __( 'Alignment', '__x__' ),
        'options' => $options_navbar_button_spacing,
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['widgetbar'],
    'group'       => 'x-headers:widgetbar',
    'description' => __( 'Specify how many widget areas should appear in the collapsible Widgetbar and select the colors for its associated toggle.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_header_widget_areas',
        'type'    => 'choose',
        'label'   => __( 'Widget Areas', '__x__' ),
        'options' => [ 'choices' => $choices_widget_areas ],
      ],
      [
        'keys' => [
          'value' => 'x_widgetbar_button_background',
          'alt'   => 'x_widgetbar_button_background_hover',
        ],
        'type'       => 'color',
        'label'      => __( 'Toggle Background', '__x__' ),
        'options'    => cs_recall( 'options_swatch_base_interaction_labels' ),
        'conditions' => [ $condition_header_has_widget_areas ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['miscellaneous'],
    'group'       => 'x-headers:miscellaneous',
    'description' => __( 'Specify how many widget areas should appear in the collapsible Widgetbar and select the colors for its associated toggle.', '__x__' ),
    'conditions'  => [ $condition_classic_headers_enabled ],
    'controls'    => [
      [
        'key'     => 'x_topbar_display',
        'type'    => 'toggle',
        'label'   => __( 'Topbar', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'        => 'x_topbar_content',
        'type'       => 'textarea',
        'label'      => __( 'Topbar Content', '__x__' ),
        'options'    => $options_topbar_content,
        'conditions' => [ $condition_topbar_enabled ],
      ],
      [
        'key'     => 'x_breadcrumb_display',
        'type'    => 'toggle',
        'label'   => __( 'Crumbs', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
    ],
  ];


  // Footers
  // -------

  $controls[] = [
    'type'        => 'group',
    // 'label'       => $labels['setup'],
    'group'       => 'x-footers:setup',
    // 'description' => 'component:options/launch-footers',
    'conditions'  => [ $condition_classic_footers_enabled ],
    'controls'    => [
      [
        'key'        => 'x_footer_widget_areas',
        'type'       => 'choose',
        'label'      => __( 'Widget Areas', '__x__' ),
        'options'    => [ 'choices' => $choices_widget_areas ],
        'conditions' => [ $condition_classic_footers_enabled ],
      ],
      [
        'key'        => 'x_footer_bottom_display',
        'type'       => 'toggle',
        'label'      => __( 'Bottom Footer', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_classic_footers_enabled ],
      ],
      [
        'key'        => 'x_footer_menu_display',
        'type'       => 'toggle',
        'label'      => __( 'Menu', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_footer_bottom_display_enabled, $condition_classic_footers_enabled ],
      ],
      [
        'key'        => 'x_footer_social_display',
        'type'       => 'toggle',
        'label'      => __( 'Social', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_classic_footers_enabled, $condition_footer_bottom_display_enabled ],
      ],
      [
        'key'        => 'x_footer_content_display',
        'type'       => 'toggle',
        'label'      => __( 'Content Area', '__x__' ),
        'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        'conditions' => [ $condition_classic_footers_enabled, $condition_footer_bottom_display_enabled ],
      ],
      [
        'key'        => 'x_footer_content',
        'type'       => 'textarea',
        'label'      => '&nbsp;',
        'conditions' => [ $condition_classic_footers_enabled, $condition_footer_bottom_display_enabled, $condition_footer_content_enabled ],
      ],
    ],
  ];


  // Blog
  // ----

  $controls[] = [
    'type'        => 'group',
    // 'label'       => $labels['setup'],
    'group'       => 'x-blog:setup',
    // 'description' => __( 'Adjust the style and layout of your blog using the settings below. This will only affect the posts index page of your blog and will not alter any archive or search results pages. The "Layout" option allows you to keep your sidebar on your posts index page if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for you "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ),
    'description' => __( 'Adjust the style and layout of your blog using the settings below. This will only affect the posts index page of your blog and will not alter any archives.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_blog_style',
        'type'    => 'choose',
        'label'   => __( 'Style', '__x__' ),
        'options' => [ 'choices' => $choices_blog_styles ],
      ],
      [
        'key'     => 'x_blog_layout',
        'type'    => 'choose',
        'label'   => __( 'Layout', '__x__' ),
        'options' => [ 'choices' => $choices_section_layouts ],
      ],
      [
        'key'        => 'x_blog_masonry_columns',
        'type'       => 'choose',
        'label'      => __( 'Columns', '__x__' ),
        'options'    => [ 'choices' => $choices_masonry_columns ],
        'conditions' => [ $condition_blog_style_masonry ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['archives'],
    'group'       => 'x-blog:archives',
    // 'description' => __( 'Adjust the style and layout of your archive pages using the settings below. The "Layout" option allows you to keep your sidebar on your posts index page if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for you "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ),
    'description' => __( 'Adjust the style and layout of your archive pages using the settings below.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_archive_style',
        'type'    => 'choose',
        'label'   => __( 'Style', '__x__' ),
        'options' => [ 'choices' => $choices_blog_styles ],
      ],
      [
        'key'     => 'x_archive_layout',
        'type'    => 'choose',
        'label'   => __( 'Layout', '__x__' ),
        'options' => [ 'choices' => $choices_section_layouts ],
      ],
      [
        'key'        => 'x_archive_masonry_columns',
        'type'       => 'choose',
        'label'      => __( 'Columns', '__x__' ),
        'options'    => [ 'choices' => $choices_masonry_columns ],
        'conditions' => [ $condition_archive_style_masonry ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['content'],
    'group'       => 'x-blog:content',
    'description' => __( 'Selecting the "Full Post on Index" option below will allow the entire contents of your posts to be shown on the post index pages for all stacks. Deselecting this option will allow you to set the length of your excerpt.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_blog_enable_post_meta',
        'type'    => 'toggle',
        'label'   => __( 'Post Meta', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_blog_enable_full_post_content',
        'type'    => 'toggle',
        'label'   => __( 'Full Post on Index', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'        => 'x_blog_excerpt_length',
        'type'       => 'unit-slider',
        'label'      => __( 'Excerpt Length', '__x__' ),
        'options'    => $options_blog_excerpt_length,
        'conditions' => [ $condition_blog_full_post_content_enable ],
      ],
    ],
  ];


  // Portfolio
  // ---------

  $controls[] = [
    'type'        => 'group',
    'group'       => 'x-portfolio:setup',
    'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
    'description' => __( 'Setting your custom portfolio slug allows you to create a unique URL structure for your archive pages that suits your needs. When you update it, remember to save your Permalinks again to avoid any potential errors.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_portfolio_enable',
        'type'    => 'toggle',
        'label'   => __( 'Enable Portfolio', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'   => 'x_custom_portfolio_slug',
        'type'  => 'text',
        'label' => __( 'Custom URL Slug', '__x__' ),
        'conditions' => [ $condition_portfolio_enable ]
      ],
      [
        'key'     => 'x_portfolio_enable_cropped_thumbs',
        'type'    => 'toggle',
        'label'   => __( 'Crop Featured', '__x__' ),
        'conditions' => [ $condition_portfolio_enable ],
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'   => 'x_portfolio_enable_post_meta',
        'type'  => 'toggle',
        'label' => __( 'Post Meta', '__x__' ),
        'conditions' => [ $condition_portfolio_enable ]
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['labels'],
    'group'       => 'x-portfolio:labels',
    'description' => __( 'Set the titles and labels for various parts of the portfolio here.', '__x__' ),
    'conditions' => [ $condition_portfolio_enable ],
    'controls'    => [
      [
        'key'   => 'x_portfolio_tag_title',
        'type'  => 'text',
        'label' => __( 'Tag List Title', '__x__' ),
      ],
      [
        'key'   => 'x_portfolio_launch_project_title',
        'type'  => 'text',
        'label' => __( 'Launch Title', '__x__' ),
      ],
      [
        'key'   => 'x_portfolio_launch_project_button_text',
        'type'  => 'text',
        'label' => __( 'Launch Button', '__x__' ),
      ],
      [
        'key'   => 'x_portfolio_share_project_title',
        'type'  => 'text',
        'label' => __( 'Share Title', '__x__' ),
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['social'],
    'group'       => 'x-portfolio:social',
    'description' => __( 'Enable various social sharing options for your portfolio items here.', '__x__' ),
    'conditions' => [ $condition_portfolio_enable ],
    'controls'    => [
      [
        'key'     => 'x_portfolio_enable_facebook_sharing',
        'type'    => 'toggle',
        'label'   => __( 'Facebook', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_portfolio_enable_twitter_sharing',
        'type'    => 'toggle',
        'label'   => __( 'Twitter', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_portfolio_enable_google_plus_sharing',
        'type'    => 'toggle',
        'label'   => __( 'Google+', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_portfolio_enable_linkedin_sharing',
        'type'    => 'toggle',
        'label'   => __( 'LinkedIn', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_portfolio_enable_pinterest_sharing',
        'type'    => 'toggle',
        'label'   => __( 'Pinterest', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_portfolio_enable_reddit_sharing',
        'type'    => 'toggle',
        'label'   => __( 'Reddit', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_portfolio_enable_email_sharing',
        'type'    => 'toggle',
        'label'   => __( 'Email', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
    ],
  ];


  // Social
  // ------

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['setup'],
    'group'       => 'x-social:setup',
    'description' => __( 'Set the URLs for your social media profiles here to be used in the topbar and bottom footer. Adding in a link will make its respective icon show up without needing to do anything else. Keep in mind that these sections are not necessarily intended for a lot of items, so adding all icons could create some layout issues. It is typically best to keep your selections here to a minimum for structural purposes and for usability purposes so you do not overwhelm your visitors.', '__x__' ),
    'controls'    => [
      [
        'key'   => 'x_social_facebook',
        'type'  => 'text',
        'label' => __( 'Facebook', '__x__' ),
      ],
      [
        'key'   => 'x_social_twitter',
        'type'  => 'text',
        'label' => __( 'Twitter', '__x__' ),
      ],
      [
        'key'   => 'x_social_googleplus',
        'type'  => 'text',
        'label' => __( 'Google+', '__x__' ),
      ],
      [
        'key'   => 'x_social_linkedin',
        'type'  => 'text',
        'label' => __( 'LinkedIn', '__x__' ),
      ],
      [
        'key'   => 'x_social_xing',
        'type'  => 'text',
        'label' => __( 'XING', '__x__' ),
      ],
      [
        'key'   => 'x_social_foursquare',
        'type'  => 'text',
        'label' => __( 'Foursquare', '__x__' ),
      ],
      [
        'key'   => 'x_social_youtube',
        'type'  => 'text',
        'label' => __( 'YouTube', '__x__' ),
      ],
      [
        'key'   => 'x_social_vimeo',
        'type'  => 'text',
        'label' => __( 'Vimeo', '__x__' ),
      ],
      [
        'key'   => 'x_social_instagram',
        'type'  => 'text',
        'label' => __( 'Instagram', '__x__' ),
      ],
      [
        'key'   => 'x_social_pinterest',
        'type'  => 'text',
        'label' => __( 'Pinterest', '__x__' ),
      ],
      [
        'key'   => 'x_social_dribbble',
        'type'  => 'text',
        'label' => __( 'Dribbble', '__x__' ),
      ],
      [
        'key'   => 'x_social_flickr',
        'type'  => 'text',
        'label' => __( 'Flickr', '__x__' ),
      ],
      [
        'key'   => 'x_social_github',
        'type'  => 'text',
        'label' => __( 'GitHub', '__x__' ),
      ],
      [
        'key'   => 'x_social_behance',
        'type'  => 'text',
        'label' => __( 'Behance', '__x__' ),
      ],
      [
        'key'   => 'x_social_tumblr',
        'type'  => 'text',
        'label' => __( 'Tumblr', '__x__' ),
      ],
      [
        'key'   => 'x_social_whatsapp',
        'type'  => 'text',
        'label' => __( 'Whatsapp', '__x__' ),
      ],
      [
        'key'   => 'x_social_soundcloud',
        'type'  => 'text',
        'label' => __( 'SoundCloud', '__x__' ),
      ],
      [
        'key'   => 'x_social_rss',
        'type'  => 'text',
        'label' => __( 'RSS Feed', '__x__' ),
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['open-graph'],
    'group'       => 'x-social:open-graph',
    'description' => __( 'X outputs standard Open Graph tags for your content. If you are employing another solution for this, you can disable X\'s Open Graph tag output here.', '__x__' ),
    'controls'    => [
      [
        'key'   => 'x_social_open_graph',
        'type'  => 'toggle',
        'label' => __( 'Open Graph', '__x__' ),
      ],
      [
        'key'   => 'x_social_fallback_image',
        'type'  => 'image',
        'label' => __( 'Social Fallback', '__x__' ),
      ],
    ],
  ];


  // Miscellaneous
  // -------------

  $controls[] = [
    'key'         => 'x_footer_scroll_top_display',
    'type'        => 'group',
    'label'       => $labels['scroll-top-anchor'],
    'group'       => 'x-miscellaneous:scroll-top-anchor',
    'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
    // 'description' => __( 'Activating the scroll top anchor will output a link that appears in the bottom corner of your site for users to click on that will return them to the top of your website. Once activated, set the value (%) for how far down the page your users will need to scroll for it to appear. For example, if you want the scroll top anchor to appear once your users have scrolled halfway down your page, you would enter "50" into the field.', '__x__' ),
    'description' => __( 'Once activated, set the value (%) for how far down the page your users will need to scroll for it to appear. For example, if you want the scroll top anchor to appear once your users have scrolled halfway down your page, you would enter "50" into the field.', '__x__' ),
    'controls'    => [
      [
        'key'        => 'x_footer_scroll_top_position',
        'type'       => 'choose',
        'label'      => __( 'Position', '__x__' ),
        'options'    => [ 'choices' => $choices_left_right_positioning ],
        'conditions' => [ $condition_footer_scroll_top_enable ],
      ],
      [
        'key'        => 'x_footer_scroll_top_display_unit',
        'type'       => 'unit-slider',
        'label'      => __( 'When to Show', '__x__' ),
        'options'    => $options_when_to_show_scroll_top_anchor,
        'conditions' => [ $condition_footer_scroll_top_enable ],
      ],
    ],
  ];

  $controls[] = [
    'type'        => 'group',
    'label'       => $labels['font-awesome'],
    'group'       => 'x-miscellaneous:font-awesome',
    'description' => __( 'Below is a list of the various Font Awesome icon weights available. Enable or disable them depending on your preferences for usage (for example, if you only plan on using the "Light" icons, you can disable all other weights for a slight performance boost). Keep in mind that completely disabling all Font Awesome icons means that you will not be able to utilize any of the icon pickers throughout our builders and that the markup for icons will still be output to the frontend of your site.', '__x__' ),
    'controls'    => [
      [
        'key'     => 'x_font_awesome_solid_enable',
        'type'    => 'toggle',
        'label'   => __( 'Solid', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_font_awesome_regular_enable',
        'type'    => 'toggle',
        'label'   => __( 'Regular', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_font_awesome_light_enable',
        'type'    => 'toggle',
        'label'   => __( 'Light', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
      [
        'key'     => 'x_font_awesome_brands_enable',
        'type'    => 'toggle',
        'label'   => __( 'Brands', '__x__' ),
        'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      ],
    ],
  ];


  // bbPress
  // -------

  if ( X_BBPRESS_IS_ACTIVE ) {

    $groups['x-bbpress']       = __( 'bbPress', '__x__' );
    $groups['x-bbpress:setup'] = $labels['setup'];

    $controls[] = [
      'type'        => 'group',
      // 'label'       => $labels['setup'],
      'group'       => 'x-bbpress:setup',
      'description' => __( 'This section handles all options regarding your bbPress setup. Select your content layout, section titles, along with plenty of other options to get bbPress up and running. The "Layout" option allows you to keep your sidebar if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for your "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ),
      'controls'    => [
        [
          'key'     => 'x_bbpress_layout_content',
          'type'    => 'choose',
          'label'   => __( 'Layout', '__x__' ),
          'options' => [ 'choices' => $choices_section_layouts ],
        ],
        [
          'key'     => 'x_bbpress_enable_quicktags',
          'type'    => 'toggle',
          'label'   => __( 'Topic/Reply Quicktags', '__x__' ),
          'options' => cs_recall( 'options_group_toggle_off_on_bool_string' ),
        ],
        [
          'key'        => 'x_bbpress_header_menu_enable',
          'type'       => 'toggle',
          'label'      => __( 'Navbar Menu', '__x__' ),
          'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
          'conditions' => [ $condition_classic_headers_enabled ],
        ],
      ],
    ];

  }


  // BuddyPress
  // ----------

  if ( X_BUDDYPRESS_IS_ACTIVE ) {

    $groups['x-buddypress']           = __( 'BuddyPress', '__x__' );
    $groups['x-buddypress:setup']     = $labels['setup'];
    $groups['x-buddypress:titles']    = $labels['titles'];
    $groups['x-buddypress:subtitles'] = $labels['subtitles'];

    $controls[] = [
      'type'        => 'group',
      // 'label'       => $labels['setup'],
      'group'       => 'x-buddypress:setup',
      'description' => __( 'This section handles all options regarding your BuddyPress setup. Select your content layout, section titles, along with plenty of other options to get BuddyPress up and running. The "Layout" option allows you to keep your sidebar if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for your "Content Layout" option, or remove the sidebar completely if desired.', '__x__' ),
      // 'description' => __( 'You can add links to various "components" manually in your navigation or activate registration and login links in the WordPress admin bar via BuddyPress\' settings if desired. Selecting this setting provides you with an additional theme-specific option that will include a simple navigation item with quick links to various BuddyPress components.', '__x__' ),
      'controls'    => [
        [
          'key'     => 'x_buddypress_layout_content',
          'type'    => 'choose',
          'label'   => __( 'Layout', '__x__' ),
          'options' => [ 'choices' => $choices_section_layouts ],
        ],
        [
          'key'        => 'x_buddypress_header_menu_enable',
          'type'       => 'toggle',
          'label'      => __( 'Navbar Menu', '__x__' ),
          'options'    => cs_recall( 'options_group_toggle_off_on_bool_string' ),
          'conditions' => [ $condition_classic_headers_enabled ],
        ],
      ],
    ];

    $controls[] = [
      'type'        => 'group',
      'label'       => $labels['titles'],
      'group'       => 'x-buddypress:titles',
      'description' => __( 'Set the titles for the various "components" in BuddyPress (e.g. groups list, registration, et cetera). Keep in mind that the "Sites Title" isn\'t utilized unless you have WordPress Multisite setup on your installation. Additionally, while they might not be present as actual titles on some pages, they are still used as labels in other areas such as the breadcrumbs, so keep this in mind when selecting inputs here.', '__x__' ),
      'controls'    => [
        [
          'key'   => 'x_buddypress_activity_title',
          'type'  => 'text',
          'label' => __( 'Activity', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_groups_title',
          'type'  => 'text',
          'label' => __( 'Groups', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_blogs_title',
          'type'  => 'text',
          'label' => __( 'Sites', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_members_title',
          'type'  => 'text',
          'label' => __( 'Members', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_register_title',
          'type'  => 'text',
          'label' => __( 'Register', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_activate_title',
          'type'  => 'text',
          'label' => __( 'Activate', '__x__' ),
        ],
      ],
    ];

    $controls[] = [
      'type'        => 'group',
      'label'       => $labels['subtitles'],
      'group'       => 'x-buddypress:subtitles',
      'description' => __( 'Set the subtitles for the various "components" in BuddyPress (e.g. groups list, registration, et cetera). Keep in mind that the "Sites Subtitle" isn\'t utilized unless you have WordPress Multisite setup on your installation. Additionally, subtitles are not utilized across every Stack but are left here for ease of management.', '__x__' ),
      'controls'    => [
        [
          'key'   => 'x_buddypress_groups_subtitle',
          'type'  => 'text',
          'label' => __( 'Groups', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_blogs_subtitle',
          'type'  => 'text',
          'label' => __( 'Sites', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_members_subtitle',
          'type'  => 'text',
          'label' => __( 'Members', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_register_subtitle',
          'type'  => 'text',
          'label' => __( 'Register', '__x__' ),
        ],
        [
          'key'   => 'x_buddypress_activate_subtitle',
          'type'  => 'text',
          'label' => __( 'Activate', '__x__' ),
        ],
      ],
    ];

  }


  // WooCommerce
  // -----------

  if ( X_WOOCOMMERCE_IS_ACTIVE ) {

    $groups['x-woocommerce']                        = __( 'WooCommerce', '__x__' );
    $groups['x-woocommerce:navbar-cart']            = $labels['navbar-cart'];
    $groups['x-woocommerce:shop']                   = $labels['shop'];
    $groups['x-woocommerce:single-product-tabs']    = $labels['single-product-tabs'];
    $groups['x-woocommerce:single-product-related'] = $labels['single-product-related'];
    $groups['x-woocommerce:single-product-upsells'] = $labels['single-product-upsells'];
    $groups['x-woocommerce:cart']                   = $labels['cart'];
    $groups['x-woocommerce:widgets']                = $labels['widgets'];

    $controls[] = [
      'key'         => 'x_woocommerce_header_menu_enable',
      'type'        => 'group',
      'label'       => __( 'Navbar Cart', '__x__' ),
      'group'       => 'x-woocommerce:navbar-cart',
      'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      'conditions'  => [ $condition_classic_headers_enabled ],
      'description' => __( 'Enable a cart in your navigation that you can customize to showcase the information you want your users to see as they add merchandise to their cart (e.g. item count, subtotal, et cetera).', '__x__' ),
      'controls'    => [
        [
          'key'        => 'x_woocommerce_header_hide_empty_cart',
          'type'       => 'choose',
          'label'      => __( 'Hide When Empty', '__x__' ),
          'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_header_cart_info',
          'type'       => 'select',
          'label'      => __( 'Information', '__x__' ),
          'options'    => [ 'choices' => $choices_cart_layout ],
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_header_cart_style',
          'type'       => 'choose',
          'label'      => __( 'Style', '__x__' ),
          'options'    => [ 'choices' => $choices_cart_shape ],
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_header_cart_layout',
          'type'       => 'choose',
          'label'      => __( 'Layout', '__x__' ),
          'options'    => [ 'choices' => $choices_inline_or_stacked ],
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_header_cart_adjust',
          'type'       => 'unit-slider',
          'label'      => __( 'Alignment', '__x__' ),
          'options'    => $options_header_cart_alignment,
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
        ],
        [
          'type'       => 'group',
          'label'      => __( 'Inner Content', '__x__' ),
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
          'controls'   => [
            [
              'key'     => 'x_woocommerce_header_cart_content_inner',
              'type'    => 'select',
              'options' => [ 'choices' => $choices_woocommerce_navbar_cart_content ],
            ],
            [
              'keys' => [
                'value' => 'x_woocommerce_header_cart_content_inner_color',
                'alt'   => 'x_woocommerce_header_cart_content_inner_color_hover',
              ],
              'type'    => 'color',
              'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
            ],
          ],
        ],
        [
          'type'       => 'group',
          'label'      => __( 'Outer Content', '__x__' ),
          'conditions' => [ $condition_woocommerce_header_menu_enabled ],
          'controls'   => [
            [
              'key'     => 'x_woocommerce_header_cart_content_outer',
              'type'    => 'select',
              'options' => [ 'choices' => $choices_woocommerce_navbar_cart_content ],
            ],
            [
              'keys' => [
                'value' => 'x_woocommerce_header_cart_content_outer_color',
                'alt'   => 'x_woocommerce_header_cart_content_outer_color_hover',
              ],
              'type'    => 'color',
              'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
            ],
          ],
        ],
      ],
    ];

    $controls[] = [
      'type'        => 'group',
      'label'       => $labels['shop'],
      'group'       => 'x-woocommerce:shop',
      // 'description' => __( 'This section handles all options regarding your WooCommerce setup. Select your content layout, product columns, along with plenty of other options to get your shop up and running.<br><br>The "Shop Layout" option allows you to keep your sidebar on your shop page if you have already selected "Content Left, Sidebar Right" or "Sidebar Left, Content Right" for you "Content Layout" option, or remove the sidebar completely if desired.<br><br>The "Placeholder Thumbnail" will show up for items in your shop that do not yet have a featured image assigned. Make sure that the thumbanil you provide matches the image dimensions you specify in WooCommerce\'s Customizer settings.', '__x__' ),
      'description' => __( 'This section handles all options regarding your WooCommerce setup. The "Placeholder Thumbnail" will show up for items in your shop that do not yet have a featured image assigned. Make sure that the thumbanil you provide matches the image dimensions you specify in WooCommerce\'s Customizer settings.', '__x__' ),
      'controls'    => [
        [
          'key'     => 'x_woocommerce_shop_layout_content',
          'type'    => 'choose',
          'label'   => __( 'Layout', '__x__' ),
          'options' => [ 'choices' => $choices_section_layouts ],
        ],
        [
          'key'     => 'x_woocommerce_shop_columns',
          'type'    => 'choose',
          'label'   => __( 'Columns', '__x__' ),
          'options' => [ 'choices' => $choices_shop_columns ],
        ],
        [
          'key'   => 'x_woocommerce_shop_count',
          'type'  => 'text',
          'label' => __( 'Posts Per Page', '__x__' ),
        ],
        [
          'key'   => 'x_woocommerce_shop_placeholder_thumbnail',
          'type'  => 'image',
          'label' => __( 'Placeholder Thumbnail', '__x__' ),
        ],
      ],
    ];

    $controls[] = [
      'key'         => 'x_woocommerce_product_tabs_enable',
      'type'        => 'group',
      'label'       => $labels['single-product-tabs'],
      'group'       => 'x-woocommerce:single-product-tabs',
      'options'     => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      'description' => __( 'All options available in this section pertain to the layout of your individual product pages. Enable or disable the sections you want to use to achieve the layout you want.', '__x__' ),
      'controls'    => [
        [
          'key'        => 'x_woocommerce_product_tab_description_enable',
          'type'       => 'choose',
          'label'      => __( 'Description Tab', '__x__' ),
          'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
          'conditions' => [ $condition_woocommerce_product_tabs_enable ],
        ],
        [
          'key'        => 'x_woocommerce_product_tab_additional_info_enable',
          'type'       => 'choose',
          'label'      => __( 'Additional Info Tab', '__x__' ),
          'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
          'conditions' => [ $condition_woocommerce_product_tabs_enable ],
        ],
        [
          'key'        => 'x_woocommerce_product_tab_reviews_enable',
          'type'       => 'choose',
          'label'      => __( 'Reviews Tab', '__x__' ),
          'options'    => cs_recall( 'options_choices_off_on_bool_string' ),
          'conditions' => [ $condition_woocommerce_product_tabs_enable ],
        ],
      ],
    ];

    $controls[] = [
      'key'      => 'x_woocommerce_product_related_enable',
      'type'     => 'group',
      'label'    => $labels['single-product-related'],
      'group'    => 'x-woocommerce:single-product-related',
      'options'  => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      'controls' => [
        [
          'key'        => 'x_woocommerce_product_related_columns',
          'type'       => 'choose',
          'label'      => __( 'Related Columns', '__x__' ),
          'options'    => [ 'choices' => $choices_shop_columns ],
          'conditions' => [ $condition_woocommerce_related_products_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_product_related_count',
          'type'       => 'text',
          'label'      => __( 'Related Count', '__x__' ),
          'conditions' => [ $condition_woocommerce_related_products_enabled ],
        ],
      ],
    ];

    $controls[] = [
      'key'      => 'x_woocommerce_product_upsells_enable',
      'type'     => 'group',
      'label'    => $labels['single-product-upsells'],
      'group'    => 'x-woocommerce:single-product-upsells',
      'options'  => cs_recall( 'options_group_toggle_off_on_bool_string' ),
      'controls' => [
        [
          'key'        => 'x_woocommerce_product_upsell_columns',
          'type'       => 'choose',
          'label'      => __( 'Upsells Columns', '__x__' ),
          'options'    => [ 'choices' => $choices_shop_columns ],
          'conditions' => [ $condition_woocommerce_upsells_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_product_upsell_count',
          'type'       => 'text',
          'label'      => __( 'Upsells Count', '__x__' ),
          'conditions' => [ $condition_woocommerce_upsells_enabled ],
        ],
      ],
    ];

    $controls[] = [
      'type'        => 'group',
      'label'       => $labels['cart'],
      'group'       => 'x-woocommerce:cart',
      'description' => __( 'All options available in this section pertain to the layout of your cart page. Enable or disable the sections you want to use to achieve the layout you want.', '__x__' ),
      // 'description' => __( 'If you have the "Enable AJAX add to cart buttons on archives" WooCommerce setting active, you can control the colors of the confirmation overlay here that appears when adding an item on a product index page.', '__x__' ),
      'controls'    => [
        [
          'key'     => 'x_woocommerce_cart_cross_sells_enable',
          'type'    => 'choose',
          'label'   => __( 'Cross Sells', '__x__' ),
          'options' => cs_recall( 'options_choices_off_on_bool_string' ),
        ],
        [
          'key'        => 'x_woocommerce_cart_cross_sells_columns',
          'type'       => 'choose',
          'label'      => __( 'Cross Sells Columns', '__x__' ),
          'options'    => [ 'choices' => $choices_shop_columns ],
          'conditions' => [ $condition_woocommerce_cross_sells_enabled ],
        ],
        [
          'key'        => 'x_woocommerce_cart_cross_sells_count',
          'type'       => 'text',
          'label'      => __( 'Cross Sells Count', '__x__' ),
          'conditions' => [ $condition_woocommerce_cross_sells_enabled ],
        ],
        [
          'keys' => [
            'value' => 'x_woocommerce_ajax_add_to_cart_color',
            'alt'   => 'x_woocommerce_ajax_add_to_cart_color_hover',
          ],
          'type'    => 'color',
          'label'   => __( 'AJAX<br/>Color', '__x__' ),
          'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
        ],
        [
          'keys' => [
            'value' => 'x_woocommerce_ajax_add_to_cart_bg_color',
            'alt'   => 'x_woocommerce_ajax_add_to_cart_bg_color_hover',
          ],
          'type'    => 'color',
          'label'   => __( 'AJAX Background', '__x__' ),
          'options' => cs_recall( 'options_swatch_base_interaction_labels' ),
        ],
      ],
    ];

    $controls[] = [
      'type'        => 'group',
      'label'       => $labels['widgets'],
      'group'       => 'x-woocommerce:widgets',
      'description' => __( 'Select the placement of your product images in the various WooCommerce widgets that provide them. Right alignment is better if your items have longer titles to avoid staggered word wrapping.', '__x__' ),
      'controls'    => [
        [
          'key'     => 'x_woocommerce_widgets_image_alignment',
          'type'    => 'choose',
          'label'   => __( 'Image Alignment', '__x__' ),
          'options' => [ 'choices' => $choices_left_right_positioning ],
        ],
      ],
    ];

  }


  // Output
  // ------

  return [
    'groups'   => $groups,
    'controls' => $controls,
  ];

}



// Integration
// =============================================================================

function x_theme_options_setup( $data ) {
  $theme_options = x_theme_options_register();

  return [
    'groups'   => array_merge( $data['groups'], $theme_options['groups'] ),
    'controls' => array_merge( $data['controls'], $theme_options['controls'] ),
  ];
}

add_filter( 'cs_theme_options_controls', 'x_theme_options_setup' );

function x_theme_options_preview_setup() {
  remove_action( 'x_head_css', 'x_customizer_output_custom_css' );
  add_filter( 'pre_option_x_cache_google_fonts_request', 'x_google_fonts_queue' );
}

add_action('cs_options_preview_setup', 'x_theme_options_preview_setup' );
