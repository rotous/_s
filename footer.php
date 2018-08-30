<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rotous18
 */

?>

		</div><!-- .rt-site-width -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="rt-site-width">
			<div class="rt-grid rt-grid-h3">
				<div class="rt-site-info rt-grid-cell">
					<h2>Ronald Toussaint</h2>
					<p>
						I am a web developer who is used to working with Javascript, HTML, CSS, NodeJS and PHP.
						I also like to dabble around in Go, Java and C/C++. I use this blog to post thing that
						I want to share or remember.
					</p>
				</div>
				<div class="rt-info rt-grid-cell">
					<h2>Online Presence</h2>
					<p>
						You can find me not only here but also on
						<a href="https://github.com/rotous/">Github</a>,
						<a href="https://www.npmjs.com/~rotous">NPMJS</a>,
						<a href="#">Twitter</a>,
						<a href="#">LinkedIn</a> and
						<a href="#">Facebook</a>,
					</p>
				</div><!-- .rt-info -->
				<div class="rt-wp-info rt-grid-cell">
					<h2>Wordpress</h2>
					<p>
						This site uses <a href="https://github.com/rotous/_s/tree/rotous18">the rotous18 Wordpress theme</a>
						that was created especially for	this site but is open source and can be used and abused by anyone
						who wants to. It is based on the infamous <a href="https://underscores.me/">_s theme</a>.
					</p>
				</div><!-- .rt-site-info -->
			</div><!-- .rt-grid -->
			<div class="rt-footer-bottom">
				<div class="rt-flexbox">
					<h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
					<nav class="rt-footer-navigation">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'menu-2',
								'menu_id'        => 'footer-menu',
							) );
						?>
					</nav>
				</div><!-- .rt-flexbox -->
			</div><!-- .rt-footer-bottom -->
		</div><!-- .rt-site-width -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
