<?php

/*
 * @Author 		ParaTheme
 * @Folder	 	Team/Templates
 * @version     3.0.5

 * Copyright: 	2015 ParaTheme
 */
if (!defined('ABSPATH'))
    exit;  // if direct access 

$title_text = apply_filters('team_title', get_the_title());
echo '<h3>' . $title_text . '</h3>';
