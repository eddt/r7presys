<?php
/**
 * @package R7core
 */
?>
<div class="post-header">
	<h1 class="page-title"><?php the_title(); ?></h1>
</div><!-- .entry-header -->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'R7core' ),
				'after'  => '</div>',
			) );
		?>
		<h6 style="font-family: 'Montserrat', sans-serif;"><em>TDE Franchise, LLC does not make or endorse, nor does it allow any representative or other individual to make or endorse, any oral, written, visual, or other claim or representation that states or suggests any level or range of actual or potential sales, costs, income, expenses, profits, cash flow, or otherwise with respect to a The Donut Experiment franchise other than those contained in Item 19 of the Franchise Disclosure Document.</em></h6>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'R7core' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
