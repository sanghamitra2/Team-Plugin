<?php

/*
 * @Author 		ParaTheme
 * Copyright: 	2015 ParaTheme
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 	

class class_team_functions {

    public function team_member_social_field() {

        $social_field = array(
            "skype" => array('meta_key' => "skype", 'name' => "Skype", 'placeholder' => "skypeusername", 'icon' => '', 'visibility' => '1', 'can_remove' => 'no',),
            "facebook" => array('meta_key' => "facebook", 'name' => "Facebook", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
            "twitter" => array('meta_key' => "twitter", 'name' => "Twitter", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
            "googleplus" => array('meta_key' => "googleplus", 'name' => "Google plus", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
            "pinterest" => array('meta_key' => "pinterest", 'name' => "Pinterest", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
            "linkedin" => array('meta_key' => "linkedin", 'name' => "Linkedin", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
            "vimeo" => array('meta_key' => "vimeo", 'name' => "Vimeo", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
            "instagram" => array('meta_key' => "instagram", 'name' => "Instagram", 'placeholder' => "http://exapmle.com/username", 'icon' => '', 'visibility' => '1', 'can_remove' => 'yes',),
        );

        return apply_filters('team_member_social_field', $social_field);
    }

    public function team_member_meta_field() {


        $meta_field = array(
            "designation" => array('meta_key' => "designation", 'name' => "Designation", 'placeholder' => "Chief Executive", 'icon' => '', 'visibility' => '1', 'can_remove' => 'no',),
            "phone" => array('meta_key' => "phone", 'name' => "Phone", 'placeholder' => "+01895632456", 'icon' => '', 'visibility' => '1', 'can_remove' => 'no',),
            "website" => array('meta_key' => "website", 'name' => "Website", 'placeholder' => "http://exapmle.com", 'icon' => '', 'visibility' => '1', 'can_remove' => 'no',),
            "email" => array('meta_key' => "email", 'name' => "Email", 'placeholder' => "hello@exapmle.com", 'icon' => '', 'visibility' => '1', 'can_remove' => 'no',),
            "address" => array('meta_key' => "address", 'name' => "Address", 'placeholder' => "Address", 'icon' => '', 'visibility' => '1', 'can_remove' => 'no',),
        );

        return apply_filters('team_member_meta_field', $meta_field);
    }

}

new class_team_functions();

