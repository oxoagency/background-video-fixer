<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Fallback_Image_Fixer' ) ) :

	/**
	 * Main Fallback_Image_Fixer Class.
	 *
	 * @package		FIF
	 * @subpackage	Classes/Fallback_Image_Fixer
	 * @since		1.0.0
	 * @author		Akshay Ramdass
	 */
	final class Fallback_Image_Fixer {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Fallback_Image_Fixer
		 */
		private static $instance;

		/**
		 * FIF helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Fallback_Image_Fixer_Helpers
		 */
		public $helpers;

		/**
		 * FIF settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Fallback_Image_Fixer_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'fallback-image-fixer' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'fallback-image-fixer' ), '1.0.0' );
		}

		/**
		 * Main Fallback_Image_Fixer Instance.
		 *
		 * Insures that only one instance of Fallback_Image_Fixer exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Fallback_Image_Fixer	The one true Fallback_Image_Fixer
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Fallback_Image_Fixer ) ) {
				self::$instance					= new Fallback_Image_Fixer;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Fallback_Image_Fixer_Helpers();
				self::$instance->settings		= new Fallback_Image_Fixer_Settings();

				//Fire the plugin logic
				new Fallback_Image_Fixer_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'FIF/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once FIF_PLUGIN_DIR . 'core/includes/classes/class-fallback-image-fixer-helpers.php';
			require_once FIF_PLUGIN_DIR . 'core/includes/classes/class-fallback-image-fixer-settings.php';

			require_once FIF_PLUGIN_DIR . 'core/includes/classes/class-fallback-image-fixer-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'fallback-image-fixer', FALSE, dirname( plugin_basename( FIF_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.