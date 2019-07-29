<?php

/*
 * @Author 		ParaTheme
 * @Folder	 	Team/Templates
 * @version     3.0.5

 * Copyright: 	2015 ParaTheme
 */

if (!defined('ABSPATH'))
    exit;  // if direct access 

$team_thumb_url = get_the_post_thumbnail( get_the_ID(), 'full' );
if (has_post_thumbnail()) {
      $html_thumb = $team_thumb_url;
}
else {
       $html_thumb = '<img src="' . ls_team_plugin_url . '/assets/images/default.png" class="team_img"/>';
}
echo  $html_thumb;
				 