<?php
class Cornerstone_Control_Title extends Cornerstone_Control {
	protected $default_context = 'content';

	public function sanitize( $data ) {
		return $data;
	}

}