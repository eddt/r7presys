<?php
/**
 * The Template for displaying all single PMA posts.
 *
 * @package R7core
 */

get_header(); ?>
    <div style="float:left;"><?php wp_nav_menu( array('menu' => 'PMA' )); ?></div>
    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', 'single' ); ?>

        <?php R7core_content_nav( 'nav-below' ); ?>

        <?php
            // If comments are open or we have at least one comment, load up the comment template
            if ( comments_open() || '0' != get_comments_number() )
                comments_template();
        ?>

    <?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>