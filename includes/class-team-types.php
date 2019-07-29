<?php

/*
 * @Folder	 	LS Team Member/Includes
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 	

class team_class_post_types {

    public function __construct() {
        add_action('init', array($this, 'team_init'), 0);
    }

    function team_init() {
        // set up product labels
        $labels = array(
            'name' => 'Teams',
            'singular_name' => 'Team',
            'add_new' => 'Add New Team',
            'add_new_item' => 'Add New Team',
            'edit_item' => 'Edit Team',
            'new_item' => 'New Team',
            'all_items' => 'All Teams',
            'view_item' => 'View Team',
            'search_items' => 'Search Teams',
            'not_found' => 'No Teams Found',
            'not_found_in_trash' => 'No Teams found in Trash',
            'parent_item_colon' => '',
            'menu_name' => 'Teams',
        );

        // register post type
        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'show_ui' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'rewrite' => array('slug' => 'team'),
            'query_var' => true,
            'menu_icon' => 'dashicons-randomize',
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'trackbacks',
                'custom-fields',
                'comments',
                'revisions',
                'thumbnail',
                'author',
                'page-attributes'
            )
        );
        register_post_type('team', $args);

        // register taxonomy
        register_taxonomy('team_category', 'team', array('hierarchical' => true, 'label' => 'Category', 'query_var' => true, 'rewrite' => array('slug' => 'team-category')));
    }

}

new team_class_post_types();
