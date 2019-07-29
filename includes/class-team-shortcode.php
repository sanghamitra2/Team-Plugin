<?php
/*
 * @Author 		ParaTheme
 * Copyright: 	2015 ParaTheme
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 	

class class_team_shortcode {

    public function __construct() {

        add_shortcode('team', array($this, 'team_shortcode'));
    }

    public function team_shortcode($atts, $content) {
        global $team_query;
        // Shortcode Default Array
        $atts = is_array($atts) ? apply_filters('team_atts', array_map('sanitize_text_field', $atts)) : '';
        $popupclass = ($atts['popup'] == 'true' ? 'list_img' : 'list_img2');
        $limit = ($atts['limit'] != '' ? $atts['limit'] : '-1');
        $taxquery= ($atts['cat'] != '' ? array('taxonomy' => 'team_category','field' => 'id','terms' => $atts['cat']) : '');
        $shortcode_args = array(
            'posts' => $limit,
            'category' => '',
            'order' => 'DESC',
            'search' => 'true',
        );
 
        // Get paged variable.
        if (get_query_var('paged')) {
            $paged = (int) get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = (int) get_query_var('page');
        } else {
            $paged = 1;
        }

        // Combine User Defined Shortcode Attributes with Known Attributes
        $shortcode_args = shortcode_atts(apply_filters('team_defaults', $shortcode_args, $atts), $atts);
        // WP Query Default Arguments
        $args = apply_filters(
                'team_args', array(
            'post_status' => 'publish',
            'posts_per_page' => esc_attr($shortcode_args['posts']),
            'post_type' => 'team',
            'paged' => $paged,
            'orderby' => 'menu_order',
            'order' => esc_attr($shortcode_args['order']),
            'tax_query' => array(
                $taxquery
            )
       ), $atts
        );
        $team_query = new WP_Query($args);
        echo '<div class="team-archive-row">
    <div class="tm-wrapper">
        <ul class="team-list">';
        if ($team_query->have_posts()):
            while ($team_query->have_posts()): $team_query->the_post();  
                ?>
                <li>
                    
                        <div class="team-image-box <?= $popupclass; ?>">
                             <a href="<?= ($atts['popup'] == 'true' ? 'javascript:void(0)' : the_permalink()); ?>"><?php get_team_template('list/thumbnail.php'); ?></a>
                        </div>
                        <div class="team-meta-box <?= $popupclass; ?>">
                            <a href="<?= ($atts['popup'] == 'true' ? 'javascript:void(0)' : the_permalink()); ?>"><?php get_team_template('list/title.php'); ?></a>
                            <?php get_team_template('list/meta.php'); ?>
                            <?php get_team_template('list/social.php'); ?>
                            
                    </div>
                    <div class="popup" style="display: none;">
                        <div class="cont">
                            <span class="close">X</span>
                            <div class="team-image">
                                <?php 
                                get_team_template('single/thumbnail.php'); 
                                get_team_template('single/social.php');
                                ?>
                            </div>
                            <div class="team-information">
                                <div class="content">
                                <?php
                                    get_team_template('single/title.php'); 
                                    get_team_template('single/meta.php');
                                    get_team_template('single/content.php');
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                </li>
                <?php
            endwhile;
        endif;
        echo '</ul></div></div>';
    }

}

new class_team_shortcode();
