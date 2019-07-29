<?php
if (!function_exists('get_team_template')) {

    /**
     * Get and include template files.
     */
    function get_team_template($template_name, $args = array(), $template_path = 'ls-team-member', $default_path = '') {

        if ($args && is_array($args)) {
            extract($args);
        }
        include( locate_team_template($template_name, $template_path, $default_path) );
    }

}

if (!function_exists('locate_team_template')) {

    /**
     * Locate a template and return the path for inclusion.
     */
    function locate_team_template($template_name, $template_path = 'ls-team-member', $default_path = '') {

        // Look within passed path within the theme - this is priority
        $template = locate_template(
                array(
                    trailingslashit($template_path) . $template_name,
                    $template_name
                )
        );

        // Get default template
        if (!$template && $default_path !== false) {
            $default_path = $default_path ? $default_path : untrailingslashit(ls_team_plugin_dir) . '/templates/';

            if (file_exists(trailingslashit($default_path) . $template_name)) {
                $template = trailingslashit($default_path) . $template_name;
            }
        }

        // Return what we found
        return apply_filters('team_locate_template', $template, $template_name, $template_path);
    }

}

 //
function get_team_archive_template($archive_template) {


    if (get_post_type_object('team')) {
        $archive_template = (!file_exists(get_stylesheet_directory() . '/ls-team-members/archive-teampost.php') ) ?
                untrailingslashit(ls_team_plugin_dir) . '/templates/archive-teampost.php' :
                get_stylesheet_directory() . '/ls-team-members/archive-teampost.php';
    }
    return $archive_template;
}
add_action('archive_template', 'get_team_archive_template');
//add_filter('single_template', array($this, 'get_team_single_template'), 10, 1);

function get_team_single_template($single_template) {

    global $post;

    if ('team' === $post->post_type) {
        $single_template = (!file_exists(get_stylesheet_directory() . '/ls-team-members/single-team.php') ) ?
                untrailingslashit(ls_team_plugin_dir) . '/templates/single-team.php' :
                get_stylesheet_directory() . '/ls-team-members/single-team.php';
    }
    return $single_template;
}
add_action('single_template',  'get_team_single_template');
?>