<?php

abstract class Cornerstone_Looper_Provider {

  protected $current_data = array();
  protected $config = array();
  protected $index = 0;
  protected $disposed = false;
  protected $manager = null;
  protected $current_consumer = false;
  
  public function __construct( $config = array() ) {
    $this->config = $config;
  }

  public function begin() {}

  public function pause() {}

  public function resume() {}

  public function end() {}

  public function dispose() {
    if ( ! $this->disposed ) {
      $this->end();
    }
  }

  protected function advance() {}

  public function rewind() {}

  final public function consume() {
    $result = $this->advance();
    $this->current_data = $result ? $result : array();
    $complete = empty($result);
    if ( $complete ) {
      $this->dispose();
      return false;
    }
    return true;
  }

  public function set_current_consumer( $current_consumer ) {
    $this->current_consumer = $current_consumer;
  }

  public function current_consumer() {
    return $this->current_consumer;
  }

  final public function get_current_data() {
    return $this->current_data;
  }

  abstract public function get_context();

  public function get_index() {
    return 0;
  }

  public function get_size() {
    return 0;
  }

  public function set_manager( $manager ) {
    $this->manager = $manager;
  }

  static public function looper_factory( $type ) {
    switch ( $type ) {
      case 'query-recent':
        return new Cornerstone_Looper_Provider_User_Query( [ 'is_recent' => true ] );
      case 'query-builder':
        return new Cornerstone_Looper_Provider_User_Query( [ 'is_builder' => true ] );
      case 'query-string':
        return new Cornerstone_Looper_Provider_User_Query( [ 'is_string' => true ] );
      case 'taxonomy':
        return new Cornerstone_Looper_Provider_Taxonomy();
      case 'page-children':
        return new Cornerstone_Looper_Provider_Page_Children();
      case 'terms':
        return new Cornerstone_Looper_Provider_Terms();
      case 'json':
        return new Cornerstone_Looper_Provider_Json();
      case 'custom':
        return new Cornerstone_Looper_Provider_Custom();
      case 'key-array':
        return new Cornerstone_Looper_Provider_Key_Array();
      default:
       return null;
    }
  }

  static public function create( $element, $manager ) {

    $provider = self::looper_factory( $element['looper_provider_type'] );

    /**
     * Can be used to supply an instance of an external class that extends Cornerstone_Looper_Provider
     add_filter('cs_resolve_looper_provider', function($value, $element) {
        return new My_Custom_Looper( $element );
      }, 10, 2 );
     */

    $provider = apply_filters('cs_resolve_looper_provider', $provider, $element );

    if ( is_a( $provider, 'Cornerstone_Looper_Provider' ) ) {
      $provider->set_manager( $manager );
      $provider->setup( $element );
      return $provider;
    }

    throw new Exception('Unable to determine source type');
  }

}
