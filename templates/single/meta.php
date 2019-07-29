<?php

/*
 * @Author 		ParaTheme
 * @Folder	 	Team/Templates
 * @version     3.0.5

 * Copyright: 	2015 ParaTheme
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 
if (get_post_meta(get_the_ID(), 'team_member_meta_data', true)) {
    $metainfo .= '<span class="desination" title="Desination">';
    $metaData = apply_filters('desination', get_post_meta(get_the_ID(), 'team_member_meta_data', true));
    if ($metaData['designation']) {
        $metainfo .= $metaData['designation'];
    }
    $metainfo .= '</span>';
    $metainfo .= '<div ><ul class="meta-info">';
    if ($metaData['website']) {
        $parsed = parse_url($urlStr);
        if (empty($parsed['scheme'])) {
            $metainfo .= '<li><i class="fa fa-globe"></i><a href="http://' . ltrim($metaData['website'], '/') . '">' . $metaData['website'] . '</a></li>';
        } else {
            $metainfo .= '<li><i class="fa fa-globe"></i><a href="' . $metaData['website'] . '">' . $metaData['website'] . '</a></li>';
        }
    }
    if ($metaData['phone']) {
        $metainfo .= '<li><i class="fa fa-mobile-phone"></i><a href="tel:' . $metaData['phone'] . '">' . $metaData['phone'] . '</a></li>';
    }
    if ($metaData['email']) {
        $metainfo .= '<li><i class="fa fa-envelope"></i><a href="mailto:' . $metaData['email'] . '">' . $metaData['email'] . '</a></li>';
    }
    $metainfo .= '</ul></div><div class="clear"></div>';
    echo $metainfo;
}

		 
	

