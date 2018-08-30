<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
 */

get_header();

while ( have_posts() ) : the_post(); ?>

	<section class="post">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<div class="rt-post-meta">
			<?php echo get_category_labels(); ?>
		</div>
		<div class="rt-post-content">
			<?php the_content(); ?>
		</div>
		<div class="rt-date"><?php the_date('F d, Y'); ?></div>
	</section>


	<?php
		//get_template_part( 'template-parts/content', get_post_type() );

		//the_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>
<?php endwhile; // End of the loop. ?>

<!--//get_sidebar(); -->
<?php get_footer(); ?>
