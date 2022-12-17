<?php
/**
 * Fallback Image Fixer
 *
 * @package       FIF
 * @author        Akshay Ramdass
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   Fallback Image Fixer
 * Plugin URI:    https://www.facebook.com/sigilandclover/
 * Description:   Hides the video container if low power mode is detected. Simply add .background-video-fix classname to your div.
 * Version:       1.0.0
 * Author:        Akshay Ramdass
 * Author URI:    https://www.facebook.com/sigilandclover/
 * Text Domain:   fallback-image-fixer
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'FIF_NAME',			'Fallback Image Fixer' );

// Plugin version
define( 'FIF_VERSION',		'1.0.0' );

// Plugin Root File
define( 'FIF_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'FIF_PLUGIN_BASE',	plugin_basename( FIF_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'FIF_PLUGIN_DIR',	plugin_dir_path( FIF_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'FIF_PLUGIN_URL',	plugin_dir_url( FIF_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once FIF_PLUGIN_DIR . 'core/class-fallback-image-fixer.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  Akshay Ramdass
 * @since   1.0.0
 * @return  object|Fallback_Image_Fixer
 */
function FIF() {
	return Fallback_Image_Fixer::instance();
}

FIF();
