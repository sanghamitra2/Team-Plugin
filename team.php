<?php

/*
  Plugin Name: LS Team Members
  Plugin URI:
  Description: Powerful & Robust plugin to create a team member on your website in simple & elegant way..
  Version: 1.0
  Author: Jenny
  Author URI:
  License: GPL2
 */

class WP_Ls_Team {

    // Constructor
    function __construct() {
        define('ls_team_plugin_url', plugins_url('/', __FILE__));
        define('ls_team_plugin_dir', plugin_dir_path(__FILE__));
        //define('team_wp_url', 'http://wordpress.org/plugins/team/' );
        define('team_plugin_name', 'LS Team Member');
        define('team_plugin_version', '1.0');
        define('team_customer_type', 'free');

        register_activation_hook(__FILE__, array($this, 'team_install'));
        register_deactivation_hook(__FILE__, array($this, 'team_uninstall'));

        add_action('admin_enqueue_scripts', array($this, 'team_admin_scripts'));
        add_action( 'wp_enqueue_scripts', array( $this, 'team_front_scripts' ) );
        // Add Filter to redirect Archive Page Template


        include( 'includes/class-team-types.php' );
        include( 'includes/class-team-meta.php' );
        include( 'includes/class-functions.php' );
        include( 'includes/class-team-sorting.php' );
        include( 'includes/class-team-template-function.php' );
        include( 'includes/class-team-shortcode.php' );
    }

    /*
     * Actions perform at loading of admin menu
     */

    public function team_admin_scripts() {
        wp_enqueue_script('jquery');
        if (get_post_type() == "team") {
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script('team-sort', plugins_url('/assets/js/team_sort.js', __FILE__), array('jquery'), null, true);
        }
        wp_enqueue_style('font-awesome.min', plugins_url('assets/css/font-awesome.min.css', __FILE__));
        wp_enqueue_style('admin', plugins_url('/assets/css/admin.css', __FILE__));
    }

    public function team_front_scripts() {
        wp_enqueue_script('jquery');
        wp_enqueue_style('font-awesome.min', plugins_url('assets/css/font-awesome.min.css', __FILE__));
        wp_enqueue_style('frontend-style', plugins_url('assets/css/frontend-style.css', __FILE__));
         wp_enqueue_script('team-front-js', plugins_url('/assets/js/team_front.js', __FILE__), array('jquery'), null, true);
        do_action('team_action_front_scripts');
    }

    function team_install() {
        // Reset permalink

        flush_rewrite_rules();

        do_action('team_action_install');
    }

    /*
     * Actions perform on de-activation of plugin
     */

    public function team_uninstall() {

        do_action('team_action_uninstall');
    }

    public function team_deactivation() {

        do_action('team_action_deactivation');
    }

}

new WP_Ls_Team();
?>