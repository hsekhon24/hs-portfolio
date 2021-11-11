<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package HS_Portfolio
 */

?>

	<footer id="colophon" class="site-footer">
	

<div class="contact-info" id="contact-info">
	<div class="footer-text">
		<?php
				if ( function_exists( 'get_field' ) ): 
					if(get_field('footer_title', 'option')): ?>
						
						<h2 class="footer-title">
							<?php the_field( 'footer_title', 'option' )?>
						</h2>
						<?php endif; ?>
				<?php endif; ?>

		<?php		if ( function_exists( 'get_field' ) ):
						if(get_field('footer_text', 'option')): ?>
						
							<p class="footer-text">
							<?php the_field( 'footer_text', 'option' ); ?>
							</p>
						<?php endif; ?>
					<?php endif; ?>

				
		<?php		if (function_exists ('get_field')):
						if(get_field('contact_email', 'option')): ?>
							<a class="btn-email-link" href="mailto:<?php get_field('contact_email', 'option'); ?>"> 
							Send me an Email</a>
					<?php endif; ?>
				<?php endif; ?>
				

		</div>
		<div class="footer-menus">
			 <nav id="social-navigation" class="social-navigation">
				<?php
				wp_nav_menu( array( 'theme_location' => 'social' ) );
				?>
			</nav> 
		</div><!-- .footer-menus -->
	</div>

		<div class="site-info">
			<p>	Designed and developed by Harman Sekhon </p>
	<button id="scroll-top" class="scroll-top ">
	<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
		<path d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z"/>
	</svg>
	<span class="screen-reader-text">Scroll To Top</span>
	</button>
		</div><!-- .site-info -->

	

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
