<?php
/**
 * The front page template file.
 *
 * @package rotous18
 */

get_header();
?>

<div class="main-content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<section class="post">
			<h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<div class="rt-post-meta">
				<?php echo get_category_labels(); ?>
			</div>
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
			<div class="rt-date"><?php the_date('F d, Y'); ?></div>
		</section>
	<?php endwhile; else : ?>
		<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif; ?>
</div><!-- .main-content -->

<?php get_footer(); ?>