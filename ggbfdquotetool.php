<?php
/**
 * Plugin Name: Great Goodbyes Funeral Quoting Tool
 * Description: Use shortcode [ggbfd_form /] to use the quoting form anywhere.
 * Version: 1.0.0
 * Author: <a href="https://www.splashdigital.co.nz/">Splash Digital</a>
 * Text Domain: ggbfdquotetool
 */

if ( ! defined( 'ABSPATH' ) ) exit; // classic

if ( !class_exists( 'GGF_Quoting_Tool' ) && !function_exists( 'GGF_Quoting_Tool' ) ) :

/** 
 * Main plugin class
 *
 * @version     1.0.0
 * @since       1.0.0
 */
class GGF_Quoting_Tool {

    public $version = '1.0.0';
    public $plugin_name = 'Great Goodbyes Funeral Quoting Tool';
    public $base_name = 'ggbfdquotetool';

    public $plugin_dir;
    public $plugin_url;

    public $_js_urls;
    public $_css_urls;

    protected static $_instance = null;

    /**
	 * Constructor
	 */
	public function __construct() {
        $this->plugin_dir = plugin_dir_path(__FILE__);
        $this->plugin_url = plugin_dir_url(__FILE__);

        define( 'GGF_Quoting_Tool_VERSION', $this->version );

        $this->_js_urls = array(
            'app_js'        => $this->plugin_url . 'js/app.js?mtime=' . filemtime($this->plugin_dir . 'js/app.js'),
            'modal_js'      => $this->plugin_url . 'js/modal.js?mtime=' . filemtime($this->plugin_dir . 'js/modal.js'),
            'toggle_js'     => $this->plugin_url . 'js/toggle.js?mtime=' . filemtime($this->plugin_dir . 'js/toggle.js'),
        );

        $this->_css_urls = array(
            'select_css'    => $this->plugin_url . 'styles/select.css?mtime=' . filemtime($this->plugin_dir . 'styles/select.css'),
            'style_css'     => $this->plugin_url . 'styles/style.css?mtime=' . filemtime($this->plugin_dir . 'styles/style.css'),
            'toggle_css'    => $this->plugin_url . 'styles/toggle.css?mtime=' . filemtime($this->plugin_dir . 'styles/toggle.css'),
        );

        // load the plugin
        add_action( 'plugins_loaded', array( $this, 'load_plugin' ), 9 );
    }

	/**
	 * Main Plugin Instance
	 *
	 * Ensures only one instance of plugin is loaded or can be loaded.
     * 
     * @return GGF_Quoting_Tool
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    
    /**
	 * Instantiate class
 	 */
	public function load_plugin() {
        foreach ( $this->_js_urls as $key => $_url_js ) {
            wp_register_script( $this->base_name . '-script-'. $key, $_url_js );
        }
        foreach ( $this->_css_urls as $key => $_url_css ) {
            wp_register_style( $this->base_name . '-style-'. $key, $_url_css );
        }

        add_action( 'init', array( $this, 'init_shortcode' ) );
    }

    /**
     * Register the shortcode
     */
    public function init_shortcode () {
        add_shortcode( 'ggbfd_form', array( $this, 'form_shortcode' ) );
    }

    /**
     * The Form shortcode 
     */
    public function form_shortcode () {

        ob_start();
        include( $this->plugin_dir . 'ggbfdquoteform.php' );
        $form = ob_get_clean();

        foreach ( $this->_js_urls as $key => $_url_js ) {
            wp_enqueue_script( $this->base_name . '-script-'. $key );
        }
        foreach ( $this->_css_urls as $key => $_url_css ) {
            wp_enqueue_style( $this->base_name . '-style-'. $key );
        }
    
        return $form;
    }

}

/**
 * Returns the main instance of the plugin
 *
 * @since   1.0.0
 * @return  GGF_Quoting_Tool
 */
function GGF_Quoting_Tool() {
	return GGF_Quoting_Tool::instance();
}

GGF_Quoting_Tool(); // load the plugin

endif;
