<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HS_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

	<?php
			while ( have_posts() ) :
				the_post();

	?>
		<section class="about-me">
		<h1> Hello, <br> My name is Harman</h1>

			<?php
				if ( function_exists( 'get_field' ) ): 
					if(get_field('about_me_text')): ?>
						<p>
						<?php the_field( 'about_me_text' ); ?>
						</p>
					<?php endif; ?>
				<?php endif; ?>
			
		</section>
		<section class="my-toolkit">
		<h2>In my Toolkit</h2>
		<div>
			<?php 
		if ( function_exists( 'get_field' ) ):
				$images = get_field('my_toolkit');

				if( $images ): ?>
					
						<?php foreach( $images as $image ): ?>

							<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
				
						
						<?php endforeach; ?>
					
				<?php endif; ?>
		<?php endif; ?>
		<div>
		</section>

		<section class="featured-works">
		<h2> Featured Works </h2>

			<?php
				if ( function_exists( 'get_field' ) ):
				
					if(get_field('featured_works')):
					
							$posts = get_field('featured_works');

							foreach( $posts as $post): ?>
							
								<article>
									<a href="<?php echo get_permalink(); ?>">
									<div class="img-hover-zoom">
										<?php the_post_thumbnail('work-tiles'); ?>
									</div>
										<h3> <?php echo get_the_title(); ?> </h3>
									</a>
								</article>								
								
							<?php endforeach; ?>
					<?php endif; ?>	
			<?php endif; ?>
	
			
		</section>
		
	
		<div class=text-center>
			<a class="btn-view-all" href="<?php echo get_post_type_archive_link( 'hs-work' ); ?>"> View All Projects </a>
		</div>
	

		<?php
			endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
