<?php
/*
 * @Author 		ParaTheme
 * Copyright: 	2015 ParaTheme
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 	

class team_class_meta {

    public function __construct() {

        add_action('add_meta_boxes', array($this, 'meta_boxes_team_meta_fileds'));
        add_action('save_post', array($this, 'meta_boxes_team_save_meta_fileds'));
    }

    public function meta_boxes_team_meta_fileds($post_type) {
        $post_types = array('team');

        //limit meta box to certain post types
        if (in_array($post_type, $post_types)) {
            add_meta_box('team_metabox_meta_fileds', 'Team Options', array($this, 'team_meta_box_function_meta_fileds'), $post_type, 'normal', 'high');
        }
    }

    public function team_meta_box_function_meta_fileds($post) {
        // Add an nonce field so we can check for it later.
        wp_nonce_field('team_member_nonce_check', 'team_member_nonce_check_value');
        // Use get_post_meta to retrieve an existing value from the database.
        $team_member_meta_data = get_post_meta($post->ID, 'team_member_meta_data', true);
        $team_member_meta_field = get_option('team_member_meta_field');
        if (empty($team_member_meta_field)) {
            $class_team_functions = new class_team_functions();
            $team_member_meta_field = $class_team_functions->team_member_meta_field();
        }

        $team_member_social_links = get_post_meta($post->ID, 'team_member_social_links', true);
        $team_member_social_field = get_option('team_member_social_field');
        //var_dump($team_member_social_field);

        if (empty($team_member_social_field)) {
            $class_team_functions = new class_team_functions();
            $team_member_social_field = $class_team_functions->team_member_social_field();
        }
        ?>

        <div class="meata_options">
            <ul>
                <?php
                foreach ($team_member_meta_field as $field_key => $field_info) {
                    ?>
                    <?php if ($field_key == 'designation') { ?>
                        <li> 
                            <label for="team_member_designation"><?php _e(' Desination', 'team'); ?></label>
                            <input type="text" name="team_member_meta_data[designation]" id="team_member_designation" placeholder="Designation" value="<?php if (!empty($team_member_meta_data[$field_key])) echo $team_member_meta_data[$field_key]; ?>" />
                        <?php } if ($field_key == 'email') { ?>
                        </li>
                        <li> 
                            <label for="team_member_email"><?php _e(' Email', 'team'); ?></label>
                            <input type="email" name="team_member_meta_data[email]" id="team_member_email" placeholder="hello@exapmle.com" value="<?php if (!empty($team_member_meta_data[$field_key])) echo $team_member_meta_data[$field_key]; ?>" />
                        </li>
                    <?php } if ($field_key == 'phone') { ?>
                        <li> 
                            <label for="team_member_phone"><?php _e(' Phone', 'team'); ?></label>
                            <input type="text" name="team_member_meta_data[phone]" id="team_member_phone" placeholder="+01895632456" value="<?php if (!empty($team_member_meta_data[$field_key])) echo $team_member_meta_data[$field_key]; ?>" />
                        </li>
                    <?php } if ($field_key == 'website') { ?>
                        <li>
                            <label for="team_member_website"><?php _e(' Website', 'team'); ?></label>
                            <input type="text" name="team_member_meta_data[website]" id="team_member_website" placeholder="http://exapmle.com" value="<?php if (!empty($team_member_meta_data[$field_key])) echo $team_member_meta_data[$field_key]; ?>" />
                        </li>
                    <?php } if ($field_key == 'address') { ?>
                        <li class="full">
                            <label for="team_member_address"><?php _e(' Address', 'team'); ?></label>
                            <textarea name="team_member_meta_data[address]" id="team_member[address]" placeholder="Address"><?php if (!empty($team_member_meta_data[$field_key])) echo $team_member_meta_data[$field_key]; ?></textarea>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>
            <div class="clear"></div>
            <h2>Social Links</h2>
            <ul>
                <?php
                foreach ($team_member_social_field as $field_key => $field_info) {
                    ?>
                    <li>
                        <label for="team_member_social_links[<?php echo $field_key; ?>]"><?php echo ucfirst($field_info['name']); ?></label>
                        <input type="text" name="team_member_social_links[<?php echo $field_key; ?>]" id="team_member_social_links[<?php echo $field_key; ?>]" value="<?php if (!empty($team_member_social_links[$field_key])) echo $team_member_social_links[$field_key]; ?>" placeholder="<?php echo $field_info['placeholder']; ?>" />
                    </li>

                <?php } ?>
            </ul>
        </div><div class="clear"></div>
        <?php
    }

    public function meta_boxes_team_save_meta_fileds($post_id) {

        // Check if our nonce is set.
        if (!isset($_POST['team_member_nonce_check_value']))
            return $post_id;

        echo $nonce = $_POST['team_member_nonce_check_value'];

        // Verify that the nonce is valid.
        if (!wp_verify_nonce($nonce, 'team_member_nonce_check'))
            return $post_id;

        // If this is an autosave, our form has not been submitted,
        //     so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
            return $post_id;

        // Check the user's permissions.
        if ('page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id))
                return $post_id;
        } else {

            if (!current_user_can('edit_post', $post_id))
                return $post_id;
        }
        $team_member_meta_data = stripslashes_deep($_POST['team_member_meta_data']);

        update_post_meta($post_id, 'team_member_meta_data', $team_member_meta_data);
        // Sanitize the user input.
        $team_member_social_links = stripslashes_deep($_POST['team_member_social_links']);

        update_post_meta($post_id, 'team_member_social_links', $team_member_social_links);
    }

}

new team_class_meta();
