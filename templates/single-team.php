<?php
/**
 * The Template for displaying team details.
 *
 * Override this template by copying it to yourtheme/ls-team-member/single-team.php
 */
get_header();
?>
<div class="team-single-row">
    <div class="tm-wrapper">
        <?php
        while (have_posts()) : the_post();
            echo '<div class="content-inner">';
            echo '<div class="team-image">';
            echo get_team_template('single/thumbnail.php');
            echo get_team_template('single/social.php');
            echo '</div>';
            echo '<div class="team-information">';
            get_team_template('single/title.php'); 
            get_team_template('single/meta.php');
            get_team_template('single/content.php');
            echo '</div></div>';
        endwhile;
        ?>
    </div>
</div>

<?php
get_footer();
?>
 