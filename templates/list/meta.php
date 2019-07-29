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
    echo '<div class="desination" title="Desination">';
    $metaData = apply_filters('desination', get_post_meta(get_the_ID(), 'team_member_meta_data', true));
    echo $metaData['designation'];
    echo '</div>';
}

		 
	

