<?php

/*
 * @Author 		ParaTheme
 * Copyright: 	2015 ParaTheme
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 
$team_member_social_field = get_post_meta(get_the_ID(), 'team_member_social_links', true);
$html_social .= '<div class="social-links">';
foreach ($team_member_social_field as $field_key => $field_info) {  

    if ($field_key == 'facebook' && $field_info != "") {
        $html_social .= '<div><a title="' . $name . '" target="_blank" href="' . $field_info . '"><i class="fa fa-facebook-square"></i></a></div>';
    } elseif ($field_key == 'twitter' && $field_info != "") {
        $html_social .= '<div><a title="' . $name . '" href="' . $field_info . '"><i class="fa fa-twitter-square"></i></a></div>';
    } elseif ($field_key == 'skype' && $field_info != "") {

        $html_social .= '<div><a  title="' . $name . '" href="skype:' . $field_info . '"><i class="fa fa-skype"></i></a></div>';
    } elseif ($field_key == 'googleplus' && $field_info != "") {

        $html_social .= '<div><a  title="' . $name . '" href="' . $field_info . '"><i class="fa fa-google-plus-square"></i></a></div>';
    } elseif ($field_key == 'pinterest' && $field_info != "") {

        $html_social .= '<div><a  title="' . $name . '" href="' . $field_info . '"><i class="fa fa-pinterest-square"></i></a></div>';
    } elseif ($field_key == 'linkedin' && $field_info != "") {

        $html_social .= '<div><a title="' . $name . '" href="' . $field_info . '"><i class="fa fa-linkedin-square"></i></a></div>';
    } elseif ($field_key == 'instagram' && $field_info != "") {

        $html_social .= '<div><a title="' . $name . '" href="' . $field_key . '"><i class="fa fa-instagram"></i></a></div>';
    }
}

$html_social .= '</div>';
echo $html_social;

