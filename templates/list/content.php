<?php

/*
 * @Author 		ParaTheme
 * @Folder	 	Team/Templates
 * @version     3.0.5

 * Copyright: 	2015 ParaTheme
 */
if (!defined('ABSPATH'))
    exit;  // if direct access 

$team_content = apply_filters('team_content', get_the_content());
echo '<div class="team-content">hfhfghfgh' . $team_content . '</div>';
