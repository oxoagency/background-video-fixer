<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Fallback_Image_Fixer_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		FIF
 * @subpackage	Classes/Fallback_Image_Fixer_Run
 * @author		Akshay Ramdass
 * @since		1.0.0
 */
class Fallback_Image_Fixer_Run{

	/**
	 * Our Fallback_Image_Fixer_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_frontend_scripts_and_styles' ), 20 );
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */


	/**
	 * Enqueue the frontend related scripts and styles for this plugin.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_frontend_scripts_and_styles() {
		wp_enqueue_script( 'fif-power-detection', FIF_PLUGIN_URL . 'core/includes/assets/js/power-detection.js', array(), FIF_VERSION, true );
		wp_localize_script( 'fif-power-detection', 'fif', array(
			'demo_var'   		=> __( 'This is some demo text coming from the backend through a variable within javascript.', 'fallback-image-fixer' ),
		));
		wp_enqueue_script( 'fif-hide-video', FIF_PLUGIN_URL . 'core/includes/assets/js/hide-video.js', array(), FIF_VERSION, true );
		wp_localize_script( 'fif-hide-video', 'fif', array(
			'demo_var'   		=> __( 'This is some demo text coming from the backend through a variable within javascript.', 'fallback-image-fixer' ),
		));			
	}

}
