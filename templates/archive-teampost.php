<?php
/**
 * The Template for displaying team archives, including the main team page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/ls-team-members/archive-teampost.php
 */
get_header();
?>
<div class="team-archive-row">
    <div class="tm-wrapper">
        <ul class="team-list">
            <?php
            $args = array(
                'posts_per_page' => '-1',
                'post_type' => 'team',
                'paged' => $paged,
            );
            $team_query = new WP_Query($args);
            if ($team_query->have_posts()) {
                while ($team_query->have_posts()) {
                    $team_query->the_post();
                    ?>
                    <li>
                        <div class="team-image-box list_img">
                            <?php get_team_template('list/thumbnail.php'); ?>
                        </div>
                        <div class="team-meta-box">
                            <?php get_team_template('list/title.php'); ?>
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
                }
                wp_reset_postdata();
            }
            ?>
        </ul>
    </div>
</div>
 
<?php
get_footer();
?>