<?php if ( !defined( 'ABSPATH' ) ) 
    die();

class GuidelineToDoList {
	var $title;
	var $items;
	function __construct(){
		$this->title = '';
		$this->items = array();
	}
	
	function set_title( $title ){
		$this->title = $title;
	}
	
	function get_title(){
		return $this->title;
	}
	
	function get_items(){
		return (array) $this->items;
	}
	
	function add_item( $descr ){
		
	}
	
	function set_descr( $id, $descr ){
		$this->items[ $id ] = $descr;
	}
	
	function get_item( $id ){
		if ( isset ( $this->items[ $id ] ) )
			return $this->items[ $id ];
	}
}