<?php

// =============================================================================
// PREFAB-ELEMENTS.PHP
// -----------------------------------------------------------------------------
// It's a bunch of prefab elements, yo.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Register Groups
//   02. Dynamic Elements (Global)
//   03. Dynamic Elements (Archive)
//       a. Title
//       b. Description
//       c. Link
//   04. Dynamic Elements (Post)
//       a. Text
//       b. Featured Image
//       c. Author
//       d. Meta Line
//       e. Terms
//   05. Dynamic Elements (WooCommerce)
//       a. Add to Cart
//       b. Products
//       c. Cart
//       d. Links
//       e. Tabs
//   06. Dynamic Elements (Posts)
//       a. Tiles
//       b. Minimal
//       c. List
//       d. Magazine
//   07. List Elements
//       a. Looper / Baseline
//       b. Looper / Centered
//       c. Static / Baseline
//       d. Static / Centered
// =============================================================================

// Register Groups
// =============================================================================
// Available Scopes:
//   - all
//   - content (Content / Global Blocks)
//   - bars (Headers / Footers)
//   - layout-single
//   - layout-archive
//   - layout-single-wc
//   - layout-archive-wc

cs_register_element_group( 'dynamic', __( 'Dynamic', 'cornerstone' ) );

if ( class_exists( 'WC_API' ) ) {
  cs_register_element_group( 'woocommerce', __( 'WooCommerce', 'cornerstone' ) );
}

if ( class_exists( 'BuddyPress' ) ) {
  cs_register_element_group( 'buddypress', __( 'BuddyPress', 'cornerstone' ) );
}

if ( class_exists( 'bbPress' ) ) {
  cs_register_element_group( 'bbpress', __( 'bbPress', 'cornerstone' ) );
}





// Dynamic Elements (Global)
// =============================================================================

cs_register_prefab_element( 'dynamic', 'site-title', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'Site Title', 'cornerstone' ),
  'values' => array(
    'text_content' => '{{dc:global:site_title}}',
  )
));

cs_register_prefab_element( 'dynamic', 'site-tagline', array(
  'type'   => 'text',
  'scope'  => ['all'],
  'title'  => __( 'Site Tagline', 'cornerstone' ),
  'values' => array(
    'text_content' => '{{dc:global:site_tagline}}',
  )
));

cs_register_prefab_element( 'dynamic', 'site-home-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Site Home Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => 'Home',
    'anchor_href'                 => '{{dc:global:home_url}}',
  )
));

cs_register_prefab_element( 'dynamic', 'site-admin-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Site Admin Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => 'Admin',
    'anchor_href'                 => '{{dc:global:admin_url}}',
  )
));



// Dynamic Elements (Archive)
// =============================================================================

// Title
// -----

cs_register_prefab_element( 'dynamic', 'archive-title', array(
  'type'   => 'headline',
  'scope'  => ['layout-archive', 'bars'],
  'title'  => __( 'Archive Title', 'cornerstone' ),
  'values' => array(
    'text_content' => '{{dc:archive:title}}',
  )
));


// Description
// -----------

cs_register_prefab_element( 'dynamic', 'archive-description', array(
  'type'   => 'text',
  'scope'  => ['layout-archive', 'bars'],
  'title'  => __( 'Archive Description', 'cornerstone' ),
  'values' => array(
    'text_content' => '{{dc:archive:description}}',
  )
));


// Link
// ----

cs_register_prefab_element( 'dynamic', 'archive-link', array(
  'type'   => 'button',
  'scope'  => ['layout-archive', 'bars'],
  'title'  => __( 'Archive Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => '{{dc:archive:title}}',
    'anchor_href'                 => '{{dc:archive:url}}',
  )
));



// Dynamic Elements (Post)
// =============================================================================

// Text
// ----

cs_register_prefab_element( 'dynamic', 'the-title', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'The Title', 'cornerstone' ),
  'values' => array(
    'text_base_font_size' => '3.05em',
    'text_line_height'    => '1.2',
    'text_content'        => '{{dc:post:title}}',
  )
));

cs_register_prefab_element( 'dynamic', 'the-content', array(
  'type'   => 'the-content',
  'scope'  => ['layout-single'],
  'title'  => __( 'The Content', 'cornerstone' ),
  'values' => []
));

cs_register_prefab_element( 'dynamic', 'the-excerpt', array(
  'type'   => 'text',
  'scope'  => ['all'],
  'title'  => __( 'The Excerpt', 'cornerstone' ),
  'values' => array(
    'text_content' => sprintf('{{dc:post:excerpt fallback="%s"}}', __('No excerpt', 'cornerstone')),
  )
));


// Featured Image
// --------------

cs_register_prefab_element( 'dynamic', 'featured-image', array(
  'type'   => 'image',
  'scope'  => ['all'],
  'title'  => __( 'Featured Image', 'cornerstone' ),
  'values' => array(
    'image_src' => '{{dc:post:featured_image_id}}',
  )
));


// Author
// ------

cs_register_prefab_element( 'dynamic', 'author-vertical', array(
  'type'   => 'layout-div',
  'scope'  => ['all'],
  'title'  => __( 'Author (Vertical)', 'cornerstone' ),
  'values' => array(
    'layout_div_tag'          => 'a',
    'layout_div_href'         => '{{dc:user:url}}',
    'layout_div_max_width'    => '28em',
    'layout_div_flex_wrap'    => false,
    'layout_div_flex_align'   => 'stretch',
    'layout_div_margin'       => '0px auto 0px auto',
    'layout_div_padding'      => '!0em',
    'effects_duration'        => '500ms',
    'effects_timing_function' => 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
    'effects_provider'        => true,
    'effects_alt'             => true,
    'effects_transform_alt'   => 'translate(0px, -4px)',
    '_type'                   => 'layout-div',
    '_label'                  => 'Author',
    '_modules'                => array(
      array(
        'layout_div_tag'                   => 'aside',
        'layout_div_bg_color'              => 'rgba(0, 0, 0, 0.06)',
        'layout_div_bg_color_alt'          => 'rgba(0, 0, 0, 0.11)',
        'layout_div_flexbox'               => true,
        'layout_div_flex_wrap'             => false,
        'layout_div_flex_align'            => 'stretch',
        'layout_div_margin'                => '26px 0px 0px 0px',
        'layout_div_padding'               => '0em 1.953em 1.563em 1.953em',
        'layout_div_border_radius'         => '1rem',
        'layout_div_box_shadow_dimensions' => '0em 0em 0em 0em',
        'effects_duration'                 => '500ms',
        '_type'                            => 'layout-div',
        '_label'                           => 'Aside',
        '_modules'                         => array(
          array(
            'layout_div_tag'                   => 'figure',
            'layout_div_bg_color'              => '#ffffff',
            'layout_div_width'                 => '52px',
            'layout_div_height'                => '52px',
            'layout_div_flex'                  => '0 0 auto',
            'layout_div_overflow_x'            => 'hidden',
            'layout_div_overflow_y'            => 'hidden',
            'layout_div_margin'                => '-26px 0px 1.25em 0px',
            'layout_div_border_width'          => '2px',
            'layout_div_border_color'          => '#ffffff',
            'layout_div_border_color_alt'      => '#ffffff',
            'layout_div_border_radius'         => '0.512em',
            'layout_div_box_shadow_dimensions' => '0em 0.55em 1.15em 0em',
            'layout_div_box_shadow_color'      => 'rgba(0, 0, 0, 0.16)',
            'effects_transform_origin'         => '0% 100%',
            'effects_duration'                 => '500ms',
            'effects_timing_function'          => 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
            'effects_alt'                      => true,
            'effects_transform_alt'            => 'rotateZ(-7deg)',
            '_type'                            => 'layout-div',
            '_label'                           => 'Figure',
            '_modules'                         => array(
              array(
                'image_src' => '{{dc:author:gravatar}}',
                '_type'     => 'image',
                '_label'    => 'Gravatar'
              ),
            ),
          ),
          array(
            'text_font_weight'             => 'inherit:700',
            'text_font_size'               => '1.25em',
            'text_line_height'             => '1.2',
            'text_text_color'              => '#000000',
            'text_content'                 => '{{dc:author:display_name}}',
            'text_tag'                     => 'h6',
            'text_subheadline'             => true,
            'text_subheadline_content'     => '{{dc:author:bio}}',
            'text_subheadline_tag'         => 'p',
            'text_subheadline_spacing'     => '0.409em',
            'text_subheadline_line_height' => '1.6',
            'text_subheadline_text_color'  => 'rgba(0, 0, 0, 0.66)',
            'effects_transform'            => 'translate3d(0, 0, 0)',
            '_type'                        => 'headline'
          ),
        ),
      ),
    ),
  )
));

cs_register_prefab_element( 'dynamic', 'author-horizontal', array(
  'type'   => 'layout-div',
  'scope'  => ['all'],
  'title'  => __( 'Author (Horizontal)', 'cornerstone' ),
  'values' => array(
    'layout_div_tag'          => 'a',
    'layout_div_href'         => '{{dc:user:url}}',
    'layout_div_flex_wrap'    => false,
    'layout_div_flex_align'   => 'stretch',
    'effects_duration'        => '500ms',
    'effects_timing_function' => 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
    'effects_provider'        => true,
    'effects_alt'             => true,
    'effects_transform_alt'   => 'translate(0px, -4px)',
    '_type'                   => 'layout-div',
    '_label'                  => 'Author',
    '_modules'                => array(
      array(
        'layout_div_tag'            => 'aside',
        'layout_div_bg_color'       => 'rgba(0, 0, 0, 0.06)',
        'layout_div_bg_color_alt'   => 'rgba(0, 0, 0, 0.11)',
        'layout_div_flexbox'        => true,
        'layout_div_flex_direction' => 'row',
        'layout_div_flex_wrap'      => false,
        'layout_div_margin'         => '0px 0px 0px 26px',
        'layout_div_padding'        => '1.953em 1.953em 1.953em 0em',
        'layout_div_border_radius'  => '1rem',
        'effects_duration'          => '500ms',
        '_type'                     => 'layout-div',
        '_label'                    => 'Aside',
        '_modules'                  => array(
          array(
            'layout_div_tag'                   => 'figure',
            'layout_div_bg_color'              => '#ffffff',
            'layout_div_width'                 => '52px',
            'layout_div_height'                => '52px',
            'layout_div_flex'                  => '0 0 auto',
            'layout_div_overflow_x'            => 'hidden',
            'layout_div_overflow_y'            => 'hidden',
            'layout_div_margin'                => '0px 1.25em 0px -26px',
            'layout_div_border_width'          => '2px',
            'layout_div_border_color'          => '#ffffff',
            'layout_div_border_color_alt'      => '#ffffff',
            'layout_div_border_radius'         => '0.512em',
            'layout_div_box_shadow_dimensions' => '0em 0.55em 1.15em 0em',
            'layout_div_box_shadow_color'      => 'rgba(0, 0, 0, 0.16)',
            'effects_transform_origin'         => '0% 100%',
            'effects_duration'                 => '500ms',
            'effects_timing_function'          => 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
            'effects_alt'                      => true,
            'effects_transform_alt'            => 'rotateZ(-7deg)',
            '_type'                            => 'layout-div',
            '_label'                           => 'Figure',
            '_modules'                         => array(
              array(
                'image_src' => '{{dc:author:gravatar}}',
                '_type'     => 'image',
                '_label'    => 'Gravatar'
              ),
            ),
          ),
          array(
            'text_font_weight'             => 'inherit:700',
            'text_font_size'               => '1.25em',
            'text_line_height'             => '1.2',
            'text_text_color'              => '#000000',
            'text_content'                 => '{{dc:author:display_name}}',
            'text_tag'                     => 'h6',
            'text_subheadline'             => true,
            'text_subheadline_content'     => '{{dc:author:bio}}',
            'text_subheadline_tag'         => 'p',
            'text_subheadline_spacing'     => '0.409em',
            'text_subheadline_line_height' => '1.6',
            'text_subheadline_text_color'  => 'rgba(0, 0, 0, 0.66)',
            'effects_transform'            => 'translate3d(0, 0, 0)',
            '_type'                        => 'headline'
          ),
        ),
      ),
    ),
  )
));


// Meta Line
// ---------

$meta_line_line_height = '1.65';
$meta_line_color_base  = '#000000';
$meta_line_color_int   = 'rgba(0, 0, 0, 0.33)';

cs_register_prefab_element( 'dynamic', 'meta-line', array(
  'type'   => 'layout-div',
  'scope'  => ['all'],
  'title'  => __( 'Meta Line', 'cornerstone' ),
  'values' => array(
    'layout_div_flexbox'        => true,
    'layout_div_flex_direction' => 'row',
    'layout_div_flex_align'     => 'baseline',
    '_type'                     => 'layout-div',
    '_label'                    => 'Meta Line',
    '_modules'                  => array(
      array(
        'layout_div_flexbox'        => true,
        'layout_div_flex_direction' => 'row',
        'layout_div_flex_wrap'      => false,
        'layout_div_flex_align'     => 'center',
        '_type'                     => 'layout-div',
        '_label'                    => 'Date',
        '_modules'                  => array(
          array(
            'text_line_height' => $meta_line_line_height,
            'text_text_color'  => $meta_line_color_base,
            'text_content'     => '{{dc:post:publish_date}}',
            'class'            => '{{thing}}',
            '_type'            => 'text',
            '_label'           => 'Text'
          ),
          array(
            'text_line_height' => $meta_line_line_height,
            'text_text_color'  => $meta_line_color_int,
            'text_content'     => '&nbsp;/&nbsp;',
            '_type'            => 'text',
            '_label'           => 'Divider'
          ),
        ),
      ),
      array(
        'layout_div_flexbox'        => true,
        'layout_div_flex_direction' => 'row',
        'layout_div_flex_wrap'      => false,
        'layout_div_flex_align'     => 'center',
        '_type'                     => 'layout-div',
        '_label'                    => 'Author',
        '_modules'                  => array(
          array(
            'text_line_height' => $meta_line_line_height,
            'text_text_color'  => $meta_line_color_base,
            'text_content'     => '{{dc:author:display_name}}',
            '_type'            => 'text',
            '_label'           => 'Text'
          ),
          array(
            'text_line_height' => $meta_line_line_height,
            'text_text_color'  => $meta_line_color_int,
            'text_content'     => '&nbsp;/&nbsp;',
            '_type'            => 'text',
            '_label'           => 'Divider'
          ),
        ),
      ),
      array(
        'layout_div_flexbox'        => true,
        'layout_div_flex_direction' => 'row',
        'layout_div_flex_wrap'      => false,
        'layout_div_flex_align'     => 'center',
        '_type'                     => 'layout-div',
        '_label'                    => 'Comments',
        '_modules'                  => array(
          array(
            'anchor_bg_color'               => 'transparent',
            'anchor_margin'                 => '!0px',
            'anchor_padding'                => '!0px',
            'anchor_border_radius'          => '!0px',
            'anchor_box_shadow_dimensions'  => '!0em 0em 0em 0em',
            'anchor_box_shadow_color'       => 'transparent',
            'anchor_text_margin'            => '!0px',
            'anchor_primary_line_height'    => $meta_line_line_height,
            'anchor_primary_text_color'     => $meta_line_color_base,
            'anchor_primary_text_color_alt' => 'rgba(0, 0, 0, 0.33)',
            'anchor_text_primary_content'   => 'Leave a Comment',
            'anchor_href'                   => '{{dc:post:comment_link}}',
            'show_condition'                => array(
              array(
                'group'     => true,
                'condition' => 'expression:number',
                'value'     => '0',
                'operand'   => '{{dc:post:comment_count}}',
                'operator'  => 'eq'
              ),
            ),
            '_type'  => 'button',
            '_label' => '0 Comments'
          ),
          array(
            'anchor_bg_color'               => 'transparent',
            'anchor_margin'                 => '!0px',
            'anchor_padding'                => '!0px',
            'anchor_border_radius'          => '!0px',
            'anchor_box_shadow_dimensions'  => '!0em 0em 0em 0em',
            'anchor_box_shadow_color'       => 'transparent',
            'anchor_text_margin'            => '!0px',
            'anchor_primary_line_height'    => $meta_line_line_height,
            'anchor_primary_text_color'     => $meta_line_color_base,
            'anchor_primary_text_color_alt' => 'rgba(0, 0, 0, 0.33)',
            'anchor_text_primary_content'   => '{{dc:post:comment_count}} Comment',
            'anchor_href'                   => '{{dc:post:comment_link}}',
            'show_condition'                => array(
              array(
                'group'     => true,
                'condition' => 'expression:number',
                'value'     => '1',
                'operand'   => '{{dc:post:comment_count}}',
                'operator'  => 'eq'
              ),
            ),
            '_type'  => 'button',
            '_label' => '1 Comment'
          ),
          array(
            'anchor_bg_color'               => 'transparent',
            'anchor_margin'                 => '!0px',
            'anchor_padding'                => '!0px',
            'anchor_border_radius'          => '!0px',
            'anchor_box_shadow_dimensions'  => '!0em 0em 0em 0em',
            'anchor_box_shadow_color'       => 'transparent',
            'anchor_text_margin'            => '!0px',
            'anchor_primary_line_height'    => $meta_line_line_height,
            'anchor_primary_text_color'     => $meta_line_color_base,
            'anchor_primary_text_color_alt' => 'rgba(0, 0, 0, 0.33)',
            'anchor_text_primary_content'   => '{{dc:post:comment_count}} Comments',
            'anchor_href'                   => '{{dc:post:comment_link}}',
            'show_condition'                => array(
              array(
                'group'     => true,
                'condition' => 'expression:number',
                'value'     => '1',
                'operand'   => '{{dc:post:comment_count}}',
                'operator'  => 'gt'
              ),
            ),
            '_type'  => 'button',
            '_label' => '2+ Comments'
          ),
          array(
            'text_line_height' => $meta_line_line_height,
            'text_text_color'  => $meta_line_color_int,
            'text_content'     => '&nbsp;/&nbsp;',
            '_type'            => 'text',
            '_label'           => 'Divider'
          ),
        ),
      ),
      array(
        'layout_div_flexbox'        => true,
        'layout_div_flex_direction' => 'row',
        'layout_div_flex_align'     => 'center',
        'looper_provider'           => true,
        'looper_provider_type'      => 'terms',
        '_type'                     => 'layout-div',
        '_label'                    => 'Terms',
        '_modules'                  => array(
          array(
            'layout_div_flexbox'        => true,
            'layout_div_flex_direction' => 'row',
            'layout_div_flex_wrap'      => false,
            'layout_div_flex_align'     => 'baseline',
            'looper_consumer'           => true,
            '_type'                     => 'layout-div',
            '_label'                    => 'Term',
            '_modules'                  => array(
              array(
                'anchor_bg_color'               => 'transparent',
                'anchor_margin'                 => '!0px',
                'anchor_padding'                => '!0px',
                'anchor_border_radius'          => '!0px',
                'anchor_box_shadow_dimensions'  => '!0em 0em 0em 0em',
                'anchor_box_shadow_color'       => 'transparent',
                'anchor_text_margin'            => '!0px',
                'anchor_primary_line_height'    => $meta_line_line_height,
                'anchor_primary_text_color'     => $meta_line_color_base,
                'anchor_primary_text_color_alt' => 'rgba(0, 0, 0, 0.33)',
                'anchor_text_primary_content'   => '{{dc:term:name}}',
                'anchor_href'                   => '{{dc:term:url}}',
                '_type'                         => 'button',
                '_label'                        => 'Link'
              ),
              array(
                'text_line_height' => $meta_line_line_height,
                'text_text_color'  => $meta_line_color_base,
                'text_content'     => ',&nbsp;',
                'show_condition'   => array(
                  array(
                    'group'     => true,
                    'condition' => 'looper:index',
                    'value'     => 'last',
                    'toggle'    => false
                  ),
                ),
                '_type'  => 'text',
                '_label' => 'Divider'
              ),
            ),
          ),
        ),
      ),
    ),
  )
));


// Terms
// -----

cs_register_prefab_element( 'dynamic', 'terms-cloud', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Terms (Cloud)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'      => 'auto',
    'layout_row_layout_lg'      => 'auto',
    'layout_row_layout_md'      => 'auto',
    'layout_row_layout_sm'      => 'auto',
    'layout_row_layout_xs'      => 'auto',
    'layout_row_base_font_size' => '0.8em',
    'layout_row_tag'            => 'ul',
    'layout_row_gap_column'     => '0.64em',
    'layout_row_gap_row'        => '0.8em',
    '_type'                     => 'layout-row',
    '_label'                    => 'Terms',
    '_modules'                  => array(
      array(
        'layout_column_tag'         => 'li',
        'looper_provider'           => true,
        'looper_provider_type'      => 'taxonomy',
        'looper_provider_terms_tax' => 'category',
        'looper_consumer'           => true,
        '_type'                     => 'layout-column',
        '_label'                    => 'List Item',
        '_modules'                  => array(
          array(
            'anchor_bg_color'               => 'rgba(0, 0, 0, 0.06)',
            'anchor_bg_color_alt'           => 'rgba(0, 0, 0, 0.11)',
            'anchor_padding'                => '0.8em 1.25em 0.8em 1.25em',
            'anchor_border_radius'          => '100em',
            'anchor_box_shadow_dimensions'  => '!0em 0em 0em 0em',
            'anchor_box_shadow_color'       => 'transparent',
            'anchor_text_margin'            => '!0px',
            'anchor_primary_font_weight'    => 'inherit:700',
            'anchor_primary_line_height'    => '1.45',
            'anchor_primary_text_color'     => 'rgba(0, 0, 0, 0.66)',
            'anchor_primary_text_color_alt' => '#000000',
            'anchor_flex_align'             => 'baseline',
            'anchor_text_primary_content'   => '{{dc:term:name}} ({{dc:term:count}})',
            'anchor_graphic_margin'         => '0em 0.209em 0em 0em',
            'anchor_graphic_icon'           => 'o-hashtag',
            'anchor_graphic_icon_font_size' => '1em',
            'anchor_graphic_icon_color'     => 'rgba(0, 0, 0, 0.66)',
            'anchor_graphic_icon_color_alt' => '#000000',
            'anchor_graphic_icon_alt'       => 'o-hashtag',
            'anchor_href'                   => '{{dc:term:url}}',
            'effects_duration'              => '222ms',
            '_type'                         => 'button',
            '_label'                        => 'Term'
          ),
        ),
      ),
    ),
  )
));


cs_register_prefab_element( 'dynamic', 'terms-minimal', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Terms (Minimal)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'  => 'auto',
    'layout_row_layout_lg'  => 'auto',
    'layout_row_layout_md'  => 'auto',
    'layout_row_layout_sm'  => 'auto',
    'layout_row_layout_xs'  => 'auto',
    'layout_row_tag'        => 'ul',
    'layout_row_gap_column' => '0em',
    'layout_row_gap_row'    => '0.512em',
    '_type'                 => 'layout-row',
    '_label'                => 'Terms',
    '_modules'              => array(
      array(
        'layout_column_tag'            => 'li',
        'layout_column_flexbox'        => true,
        'layout_column_flex_direction' => 'row',
        'layout_column_flex_wrap'      => false,
        'layout_column_flex_align'     => 'center',
        'looper_provider'              => true,
        'looper_provider_type'         => 'taxonomy',
        'looper_provider_terms_tax'    => 'category',
        'looper_consumer'              => true,
        '_type'                        => 'layout-column',
        '_label'                       => 'List Item',
        '_modules'                     => array(
          array(
            'anchor_base_font_size'         => '0.64em',
            'anchor_bg_color'               => 'transparent',
            'anchor_padding'                => '0.409em 0em 0.409em 0em',
            'anchor_border_radius'          => '!0px',
            'anchor_box_shadow_dimensions'  => '!0em 0em 0em 0em',
            'anchor_box_shadow_color'       => 'transparent',
            'anchor_text_margin'            => '!0px',
            'anchor_primary_font_weight'    => 'inherit:700',
            'anchor_primary_letter_spacing' => '0.135em',
            'anchor_primary_line_height'    => '1.4',
            'anchor_primary_text_transform' => 'uppercase',
            'anchor_primary_text_color'     => '#000000',
            'anchor_primary_text_color_alt' => 'rgba(0, 0, 0, 0.44)',
            'anchor_text_primary_content'   => '{{dc:term:name}}',
            'anchor_graphic_margin'         => '0em 0.262em 0em 0em',
            'anchor_graphic_icon'           => 'o-hashtag',
            'anchor_graphic_icon_font_size' => '1em',
            'anchor_graphic_icon_color'     => '#000000',
            'anchor_graphic_icon_color_alt' => 'rgba(0, 0, 0, 0.66)',
            'anchor_graphic_icon_alt'       => 'o-hashtag',
            'anchor_href'                   => '{{dc:term:url}}',
            'effects_duration'              => '222ms',
            '_type'                         => 'button',
            '_label'                        => 'Term'
          ),
          array(
            'text_padding'    => '0em 0.512em 0em 0.512em',
            'text_text_color' => 'rgba(0, 0, 0, 0.33)',
            'text_content'    => '/',
            'show_condition'  => array(
              array(
                'group'     => true,
                'condition' => 'looper:index',
                'value'     => 'last',
                'toggle'    => false
              ),
            ),
            '_type'  => 'text',
            '_label' => 'Not Last Divider'
          ),
          array(
            'text_padding'    => '0em 0.512em 0em 0.512em',
            'text_text_color' => 'rgba(0, 0, 0, 0.33)',
            'text_content'    => '/',
            'effects_opacity' => '0',
            'show_condition'  => array(
              array(
                'group'     => true,
                'condition' => 'looper:index',
                'value'     => 'last',
                'toggle'    => true
              ),
            ),
            '_type'  => 'text',
            '_label' => 'Last Divider'
          ),
        ),
      ),
    ),
  )
));


cs_register_prefab_element( 'dynamic', 'terms-column', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Terms (Column)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'  => '100%',
    'layout_row_layout_lg'  => '100%',
    'layout_row_layout_md'  => '100%',
    'layout_row_tag'        => 'ul',
    'layout_row_gap_column' => '1.563em',
    'layout_row_gap_row'    => '0em',
    '_type'                 => 'layout-row',
    '_label'                => 'Terms',
    '_modules'              => array(
      array(
        'layout_column_tag'         => 'li',
        'layout_column_flexbox'     => true,
        'layout_column_flex_wrap'   => false,
        'looper_provider'           => true,
        'looper_provider_type'      => 'taxonomy',
        'looper_provider_terms_tax' => 'category',
        'looper_consumer'           => true,
        '_type'                     => 'layout-column',
        '_label'                    => 'List Item',
        '_modules'                  => array(
          array(
            'layout_div_tag'            => 'a',
            'layout_div_href'           => '{{dc:term:url}}',
            'layout_div_width'          => '100%',
            'layout_div_height'         => '3.5em',
            'layout_div_flexbox'        => true,
            'layout_div_flex_direction' => 'row',
            'layout_div_flex_wrap'      => false,
            'layout_div_flex_justify'   => 'space-between',
            'layout_div_flex_align'     => 'center',
            'effects_provider'          => true,
            '_type'                     => 'layout-div',
            '_label'                    => 'Term',
            '_modules'                  => array(
              array(
                'text_font_weight'            => 'inherit:700',
                'text_line_height'            => '1.65',
                'text_text_color'             => '#000000',
                'text_text_color_alt'         => 'rgba(0, 0, 0, 0.44)',
                'text_content'                => '{{dc:term:name}}',
                'text_tag'                    => 'span',
                'text_overflow'               => true,
                'text_graphic_margin'         => '0em 0.327em 0em 0em',
                'text_graphic_icon'           => 'o-hashtag',
                'text_graphic_icon_font_size' => '1em',
                'text_graphic_icon_color'     => 'rgba(0, 0, 0, 0.44)',
                'text_graphic_icon_alt'       => 'o-hashtag',
                'effects_duration'            => '22ms',
                '_type'                       => 'headline',
                '_label'                      => 'Title'
              ),
              array(
                'layout_div_base_font_size' => '10px',
                'layout_div_tag'            => 'figure',
                'layout_div_bg_color'       => 'rgba(0, 0, 0, 0.06)',
                'layout_div_min_width'      => '2em',
                'layout_div_height'         => '2em',
                'layout_div_flex'           => '0 0 auto',
                'layout_div_flexbox'        => true,
                'layout_div_flex_justify'   => 'center',
                'layout_div_flex_align'     => 'center',
                'layout_div_margin'         => '0em 0em 0em 1em',
                'layout_div_padding'        => '0em 0.5em 0em 0.5em',
                'layout_div_border_radius'  => '3px',
                '_type'                     => 'layout-div',
                '_label'                    => 'Figure',
                '_modules'                  => array(
                  array(
                    'text_font_weight' => 'inherit:700',
                    'text_line_height' => '1',
                    'text_text_color'  => '#000000',
                    'text_content'     => '{{dc:term:count}}',
                    'effects_duration' => '0ms',
                    '_type'            => 'text',
                    '_label'           => 'Count'
                  ),
                ),
              ),
            ),
          ),
          array(
            'line_size'      => '1px',
            'line_color'     => 'rgba(0, 0, 0, 0.16)',
            'line_style'     => 'dotted',
            'show_condition' => array(
              array(
                'group'     => true,
                'condition' => 'looper:index',
                'value'     => 'last',
                'toggle'    => false
              ),
            ),
            '_type' => 'line'
          ),
        ),
      ),
    ),
  )
));


// Faux Comment Area
// -----------------

// cs_register_prefab_element( 'dynamic', 'faux-comment-area', array(
//   'type'   => 'div',
//   'scope'  => ['all'],
//   'title'  => __( 'Faux Comment Area', 'cornerstone' ),
//   'values' => array(
//     'div_bg_color' => 'red',
//     '_modules'     => array(
//       array(
//         '_type'              => 'comment-nav',
//         'comment_nav_margin' => '0 0 2em 0',
//       ),
//       array(
//         '_type' => 'comment-list',
//       ),
//       array(
//         '_type'              => 'comment-nav',
//         'comment_nav_margin' => '2em 0 0 0',
//       ),
//       array(
//         '_type' => 'comment-form',
//       ),
//     ),
//   )
// ));



// Dynamic Elements (WooCommerce)
// =============================================================================

// Add to Cart
// -----------

if ( class_exists( 'WC_API' ) ) :

cs_register_prefab_element( 'woocommerce', 'add-to-cart-button', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Add to Cart Button', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => 'Add to Cart',
    'anchor_href'                 => '?add-to-cart={{dc:woocommerce:product_id}}',
    'class'                       => 'add_to_cart_button ajax_add_to_cart',
    'custom_atts'                 => '{"data-quantity":"1","data-product_id":"{{dc:woocommerce:product_id}}","data-product_sku":"{{dc:woocommerce:product_sku}}","aria-label":"Add “{{dc:woocommerce:product_title}}” to your cart","rel":"nofollow"}'
  )
));

// cs_register_prefab_element( 'woocommerce', 'add-to-cart-with-quantity', array(
//   'type'   => 'button',
//   'scope'  => ['all'],
//   'title'  => __( 'Add to Cart Button', 'cornerstone' ),
//   'values' => array(

//   )
// ));


// Products
// --------

cs_register_prefab_element( 'woocommerce', 'shop-title', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'Shop Title', 'cornerstone' ),
  'values' => array(
    'text_base_font_size' => '3.05em',
    'text_line_height'    => '1.2',
    'text_content'        => '{{dc:woocommerce:page_title}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'product-title', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'Product Title', 'cornerstone' ),
  'values' => array(
    'text_base_font_size' => '3.05em',
    'text_line_height'    => '1.2',
    'text_content'        => '{{dc:woocommerce:product_title}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'product-long-description', array(
  'type'   => 'the-content',
  'scope'  => ['all'],
  'title'  => __( 'Product Long Description', 'cornerstone' ),
  'values' => []
));

cs_register_prefab_element( 'woocommerce', 'product-short-description', array(
  'type'   => 'text',
  'scope'  => ['all'],
  'title'  => __( 'Product Short Description', 'cornerstone' ),
  'values' => array(
    'text_content' => '{{dc:woocommerce:product_short_description}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'product-additional-information', array(
  'type'   => 'content-area',
  'scope'  => ['all'],
  'title'  => __( 'Product Additional Information', 'cornerstone' ),
  'values' => array(
    'content' => '{{dc:woocommerce:product_additional_information}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'product-reviews', array(
  'type'   => 'content-area',
  'scope'  => ['all'],
  'title'  => __( 'Product Reviews', 'cornerstone' ),
  'values' => array(
    'content' => '{{dc:woocommerce:product_reviews}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'product-image', array(
  'type'   => 'image',
  'scope'  => ['all'],
  'title'  => __( 'Product Image', 'cornerstone' ),
  'values' => array(
    'image_src' => '{{dc:woocommerce:product_image_id}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'product-price', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'Product Price', 'cornerstone' ),
  'values' => array(
    'text_tag'     => 'span',
    'text_content' => '{{dc:woocommerce:product_price}}',
  )
));


cs_register_prefab_element( 'woocommerce', 'product-rating', array(
  'type'   => 'rating',
  'scope'  => ['all'],
  'title'  => __( 'Product Rating', 'cornerstone' ),
  'values' => array(
    'rating_value_content' => '{{dc:woocommerce:product_average_rating}}',
  )
));


// Cart
// ----

cs_register_prefab_element( 'woocommerce', 'cart-total', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'Cart Total', 'cornerstone' ),
  'values' => array(
    'text_tag'     => 'span',
    'text_content' => '{{dc:woocommerce:cart_total}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'cart-items', array(
  'type'   => 'headline',
  'scope'  => ['all'],
  'title'  => __( 'Cart Items', 'cornerstone' ),
  'values' => array(
    'text_tag'     => 'span',
    'text_content' => '{{dc:woocommerce:cart_items}}',
  )
));


// Links
// -----

cs_register_prefab_element( 'woocommerce', 'shop-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Shop Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => __( 'Shop', 'cornerstone' ),
    'anchor_href'                 => '{{dc:woocommerce:shop_url}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'cart-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Cart Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => __( 'Cart', 'cornerstone' ),
    'anchor_href'                 => '{{dc:woocommerce:cart_url}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'checkout-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Checkout Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => __( 'Checkout', 'cornerstone' ),
    'anchor_href'                 => '{{dc:woocommerce:checkout_url}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'account-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Account Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => __( 'Account', 'cornerstone' ),
    'anchor_href'                 => '{{dc:woocommerce:account_url}}',
  )
));

cs_register_prefab_element( 'woocommerce', 'terms-link', array(
  'type'   => 'button',
  'scope'  => ['all'],
  'title'  => __( 'Terms Link', 'cornerstone' ),
  'values' => array(
    'anchor_text_primary_content' => __( 'Terms', 'cornerstone' ),
    'anchor_href'                 => '{{dc:woocommerce:terms_url}}',
  )
));


// Tabs
// ----

cs_register_prefab_element( 'woocommerce', 'product-tabs', array(
  'type'   => 'tabs',
  'scope'  => ['all'],
  'title'  => __( 'Product Tabs', 'cornerstone' ),
  'values' => array(
    '_modules' => array(
      array(
        '_type'             => 'tab',
        'tab_label_content' => __( 'Description', 'cornerstone' ),
        'tab_content'       => '{{dc:woocommerce:product_description fallback="No Description"}}',
      ),
      array(
        '_type'             => 'tab',
        'tab_label_content' => __( 'Additional Information', 'cornerstone' ),
        'tab_content'       => '{{dc:woocommerce:product_additional_information fallback="No Additional Information"}}',
      ),
      array(
        '_type'             => 'tab',
        'tab_label_content' => __( 'Reviews ({{dc:woocommerce:product_review_count}})', 'cornerstone' ),
        'tab_content'       => '{{dc:woocommerce:product_reviews fallback="No Reviews"}}',
      ),
    ),
  )
));

endif;



// Dynamic Elements (Posts)
// =============================================================================

// Tiles
// -----

cs_register_prefab_element( 'dynamic', 'posts-tiles', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Posts (Tiles)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'        => '28em',
    'layout_row_layout_lg'        => '28em',
    'layout_row_layout_md'        => '28em',
    'layout_row_layout_sm'        => '28em',
    'layout_row_layout_xs'        => '28em',
    'layout_row_base_font_size'   => '1rem',
    'layout_row_flex_justify'     => 'center',
    'layout_row_gap_column'       => '1em',
    'layout_row_gap_row'          => '1em',
    'layout_row_grow'             => true,
    'looper_provider'             => true,
    'looper_provider_query_count' => '3',
    '_type'                       => 'layout-row',
    '_label'                      => 'Posts',
    '_modules'                    => array(
      array(
        'layout_column_tag'                                 => 'a',
        'layout_column_height'                              => '44vh',
        'layout_column_min_height'                          => '320px',
        'layout_column_max_height'                          => '400px',
        'layout_column_overflow'                            => 'hidden',
        'layout_column_z_index'                             => '1',
        'layout_column_bg_color'                            => '#000000',
        'layout_column_href'                                => '{{dc:post:permalink}}',
        'layout_column_padding'                             => '!0em',
        'layout_column_border_radius'                       => '2px',
        'layout_column_box_shadow_dimensions'               => '0em 0.65em 1.5em 0em',
        'layout_column_box_shadow_color'                    => 'rgba(0, 0, 0, 0.22)',
        'layout_column_primary_particle'                    => true,
        'layout_column_primary_particle_location'           => 't_r',
        'layout_column_primary_particle_scale'              => 'scale-x',
        'layout_column_primary_particle_transform_origin'   => '100% 0%',
        'layout_column_primary_particle_width'              => '16px',
        'layout_column_primary_particle_color'              => '#ffba00',
        'layout_column_secondary_particle'                  => true,
        'layout_column_secondary_particle_location'         => 't_r',
        'layout_column_secondary_particle_delay'            => '150ms',
        'layout_column_secondary_particle_transform_origin' => '100% 0%',
        'layout_column_secondary_particle_width'            => '3px',
        'layout_column_secondary_particle_height'           => '16px',
        'layout_column_secondary_particle_color'            => '#ffba00',
        'effects_provider'                                  => true,
        'looper_consumer'                                   => true,
        '_type'                                             => 'layout-column',
        '_label'                                            => 'Post',
        '_modules'                                          => array(
          array(
            'layout_div_tag'          => 'article',
            'layout_div_bg_color'     => 'rgba(0, 0, 0, 0.66)',
            'layout_div_bg_color_alt' => 'rgba(0, 0, 0, 0.33)',
            'layout_div_width'        => '100%',
            'layout_div_height'       => '100%',
            'layout_div_position'     => 'static',
            'layout_div_flexbox'      => true,
            'layout_div_padding'      => '2.441em',
            'effects_duration'        => '650ms',
            '_type'                   => 'layout-div',
            '_label'                  => 'Article',
            '_modules'                => array(
              array(
                'text_font_size'      => '0.8em',
                'text_line_height'    => '1',
                'text_letter_spacing' => '0.15em',
                'text_text_transform' => 'uppercase',
                'text_text_color'     => 'rgba(255, 255, 255, 0.55)',
                'text_text_color_alt' => '#ffffff',
                'text_content'        => '{{dc:post:publish_date format=\'M / Y\'}}',
                'effects_duration'    => '650ms',
                '_type'               => 'text',
                '_label'              => 'Published'
              ),
              array(
                'text_max_width'      => '21em',
                'text_margin'         => 'auto 0em 0em 0em',
                'text_line_height'    => '1.25',
                'text_text_color'     => '#ffffff',
                'text_content'        => '{{dc:post:title}}',
                'text_base_font_size' => '1.563em',
                'text_tag'            => 'h2',
                'text_flex_direction' => 'column',
                'text_flex_justify'   => 'flex-start',
                'text_flex_align'     => 'flex-start',
                '_type'               => 'headline',
                '_label'              => 'The Title'
              ),
              array(
                'layout_div_tag'        => 'figure',
                'layout_div_z_index'    => '-1',
                'layout_div_position'   => 'absolute',
                'layout_div_top'        => '0px',
                'layout_div_left'       => '0px',
                'layout_div_right'      => '0px',
                'layout_div_bottom'     => '0px',
                'effects_transform'     => 'translate3d(0, 0, 0)',
                'effects_duration'      => '650ms',
                'effects_alt'           => true,
                'effects_transform_alt' => 'translate3d(0, 0, 0) scale(1.05)',
                'show_condition'        => array(
                  array(
                    'group'     => true,
                    'condition' => 'current-post:featured-image',
                    'value'     => ''
                  ),
                ),
                '_type'    => 'layout-div',
                '_label'   => 'Figure',
                '_modules' => array(
                  array(
                    'image_display'       => 'block',
                    'image_styled_width'  => '100%',
                    'image_styled_height' => '100%',
                    'image_src'           => '{{dc:post:featured_image_id}}',
                    'image_alt'           => 'Featured image for “{{dc:post:title}}”',
                    'image_object_fit'    => 'cover',
                    '_type'               => 'image',
                    '_label'              => 'Featured Image',
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  )
));


// Minimal
// -------

cs_register_prefab_element( 'dynamic', 'posts-minimal', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Posts (Minimal)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'        => '22em',
    'layout_row_layout_lg'        => '22em',
    'layout_row_layout_md'        => '22em',
    'layout_row_layout_sm'        => '22em',
    'layout_row_layout_xs'        => '22em',
    'layout_row_base_font_size'   => '1rem',
    'layout_row_flex_justify'     => 'center',
    'layout_row_gap_column'       => '1em',
    'layout_row_gap_row'          => '1em',
    'looper_provider'             => true,
    'looper_provider_query_count' => '6',
    '_type'                       => 'layout-row',
    '_label'                      => 'Posts',
    '_modules'                    => array(
      array(
        'layout_column_tag'                   => 'a',
        'layout_column_overflow'              => 'hidden',
        'layout_column_href'                  => '{{dc:post:permalink}}',
        'layout_column_flexbox'               => true,
        'layout_column_flex_align'            => 'stretch',
        'layout_column_padding'               => '1em',
        'layout_column_border_radius'         => '6px',
        'layout_column_box_shadow_dimensions' => '0em 0.65em 1.35em 0em',
        'layout_column_box_shadow_color_alt'  => 'rgba(0, 0, 0, 0.16)',
        'effects_duration'                    => '400ms',
        'effects_timing_function'             => 'cubic-bezier(0.680, -0.550, 0.265, 1.550)',
        'effects_provider'                    => true,
        'effects_alt'                         => true,
        'effects_transform_alt'               => 'translate(0em, -0.5em)',
        'looper_consumer'                     => true,
        '_type'                               => 'layout-column',
        '_label'                              => 'Post',
        '_modules'                            => array(
          array(
            'layout_div_tag'           => 'figure',
            'layout_div_bg_color'      => '#d5d5d5',
            'layout_div_height'        => '44vh',
            'layout_div_min_height'    => '210px',
            'layout_div_max_height'    => '240px',
            'layout_div_flex'          => '0 0 auto',
            'layout_div_overflow_x'    => 'hidden',
            'layout_div_overflow_y'    => 'hidden',
            'layout_div_margin'        => '0em 0em 1em 0em',
            'layout_div_border_radius' => '3px',
            'show_condition'           => array(
              array(
                'group'     => true,
                'condition' => 'current-post:featured-image',
                'value'     => '',
                'toggle'    => true
              ),
            ),
            '_type'    => 'layout-div',
            '_label'   => 'Figure',
            '_modules' => array(
              array(
                'image_display'             => 'block',
                'image_styled_width'        => '100%',
                'image_styled_height'       => '100%',
                'image_margin'              => '!0em',
                'image_outer_border_radius' => '!0px',
                'image_inner_border_radius' => '!0px',
                'image_src'                 => '{{dc:post:featured_image_id}}',
                'image_alt'                 => 'Featured image for “{{dc:post:title}}”',
                'image_object_fit'          => 'cover',
                '_type'                     => 'image',
                '_label'                    => 'Featured Image'
              ),
            ),
          ),
          array(
            'layout_div_tag'     => 'article',
            'layout_div_flex'    => '1 1 auto',
            'layout_div_flexbox' => true,
            'layout_div_padding' => '0em',
            '_type'              => 'layout-div',
            '_label'             => 'Article',
            '_modules'           => array(
              array(
                'text_max_width'          => '21em',
                'text_margin'             => '0em 0em 0.512em 0em',
                'text_font_weight'        => 'inherit:700',
                'text_line_height'        => '1.5',
                'text_text_color_alt'     => '#f45c00',
                'text_content'            => '{{dc:post:title}}',
                'text_tag'                => 'h2',
                'effects_duration'        => '400ms',
                'effects_timing_function' => 'cubic-bezier(0.770, 0.000, 0.175, 1.000)',
                '_type'                   => 'headline',
                '_label'                  => 'The Title'
              ),
              array(
                'text_margin'      => '0em 0em auto 0em',
                'text_line_height' => '1.6',
                'text_text_color'  => 'rgba(0, 0, 0, 0.55)',
                'text_content'     => '{{dc:post:excerpt length=\'20\' fallback=\'No excerpt\'}}&hellip;',
                '_type'            => 'text',
                '_label'           => 'The Excerpt'
              ),
              array(
                'text_margin'                  => '1.563em 0em 0em 0em',
                'text_font_weight'             => 'inherit:700',
                'text_font_size'               => '0.64em',
                'text_line_height'             => '1',
                'text_letter_spacing'          => '0.065em',
                'text_text_transform'          => 'uppercase',
                'text_text_color'              => '#000000',
                'text_content'                 => '{{dc:author:display_name}}',
                'text_overflow'                => true,
                'text_graphic'                 => true,
                'text_graphic_margin'          => '0em 0.409em 0em 0em',
                'text_graphic_icon'            => 'o-user-circle',
                'text_graphic_icon_font_size'  => '1em',
                'text_graphic_icon_width'      => '1em',
                'text_graphic_icon_height'     => '1em',
                'text_graphic_icon_color'      => '#000000',
                'text_graphic_icon_alt_enable' => true,
                'text_graphic_icon_alt'        => 'user-circle',
                'text_graphic_interaction'     => 'x-anchor-flip-y',
                'effects_duration'             => '400ms',
                'effects_timing_function'      => 'cubic-bezier(0.770, 0.000, 0.175, 1.000)',
                '_type'                        => 'headline',
                '_label'                       => 'The Author'
              ),
            ),
          ),
        ),
      ),
    ),
  )
));


// List
// ----

cs_register_prefab_element( 'dynamic', 'posts-list', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Posts (List)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'        => '100%',
    'layout_row_layout_lg'        => '100%',
    'layout_row_layout_md'        => '100%',
    'layout_row_base_font_size'   => '1rem',
    'layout_row_gap_column'       => '1em',
    'layout_row_gap_row'          => '1em',
    'looper_provider'             => true,
    'looper_provider_query_count' => '5',
    '_type'                       => 'layout-row',
    '_label'                      => 'Posts',
    '_modules'                    => array(
      array(
        'layout_column_tag'            => 'a',
        'layout_column_href'           => '{{dc:post:permalink}}',
        'layout_column_flexbox'        => true,
        'layout_column_flex_direction' => 'row',
        'layout_column_flex_wrap'      => false,
        'layout_column_flex_align'     => 'center',
        'effects_provider'             => true,
        'looper_consumer'              => true,
        '_type'                        => 'layout-column',
        '_label'                       => 'Post',
        '_modules'                     => array(
          array(
            'layout_div_tag'                   => 'figure',
            'layout_div_bg_color'              => '#4c3be9',
            'layout_div_width'                 => '4em',
            'layout_div_height'                => '4em',
            'layout_div_flex'                  => '0 0 auto',
            'layout_div_overflow_x'            => 'hidden',
            'layout_div_overflow_y'            => 'hidden',
            'layout_div_flexbox'               => true,
            'layout_div_flex_justify'          => 'center',
            'layout_div_flex_align'            => 'center',
            'layout_div_margin'                => '0em 1em 0em 0em',
            'layout_div_border_radius'         => '4px',
            'layout_div_box_shadow_dimensions' => '0em 0.15em 0.65em 0em',
            'layout_div_box_shadow_color'      => 'rgba(0, 0, 0, 0.11)',
            '_type'                            => 'layout-div',
            '_label'                           => 'Figure',
            '_modules'                         => array(
              array(
                'image_display'       => 'block',
                'image_styled_width'  => '100%',
                'image_styled_height' => '100%',
                'image_src'           => '{{dc:post:featured_image_id}}',
                'image_alt'           => 'Featured image for “{{dc:post:title}}”',
                'image_object_fit'    => 'cover',
                'show_condition'      => array(
                  array(
                    'group'     => true,
                    'condition' => 'current-post:featured-image',
                    'value'     => ''
                  ),
                ),
                '_type'  => 'image',
                '_label' => 'Featured Image',
              ),
              array(
                'icon'           => 'o-arrow-right',
                'icon_width'     => '1em',
                'icon_height'    => '1em',
                'icon_color'     => '#ffffff',
                'show_condition' => array(
                  array(
                    'group'     => true,
                    'condition' => 'current-post:featured-image',
                    'value'     => '',
                    'toggle'    => false
                  ),
                ),
                '_type' => 'icon'
              ),
            ),
          ),
          array(
            'layout_div_tag'       => 'article',
            'layout_div_min_width' => '1px',
            'layout_div_flex'      => '1 1 12em',
            '_type'                => 'layout-div',
            '_label'               => 'Article',
            '_modules'             => array(
              array(
                'text_font_weight'                => 'inherit:700',
                'text_text_color'                 => '#000000',
                'text_text_color_alt'             => '#4c3be9',
                'text_content'                    => '{{dc:post:title}}',
                'text_tag'                        => 'h2',
                'text_subheadline'                => true,
                'text_subheadline_content'        => '{{dc:post:publish_date format=\'M. d, Y\'}}',
                'text_subheadline_spacing'        => '0.512em',
                'text_subheadline_reverse'        => true,
                'text_subheadline_font_weight'    => 'inherit:700',
                'text_subheadline_font_size'      => '0.64em',
                'text_subheadline_line_height'    => '1.6',
                'text_subheadline_letter_spacing' => '0.125em',
                'text_subheadline_text_transform' => 'uppercase',
                'text_subheadline_text_color'     => 'rgba(0, 0, 0, 0.55)',
                'effects_duration'                => '0ms',
                '_type'                           => 'headline',
                '_label'                          => 'The Title'
              ),
            ),
          ),
        ),
      ),
    ),
  )
));


// Magazine
// --------

cs_register_prefab_element( 'dynamic', 'posts-magazine', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Posts (Magazine)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'        => '38rem 20rem',
    'layout_row_layout_lg'        => '38rem 20rem',
    'layout_row_layout_md'        => '38rem 20rem',
    'layout_row_layout_sm'        => '38rem 20rem',
    'layout_row_layout_xs'        => '38rem 20rem',
    'layout_row_base_font_size'   => '1rem',
    'layout_row_flex_justify'     => 'center',
    'layout_row_gap_column'       => '3em',
    'layout_row_gap_row'          => '3em',
    'layout_row_grow'             => true,
    'looper_provider'             => true,
    'looper_provider_query_count' => '5',
    '_type'                       => 'layout-row',
    '_label'                      => 'Posts',
    '_modules'                    => array(
      array(
        'layout_column_tag'                   => 'a',
        'layout_column_min_height'            => '58vmin',
        'layout_column_overflow'              => 'hidden',
        'layout_column_z_index'               => '1',
        'layout_column_bg_color'              => '#000000',
        'layout_column_href'                  => '{{dc:post:permalink}}',
        'layout_column_border_color_alt'      => 'transparent',
        'layout_column_border_radius'         => '2px',
        'layout_column_box_shadow_dimensions' => '10px 10px 0px 0px',
        'layout_column_box_shadow_color_alt'  => 'rgba(0, 0, 0, 0.16)',
        'effects_duration'                    => '500ms',
        'effects_provider'                    => true,
        'effects_alt'                         => true,
        'effects_transform_alt'               => 'translate3d(0, -10px, 0)',
        'looper_consumer'                     => true,
        'looper_consumer_repeat'              => '1',
        '_type'                               => 'layout-column',
        '_label'                              => 'Main Post',
        '_modules'                            => array(
          array(
            'layout_div_bg_color'         => 'rgba(18, 18, 18, 0.77)',
            'layout_div_bg_color_alt'     => 'rgba(18, 18, 18, 0.55)',
            'layout_div_width'            => '100%',
            'layout_div_height'           => '100%',
            'layout_div_position'         => 'static',
            'layout_div_flexbox'          => true,
            'layout_div_padding'          => 'calc(1rem + 5%)',
            'layout_div_border_color_alt' => 'transparent',
            'effects_duration'            => '500ms',
            '_type'                       => 'layout-div',
            '_label'                      => 'Article',
            '_modules'                    => array(
              array(
                'layout_div_flexbox'        => true,
                'layout_div_flex_direction' => 'row',
                'layout_div_flex_wrap'      => false,
                'layout_div_flex_align'     => 'baseline',
                'layout_div_margin'         => '0em 0em 1.563em 0em',
                '_type'                     => 'layout-div',
                '_label'                    => 'Meta',
                '_modules'                  => array(
                  array(
                    'text_font_size'      => '0.64em',
                    'text_line_height'    => '1',
                    'text_letter_spacing' => '0.125em',
                    'text_text_transform' => 'uppercase',
                    'text_text_color'     => 'rgba(255, 255, 255, 0.55)',
                    'text_text_color_alt' => '#ffffff',
                    'text_content'        => '{{dc:post:publish_date}}',
                    'effects_duration'    => '500ms',
                    '_type'               => 'text',
                    '_label'              => 'Date'
                  ),
                ),
              ),
              array(
                'text_max_width'      => '18em',
                'text_margin'         => 'auto 0em 0em 0em',
                'text_line_height'    => '1.35',
                'text_font_style'     => 'italic',
                'text_text_color'     => '#ffffff',
                'text_content'        => '{{dc:post:title}}',
                'text_base_font_size' => '1.563em',
                'text_tag'            => 'h2',
                '_type'               => 'headline',
                '_label'              => 'The Title'
              ),
              array(
                'layout_div_tag'        => 'figure',
                'layout_div_z_index'    => '-1',
                'layout_div_position'   => 'absolute',
                'layout_div_top'        => '0px',
                'layout_div_left'       => '0px',
                'layout_div_right'      => '0px',
                'layout_div_bottom'     => '0px',
                'effects_duration'      => '1000ms',
                'effects_alt'           => true,
                'effects_transform_alt' => 'scale(1.05)',
                'show_condition'        => array(
                  array(
                    'group'     => true,
                    'condition' => 'current-post:featured-image',
                    'value'     => ''
                  ),
                ),
                '_type'    => 'layout-div',
                '_label'   => 'Figure',
                '_modules' => array(
                  array(
                    'image_display'       => 'block',
                    'image_styled_width'  => '100%',
                    'image_styled_height' => '100%',
                    'image_src'           => '{{dc:post:featured_image_id}}',
                    'image_alt'           => 'Featured image for “{{dc:post:title}}”',
                    'image_object_fit'    => 'cover',
                    '_type'               => 'image',
                    '_label'              => 'Featured Image'
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      array(
        'layout_column_flexbox'      => true,
        'layout_column_flex_wrap'    => false,
        'layout_column_flex_justify' => 'space-between',
        'layout_column_flex_align'   => 'stretch',
        '_type'                      => 'layout-column',
        '_label'                     => 'More Posts',
        '_modules'                   => array(
          array(
            'layout_div_flexbox'        => true,
            'layout_div_flex_direction' => 'row',
            'layout_div_flex_wrap'      => false,
            'layout_div_flex_justify'   => 'space-between',
            'layout_div_flex_align'     => 'baseline',
            'layout_div_padding'        => '0em 0em 0.64em 0em',
            'layout_div_border_width'   => '0px 0px 1px 0px',
            'layout_div_border_style'   => 'solid solid dotted solid',
            'layout_div_border_color'   => 'transparent transparent #dddddd transparent',
            '_type'                     => 'layout-div',
            '_label'                    => 'Intro',
            '_modules'                  => array(
              array(
                'text_font_weight'    => 'inherit:700',
                'text_line_height'    => '1',
                'text_text_color'     => '#121212',
                'text_content'        => 'Latest',
                'text_base_font_size' => '1.953em',
                'text_tag'            => 'h2',
                '_type'               => 'headline'
              ),
              array(
                'anchor_base_font_size'          => '0.64em',
                'anchor_bg_color'                => 'transparent',
                'anchor_padding'                 => '!0em',
                'anchor_border_radius'           => '!0em',
                'anchor_box_shadow_dimensions'   => '!0em 0em 0em 0em',
                'anchor_box_shadow_color'        => 'transparent',
                'anchor_text_margin'             => '!0px',
                'anchor_primary_letter_spacing'  => '0.125em',
                'anchor_primary_text_transform'  => 'uppercase',
                'anchor_primary_text_color'      => 'rgba(18, 18, 18, 0.55)',
                'anchor_primary_text_color_alt'  => '#121212',
                'anchor_flex_direction'          => 'row-reverse',
                'anchor_text_primary_content'    => 'See All',
                'anchor_graphic'                 => true,
                'anchor_graphic_margin'          => '0em 0em 0em 0.512em',
                'anchor_graphic_icon'            => 'o-arrow-right',
                'anchor_graphic_icon_font_size'  => '1em',
                'anchor_graphic_icon_height'     => '1em',
                'anchor_graphic_icon_color'      => 'rgba(18, 18, 18, 0.55)',
                'anchor_graphic_icon_color_alt'  => '#121212',
                'anchor_href'                    => '{{dc:global:blog_url}}',
                'effects_duration'               => '0ms',
                '_type'                          => 'button'
              ),
            ),
          ),
          array(
            'layout_div_tag'            => 'a',
            'layout_div_href'           => '{{dc:post:permalink}}',
            'layout_div_width'          => '100%',
            'layout_div_flexbox'        => true,
            'layout_div_flex_direction' => 'row',
            'layout_div_flex_wrap'      => false,
            'layout_div_flex_justify'   => 'space-between',
            'layout_div_margin'         => '2.441em 0em 0em 0em',
            'effects_provider'          => true,
            'looper_consumer'           => true,
            '_type'                     => 'layout-div',
            '_label'                    => 'Post',
            '_modules'                  => array(
              array(
                'text_padding'                    => '!1em',
                'text_border_radius'              => '!2px',
                'text_font_size'                  => '1.25em',
                'text_line_height'                => '1.35',
                'text_font_style'                 => 'italic',
                'text_text_color'                 => '#121212',
                'text_text_color_alt'             => '#4353ff',
                'text_content'                    => '{{dc:post:title}}',
                'text_tag'                        => 'h3',
                'text_subheadline'                => true,
                'text_subheadline_content'        => '{{dc:post:publish_date}}',
                'text_subheadline_spacing'        => '0.64em',
                'text_subheadline_reverse'        => true,
                'text_subheadline_font_size'      => '0.64em',
                'text_subheadline_line_height'    => '1',
                'text_subheadline_letter_spacing' => '0.125em',
                'text_subheadline_text_transform' => 'uppercase',
                'text_subheadline_text_color'     => 'rgba(18, 18, 18, 0.55)',
                'effects_duration'                => '0ms',
                '_type'                           => 'headline',
                '_label'                          => 'The Title'
              ),
              array(
                'layout_div_tag'                   => 'figure',
                'layout_div_bg_color'              => '#000000',
                'layout_div_width'                 => '3.5em',
                'layout_div_height'                => '3.5em',
                'layout_div_flex'                  => '0 0 auto',
                'layout_div_overflow_x'            => 'hidden',
                'layout_div_overflow_y'            => 'hidden',
                'layout_div_flexbox'               => true,
                'layout_div_flex_wrap'             => false,
                'layout_div_flex_justify'          => 'center',
                'layout_div_flex_align'            => 'center',
                'layout_div_margin'                => '0em 5px 5px 1.953em',
                'layout_div_border_radius'         => '2px',
                'layout_div_box_shadow_dimensions' => '5px 5px 0px 0px',
                'layout_div_box_shadow_color'      => 'rgba(18, 18, 18, 0.16)',
                '_type'                            => 'layout-div',
                '_label'                           => 'Figure',
                '_modules'                         => array(
                  array(
                    'image_display'       => 'block',
                    'image_styled_width'  => '100%',
                    'image_styled_height' => '100%',
                    'image_src'           => '{{dc:post:featured_image_id}}',
                    'image_alt'           => 'Featured image for “{{dc:post:title}}”',
                    'image_object_fit'    => 'cover',
                    'show_condition'      => array(
                      array(
                        'group'     => true,
                        'condition' => 'current-post:featured-image',
                        'value'     => ''
                      ),
                    ),
                    '_type' => 'image'
                  ),
                  array(
                    'icon'           => 'o-arrow-right',
                    'icon_width'     => '1em',
                    'icon_height'    => '1em',
                    'icon_color'     => '#ffffff',
                    'show_condition' => array(
                      array(
                        'group'     => true,
                        'condition' => 'current-post:featured-image',
                        'value'     => '',
                        'toggle'    => false
                      ),
                    ),
                    '_type' => 'icon'
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
    ),
  )
));



// List Elements
// =============================================================================

$looper_list_json = "[\n  {\n    \"text\" : \"This is an list, which is currently powered by a JSON Looper Provider.\"\n  },\n  {\n    \"text\" : \"To adjust its content, locate the &ldquo;List Item&rdquo; Element in the outline and go to its &ldquo;Customize&rdquo; controls.\"\n  },\n  {\n    \"text\" : \"Then, locate the &ldquo;Looper Provider&rdquo; control group and click on the &ldquo;Edit&rdquo; button for the &ldquo;Content&rdquo; control.\"\n  },\n  {\n    \"text\" : \"Inside the code editor, you can edit or add new items to the list as you need them.\"\n  },\n  {\n    \"text\" : \"The benefit of using a Looper Provider like this is the uniform styling that gets applied to all children.\"\n  },\n  {\n    \"text\" : \"If you'd prefer to go manual or style each item differently, simply turn off the Looper Provider / Consumer and go for it!\"\n  }\n]";


// Looper / Baseline
// -----------------

cs_register_prefab_element( 'dynamic', 'looper-list-baseline', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Looper List (Baseline)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'  => '100%',
    'layout_row_layout_lg'  => '100%',
    'layout_row_layout_md'  => '100%',
    'layout_row_tag'        => 'ol',
    'layout_row_gap_column' => '2.441em',
    'layout_row_gap_row'    => '0.8em',
    'layout_row_margin'     => '0px auto 0px auto',
    '_type'                 => 'layout-row',
    '_label'                => 'List',
    '_modules'              => array(
      array(
        'layout_column_tag'            => 'li',
        'layout_column_flexbox'        => true,
        'layout_column_flex_direction' => 'row',
        'layout_column_flex_align'     => 'baseline',
        'looper_provider'              => true,
        'looper_provider_type'         => 'json',
        'looper_provider_json'         => $looper_list_json,
        'looper_consumer'              => true,
        '_type'                        => 'layout-column',
        '_label'                       => 'List Item',
        '_modules'                     => array(
          array(
            'layout_div_tag'            => 'figure',
            'layout_div_width'          => '1em',
            'layout_div_flexbox'        => true,
            'layout_div_flex_direction' => 'row',
            'layout_div_flex_justify'   => 'center',
            'layout_div_flex_align'     => 'baseline',
            'layout_div_margin'         => '0em 0.8em 0em 0em',
            '_type'                     => 'layout-div',
            '_label'                    => 'Figure',
            '_modules'                  => array(
              array(
                'text_font_weight' => 'inherit:700',
                'text_line_height' => '1.65',
                'text_text_align'  => 'center',
                'text_text_color'  => '#f40b7f',
                'text_content'     => '{{dc:looper:index}}.',
                '_type'            => 'text'
              ),
            ),
          ),
          array(
            'layout_div_flex'         => '1 1 16em',
            'effects_scroll'          => true,
            'effects_transform_exit'  => 'translate(0px, 0.5em)',
            'effects_offset_bottom'   => '15%',
            'effects_duration_scroll' => '650ms',
            '_type'                   => 'layout-div',
            '_label'                  => 'Content',
            '_modules'                => array(
              array(
                'text_line_height' => '1.65',
                'text_text_color'  => '#000000',
                'text_content'     => '{{dc:looper:field key=\'text\'}}',
                '_type'            => 'text'
              ),
            ),
          ),
        ),
      ),
    ),
  )
));


// Looper / Centered
// -----------------

cs_register_prefab_element( 'dynamic', 'looper-list-centered', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Looper List (Centered)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'  => '100%',
    'layout_row_layout_lg'  => '100%',
    'layout_row_layout_md'  => '100%',
    'layout_row_tag'        => 'ol',
    'layout_row_gap_column' => '2.441em',
    'layout_row_flex_align' => 'flex-start',
    'layout_row_gap_row'    => '1em',
    'layout_row_margin'     => '0px auto 0px auto',
    '_type'                 => 'layout-row',
    '_label'                => 'List',
    '_modules'              => array(
      array(
        'layout_column_tag'            => 'li',
        'layout_column_flexbox'        => true,
        'layout_column_flex_direction' => 'row',
        'layout_column_flex_align'     => 'center',
        'looper_provider'              => true,
        'looper_provider_type'         => 'json',
        'looper_provider_json'         => $looper_list_json,
        'looper_consumer'              => true,
        '_type'                        => 'layout-column',
        '_label'                       => 'List Item',
        '_modules'                     => array(
          array(
            'layout_div_tag'                   => 'figure',
            'layout_div_bg_color'              => '#f40b7f',
            'layout_div_width'                 => '2em',
            'layout_div_height'                => '2em',
            'layout_div_flexbox'               => true,
            'layout_div_flex_direction'        => 'row',
            'layout_div_flex_justify'          => 'center',
            'layout_div_flex_align'            => 'center',
            'layout_div_margin'                => '0.409em 1em 0.409em 0em',
            'layout_div_border_radius'         => '0.64em',
            'layout_div_box_shadow_dimensions' => '0em 0.15em 0.35em 0em',
            'layout_div_box_shadow_color'      => 'rgba(46, 17, 31, 0.11)',
            '_type'                            => 'layout-div',
            '_label'                           => 'Figure',
            '_modules'                         => array(
              array(
                'text_font_weight'            => 'inherit:700',
                'text_line_height'            => '1',
                'text_text_color'             => '#ffffff',
                'text_text_shadow_dimensions' => '0px 1px 2px',
                'text_text_shadow_color'      => 'rgba(46, 17, 31, 0.22)',
                'text_content'                => '{{dc:looper:index}}',
                '_type'                       => 'text'
              ),
            ),
          ),
          array(
            'layout_div_flex'         => '1 1 15em',
            'effects_scroll'          => true,
            'effects_transform_exit'  => 'translate(0px, 0.5em)',
            'effects_offset_bottom'   => '15%',
            'effects_duration_scroll' => '650ms',
            '_type'                   => 'layout-div',
            '_label'                  => 'Content',
            '_modules'                => array(
              array(
                'text_line_height' => '1.65',
                'text_text_color'  => '#000000',
                'text_content'     => '{{dc:looper:field key=\'text\'}}',
                '_type'            => 'text'
              ),
            ),
          ),
        ),
      ),
    ),
  )
));


// Static / Baseline
// -----------------

function static_baseline_list_item( $content ) {
  return array(
    'layout_column_tag'            => 'li',
    'layout_column_flexbox'        => true,
    'layout_column_flex_direction' => 'row',
    'layout_column_flex_align'     => 'baseline',
    'looper_provider_type'         => 'json',
    '_type'                        => 'layout-column',
    '_label'                       => 'List Item',
    '_modules'                     => array(
      array(
        'layout_div_tag'    => 'figure',
        'layout_div_margin' => '0em 0.8em 0em 0em',
        '_type'             => 'layout-div',
        '_label'            => 'Figure',
        '_modules'          => array(
          array(
            'icon'       => 'o-check',
            'icon_width' => '1em',
            'icon_color' => '#1b9d56',
            '_type'      => 'icon'
          ),
        ),
      ),
      array(
        'layout_div_flex'         => '1 1 16em',
        'effects_scroll'          => true,
        'effects_transform_exit'  => 'translate(0px, 0.5em)',
        'effects_offset_bottom'   => '15%',
        'effects_duration_scroll' => '650ms',
        '_type'                   => 'layout-div',
        '_label'                  => 'Content',
        '_modules'                => array(
          array(
            'text_line_height' => '1.65',
            'text_text_color'  => '#000000',
            'text_content'     => $content,
            '_type'            => 'text'
          ),
        ),
      ),
    ),
  );
}

cs_register_prefab_element( 'dynamic', 'static-list-baseline', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Static List (Baseline)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'  => '100%',
    'layout_row_layout_lg'  => '100%',
    'layout_row_layout_md'  => '100%',
    'layout_row_tag'        => 'ul',
    'layout_row_gap_column' => '2.441em',
    'layout_row_gap_row'    => '0.8em',
    'layout_row_margin'     => '0px auto 0px auto',
    '_type'                 => 'layout-row',
    '_label'                => 'List',
    '_modules'              => array(
      static_baseline_list_item( 'This is a list, which styles each &ldquo;List Item&rdquo; individually (unlike utilizing a Looper as with some of our other list Elements).' ),
      static_baseline_list_item( 'While this approach is more straightforward than using a Looper, there is a little more work you\'ll need to do to keep things uniform between your &ldquo;List Items.&rdquo;' ),
      static_baseline_list_item( 'For example, if you change the line height for the text in one &ldquo;List Item,&rdquo; you will want to make sure that you set the same line height for all other &ldquo;List Items&rdquo; so that they match.' ),
      static_baseline_list_item( 'However, you can also use this to your advantage to change individual &ldquo;List Items&rdquo; more easily if you want to.' ),
    ),
  )
));


// Static / Centered
// -----------------

function static_centered_list_item( $content ) {
  return array(
    'layout_column_tag'            => 'li',
    'layout_column_flexbox'        => true,
    'layout_column_flex_direction' => 'row',
    'layout_column_flex_align'     => 'center',
    'looper_provider_type'         => 'json',
    '_type'                        => 'layout-column',
    '_label'                       => 'List Item',
    '_modules'                     => array(
      array(
        'layout_div_tag'                   => 'figure',
        'layout_div_bg_color'              => '#1b9d56',
        'layout_div_width'                 => '2em',
        'layout_div_height'                => '2em',
        'layout_div_flexbox'               => true,
        'layout_div_flex_justify'          => 'center',
        'layout_div_flex_align'            => 'center',
        'layout_div_margin'                => '0.409em 1em 0.409em 0em',
        'layout_div_border_radius'         => '0.64em',
        'layout_div_box_shadow_dimensions' => '0em 0.15em 0.35em 0em',
        'layout_div_box_shadow_color'      => 'rgba(23, 44, 33, 0.11)',
        '_type'                            => 'layout-div',
        '_label'                           => 'Figure',
        '_modules'                         => array(
          array(
            'icon'                        => 'o-check',
            'icon_height'                 => '1em',
            'icon_color'                  => '#ffffff',
            'icon_text_shadow_dimensions' => '0px 1px 2px',
            'icon_text_shadow_color'      => 'rgba(23, 44, 33, 0.22)',
            '_type'                       => 'icon'
          ),
        ),
      ),
      array(
        'layout_div_flex'         => '1 1 15em',
        'effects_scroll'          => true,
        'effects_transform_exit'  => 'translate(0px, 0.5em)',
        'effects_offset_bottom'   => '15%',
        'effects_duration_scroll' => '650ms',
        '_type'                   => 'layout-div',
        '_label'                  => 'Content',
        '_modules'                => array(
          array(
            'text_line_height' => '1.65',
            'text_text_color'  => '#000000',
            'text_content'     => $content,
            '_type'            => 'text'
          ),
        ),
      ),
    ),
  );
}

cs_register_prefab_element( 'dynamic', 'static-list-centered', array(
  'type'   => 'layout-row',
  'scope'  => ['all'],
  'title'  => __( 'Static List (Centered)', 'cornerstone' ),
  'values' => array(
    'layout_row_layout_xl'  => '100%',
    'layout_row_layout_lg'  => '100%',
    'layout_row_layout_md'  => '100%',
    'layout_row_tag'        => 'ul',
    'layout_row_gap_column' => '2.441em',
    'layout_row_flex_align' => 'flex-start',
    'layout_row_gap_row'    => '1em',
    'layout_row_margin'     => '0px auto 0px auto',
    '_type'                 => 'layout-row',
    '_label'                => 'List',
    '_modules'              => array(
      static_centered_list_item( 'This is a list, which styles each &ldquo;List Item&rdquo; individually (unlike utilizing a Looper as with some of our other list Elements).' ),
      static_centered_list_item( 'While this approach is more straightforward than using a Looper, there is a little more work you\'ll need to do to keep things uniform between your &ldquo;List Items.&rdquo;' ),
      static_centered_list_item( 'For example, if you change the line height for the text in one &ldquo;List Item,&rdquo; you will want to make sure that you set the same line height for all other &ldquo;List Items&rdquo; so that they match.' ),
      static_centered_list_item( 'However, you can also use this to your advantage to change individual &ldquo;List Items&rdquo; more easily if you want to.' ),
    ),
  )
));
