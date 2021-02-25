<?php if ( !defined( 'ABSPATH' ) ) 
    die();
/*
Plugin Name: Guideline To Do List
Description: Assessment for Applicants
Author: Jason C. Fleming 
Version: 1.0.0
*/
class GuidelineToDoListController {
	var $pluginpath;
	var $pluginurl;
	
	function __construct(){
		$this->pluginpath 	= dirname( __FILE__ );
		$this->pluginurl	= plugins_url( '', __FILE__ );
		add_action( 'wp', array( $this, 'init' ) );
		add_action( 'wp_ajax_nopriv_createlist', array( $this, 'create_list' ) );
		add_action( 'wp_ajax_nopriv_deletelist', array( $this, 'delete_list' ) );
		add_action( 'wp_ajax_nopriv_createitem', array( $this, 'create_item' ) );
		add_action( 'wp_ajax_nopriv_updateitem', array( $this, 'update_item' ) );
		add_action( 'wp_ajax_nopriv_deleteitem', array( $this, 'delete_item' ) );
		add_shortcode( 'gltodolist', array( $this, 'view' ) );
	}
	
	function init(){
		require_once( $this->pluginpath . '/GuidelineToDoList.php' );
		
	}
	
	function view(){
		global $post;
		if ( $post ):
            // fetch lists
            $meta = get_post_meta( $post->ID );
            $list = array();
            // check if a list id is passed
            if ( isset( $_REQUEST[ 'gltodo_list_id' ] ) ):
                $list_key = intval( $_REQUEST[ 'gltodo_list_id' ] );
                $meta_key = '_gltodo_' . $list_key;
                // fetch list and display
				if ( is_array( $meta[ $meta_key ] ) )
                	$list[ $list_key ] = unserialize( array_shift( $meta[ $meta_key ] ) );
                ob_start();
                include_once( $this->pluginpath . '/views/single_list.php' );
                return ob_end_clean();
            endif;
            // otherwise show all lists
            // fetch lists
            foreach( preg_grep( "/^_gltodo_(\d+)/", array_keys( $meta ) ) as $meta_key ):
                preg_match( "/^_gltodo_(\d+)/", $meta_key, $matches );
                $list_key = $matches[ 1 ];
				if ( is_array( $meta[ $meta_key ] ) )
                	$list[ $list_key ] = unserialize( array_shift( $meta[ $meta_key ] ) );
            endforeach;
            ob_start();
            include_once( $this->pluginpath . '/views/all_lists.php' );
            return ob_end_clean();
		endif;
		
	}

	function create_list(){
		
	}
	
	function delete_list(){
		
	}
	
	function create_item(){
		
	}
	
	function update_item(){
		
	}
	
	function delete_item(){
		
	}
}

new GuidelineToDoListController();