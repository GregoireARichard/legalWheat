<?php
/**
 * This houses all the code to integrate with X
 */

class Cornerstone_Theme_Integration extends Cornerstone_Plugin_Component {

  protected $pro = false;

  public function setup() {
    add_action('after_setup_theme', array( $this, 'theme_setup'));
  }

  public function should_integrate() {

    if ( apply_filters('cornerstone_x_integration', false ) ) {
      return true;
    }

    $current_theme = get_stylesheet();

    if ( is_child_theme() ) {
      $child_theme = wp_get_theme();
      $current_theme = $child_theme->Template;
    }

    return in_array( $current_theme, array( 'x', 'pro', 'xpro' ) );
  }

  /**
   * Theme integrations are loaded on the after_setup_theme hook
   */
  public function theme_setup() {
    if (!$this->should_integrate()) {
      return;
    }

    add_action( 'init', array( $this, 'init' ), 20 );
    add_action( 'admin_init', array( $this, 'admin_init' ) );

    add_action( 'cornerstone_load_preview', array( $this, 'load_preview' ) );
    add_filter( 'cornerstone_config_common_default-settings', array( $this, 'addDefaultSettings' ) );

    add_action( 'cs_theme_templates', '__return_false' );

    // Set the app slug
    add_filter( 'cornerstone_default_app_slug', array( $this, 'app_slug' ) );

    if (!defined('X_EMBED')) {

      // Don't enqueue native styles when directly running X/Pro
      add_filter( 'cornerstone_enqueue_styles', '__return_false' );
      add_filter( 'cornerstone_enqueue_admin_styles', '__return_false' );
      add_filter( 'cornerstone_customizer_output',  '__return_false' );

      // Enable X specific settings pane items
      add_filter( 'x_settings_pane', '__return_true' );

      require_once( CS()->path( 'includes/extend/portfolio.php' ) );

      // No selector prefix for element styles
      add_filter( 'cs_coalescence_selector_prefixes', '__return_empty_array' );

    }

    // Declare support for page builder features
    add_filter( 'cornerstone_looks_like_support', '__return_true' );

    // Alias legacy shortcode names.
    add_action( 'cornerstone_shortcodes_loaded', array( $this, 'aliasShortcodes' ) );

    // Prevent Cornerstone from messaging about validation
    add_filter('_cornerstone_integration_remove_global_validation_notice', '__return_true' );

    add_filter( 'cornerstone_scrolltop_selector', array( $this, 'scrollTopSelector' ) );
    add_filter( 'cs_recent_posts_post_types', array( $this, 'recentPostTypes' ) );

    add_filter( 'cornerstone_menu_item_root', array( $this, 'relocateDashboardMenuCustomItems') );

    add_filter( '_cs_validation_url', 'x_addons_get_link_home' );

    add_filter( 'cs_app_preference_defaults', array( $this, 'app_preference_defaults') );

    add_filter( 'cs_late_styling_hook', array( $this, 'styling_hook') );

    add_filter( 'cs_fa_config', array( $this, 'modify_fa_config' ) );

    if (! function_exists( 'ups_options_init' ) ) {
      require_once( CS()->path( 'includes/extend/custom-sidebars.php' ) );
    }

  }

  public function init() {

    // Remove empty p and br HTML elements for legacy pages not using Cornerstone sections
    add_filter( 'the_content', array( $this, 'legacy_the_content') );

    // Enqueue Legacy font classes
    $settings = CS()->settings();
    if ( isset( $settings['enable_legacy_font_classes'] ) && $settings['enable_legacy_font_classes'] ) {
      add_filter( 'cornerstone_legacy_font_classes', '__return_true' );
    }

    add_filter( 'pre_option_cs_product_validation_key', array( $this, 'validation_passthru' ) );

  }

  public function app_slug() {
    $slug = csi18n('app.integration-mode');
    return ( $slug ) ? $slug :'x';
  }

  public function admin_init() {
    if ( ! has_action( '_cornerstone_home_not_validated' ) ) {
      add_action( '_cornerstone_home_not_validated', '__return_empty_string' );
    }
  }

  public function validation_passthru( $key ) {
    return get_option( 'x_product_validation_key', false );
  }

  public function modify_fa_config( $fa ) {
    return array_merge( $fa, array(
      'fa_solid_enable'   => (bool) x_get_option( 'x_font_awesome_solid_enable' ),
      'fa_regular_enable' => (bool) x_get_option( 'x_font_awesome_regular_enable' ),
      'fa_light_enable'   => (bool) x_get_option( 'x_font_awesome_light_enable' ),
      'fa_brands_enable'  => (bool) x_get_option( 'x_font_awesome_brands_enable' ),
    ) );
  }

  public function aliasShortcodes() {

    //
    // Alias [social] to [icon] for backwards compatability.
    //

    cs_alias_shortcode( 'social', 'x_icon', false );

    //
    // Alias deprecated shortcode names.
    //

    // Mk2
    cs_alias_shortcode( array( 'alert', 'x_alert' ), 'cs_alert' );
    cs_alias_shortcode( array( 'x_text' ), 'cs_text' );
    cs_alias_shortcode( array( 'icon_list', 'x_icon_list' ), 'cs_icon_list' );
    cs_alias_shortcode( array( 'icon_list_item', 'x_icon_list_item' ), 'cs_icon_list_item' );

    // Mk1
    cs_alias_shortcode( 'accordion',            'x_accordion', false );
    cs_alias_shortcode( 'accordion_item',       'x_accordion_item', false );
    cs_alias_shortcode( 'author',               'x_author', false );
    cs_alias_shortcode( 'block_grid',           'x_block_grid', false );
    cs_alias_shortcode( 'block_grid_item',      'x_block_grid_item', false );
    cs_alias_shortcode( 'blockquote',           'x_blockquote', false );
    cs_alias_shortcode( 'button',               'x_button', false );
    cs_alias_shortcode( 'callout',              'x_callout', false );
    cs_alias_shortcode( 'clear',                'x_clear', false );
    cs_alias_shortcode( 'code',                 'x_code', false );
    cs_alias_shortcode( 'column',               'x_column', false );
    cs_alias_shortcode( 'columnize',            'x_columnize', false );
    cs_alias_shortcode( 'container',            'x_container', false );
    cs_alias_shortcode( 'content_band',         'x_content_band', false );
    cs_alias_shortcode( 'counter',              'x_counter', false );
    cs_alias_shortcode( 'custom_headline',      'x_custom_headline', false );
    cs_alias_shortcode( 'dropcap',              'x_dropcap', false );
    cs_alias_shortcode( 'extra',                'x_extra', false );
    cs_alias_shortcode( 'feature_headline',     'x_feature_headline', false );
    cs_alias_shortcode( 'gap',                  'x_gap', false );
    cs_alias_shortcode( 'google_map',           'x_google_map', false );
    cs_alias_shortcode( 'google_map_marker',    'x_google_map_marker', false );
    cs_alias_shortcode( 'highlight',            'x_highlight', false );
    cs_alias_shortcode( 'icon',                 'x_icon', false );
    cs_alias_shortcode( 'image',                'x_image', false );
    cs_alias_shortcode( 'lightbox',             'x_lightbox', false );
    cs_alias_shortcode( 'line',                 'x_line', false );
    cs_alias_shortcode( 'map',                  'x_map', false );
    cs_alias_shortcode( 'pricing_table',        'x_pricing_table', false );
    cs_alias_shortcode( 'pricing_table_column', 'x_pricing_table_column', false );
    cs_alias_shortcode( 'promo',                'x_promo', false );
    cs_alias_shortcode( 'prompt',               'x_prompt', false );
    cs_alias_shortcode( 'protect',              'x_protect', false );
    cs_alias_shortcode( 'pullquote',            'x_pullquote', false );
    cs_alias_shortcode( 'raw_output',           'x_raw_output', false );
    cs_alias_shortcode( 'recent_posts',         'x_recent_posts', false );
    cs_alias_shortcode( 'responsive_text',      'x_responsive_text', false );
    cs_alias_shortcode( 'search',               'x_search', false );
    cs_alias_shortcode( 'share',                'x_share', false );
    cs_alias_shortcode( 'skill_bar',            'x_skill_bar', false );
    cs_alias_shortcode( 'slider',               'x_slider', false );
    cs_alias_shortcode( 'slide',                'x_slide', false );
    cs_alias_shortcode( 'tab_nav',              'x_tab_nav', false );
    cs_alias_shortcode( 'tab_nav_item',         'x_tab_nav_item', false );
    cs_alias_shortcode( 'tabs',                 'x_tabs', false );
    cs_alias_shortcode( 'tab',                  'x_tab', false );
    cs_alias_shortcode( 'toc',                  'x_toc', false );
    cs_alias_shortcode( 'toc_item',             'x_toc_item', false );
    cs_alias_shortcode( 'visibility',           'x_visibility', false );

    Cornerstone_Shortcode_Preserver::preserve( 'code' );

  }


  public function recentPostTypes( $types ) {
    $types['portfolio'] = 'x-portfolio';
    return $types;
  }

  public function scrollTopSelector() {
    return '.x-navbar-fixed-top';
  }

  public function relocateDashboardMenuCustomItems() {
    return 'x-addons-home';
  }

  public function addDefaultSettings( $settings ) {
    $settings['enable_legacy_font_classes'] = get_option( 'x_pre_v4', false );
    return $settings;
  }

  public function load_preview() {

    if ( defined( 'X_VIDEO_LOCK_VERSION' ) ) {
      remove_action( 'wp_footer', 'x_video_lock_output' );
    }

  }

  public function app_preference_defaults( $defaults ) {

    $env = CS()->common()->get_env_data();

    if ( 'pro' === $env['product'] ) {
      $defaults['advanced_mode'] = true;
      $defaults['dynamic_content'] = true;
    }

    return $defaults;

  }

  public function styling_hook() {
    return 'x_head_css';
  }

  public function legacy_the_content( $the_content ) {

    if ( $the_content  ) {

      global $cs_shortcode_aliases;
      $legacy = false;

      foreach ($cs_shortcode_aliases as $shortcode) {

        if ( false == strpos($the_content, "[$shortcode" ) ) {
          $legacy = true;
          break;
        }

      }

      if ( $legacy ) {
        $the_content = cs_noemptyp($the_content);
      }

    }

    return $the_content;

  }

}
