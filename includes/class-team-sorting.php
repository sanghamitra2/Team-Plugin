<?php

/*
 * @Folder	 	LS Team Member/Includes
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 	

class class_team_sort {

    public function __construct() {
        add_action('wp_ajax_update-menu-order', array($this, 'update_menu_order'));
        add_action('pre_get_posts', array($this, 'team_order_pre_get_posts'));
    }

    public function update_menu_order() {
        global $wpdb;

        parse_str($_POST['order'], $data);

        if (!is_array($data))
            return false;

        // get objects per now page
        $id_arr = array();
        foreach ($data as $key => $values) {
            foreach ($values as $position => $id) {
                $id_arr[] = $id;
            }
        }

        // get menu_order of objects per now page
        $menu_order_arr = array();
        foreach ($id_arr as $key => $id) {
            $results = $wpdb->get_results("SELECT menu_order FROM $wpdb->posts WHERE ID = " . intval($id));
            foreach ($results as $result) {
                $menu_order_arr[] = $result->menu_order;
            }
        }

        // maintains key association = no
        sort($menu_order_arr);
 
        foreach ($data as $key => $values) {
            foreach ($values as $position => $id) {
                echo $position;
                $wpdb->update($wpdb->posts, array('menu_order' => $position), array('ID' => intval($id)));
            }
        }
    }

    //
    //
    public function team_order_pre_get_posts($wp_query) {
        $objects = array('team');
        if (empty($objects))
            return false;
        if (is_admin()) {

            if (isset($wp_query->query['post_type']) && !isset($_GET['orderby'])) {
                if (in_array($wp_query->query['post_type'], $objects)) {
                    $wp_query->set('orderby', 'menu_order');
                    $wp_query->set('order', 'ASC');
                }
            }
        } else {

            $active = false;

            if (isset($wp_query->query['post_type'])) {
                if (!is_array($wp_query->query['post_type'])) {
                    if (in_array($wp_query->query['post_type'], $objects)) {
                        $active = true;
                    }
                }
            } else {
                if (in_array('post', $objects)) {
                    $active = true;
                }
            }

            if (!$active)
                return false;

            if (isset($wp_query->query['suppress_filters'])) {
                if ($wp_query->get('orderby') == 'date')
                    $wp_query->set('orderby', 'menu_order');
                if ($wp_query->get('order') == 'DESC')
                    $wp_query->set('order', 'ASC');
            } else {
                if (!$wp_query->get('orderby'))
                    $wp_query->set('orderby', 'menu_order');
                if (!$wp_query->get('order'))
                    $wp_query->set('order', 'ASC');
            }
        }
    }

}

new class_team_sort();
