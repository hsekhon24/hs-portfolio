<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package HS_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main site-main-single">

		<?php
		while ( have_posts() ) :
			the_post();

		?>
	
		<section class="banner-image">
			<?php the_post_thumbnail('full'); ?>
		</section>
		<h1><?php the_title(); ?> </h1>
		<div class="single-project-overview">
			<section class="project-overview">
				<?php
						if ( function_exists( 'get_field' ) ):
							if(get_field('project_overview')): ?>
									<h2>Overview</h2>
									<p>
										<?php the_field( 'project_overview' ); ?>
									</p>
							<?php endif; ?>
						<?php endif; ?>
					
				<?php	if ( function_exists( 'get_field' ) ):
							if(get_field('individual_team_work')): ?>
								<p class="team-work-text">
									<?php the_field( 'individual_team_work' ); ?>
								</p>
													
							<?php endif; ?>
					<?php endif; ?>
				</section>

				
				<section class="tools-used">
					<h2>Tools used</h2>
						<div class="tool-icons">
					<?php 
					if ( function_exists( 'get_field' ) ):
						$images = get_field('tools_used');

						if( $images ): ?>
							
								<?php foreach( $images as $image ): ?>
												
									<img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
										
								
								<?php endforeach; ?>
							
						<?php endif; ?>
					<?php endif; ?>
					</div>	
				</section>
	</div>
		<section class="design-process">
		
		<?php

			// ACF REPEATER - BASIC LOOP

			// check if the repeater field has rows of data
			if( have_rows('design_process') ): ?>
				<h2>Process</h2>
				<?php 
				// loop through the rows of data
					while ( have_rows('design_process') ) : the_row(); ?>
						<h3 class="process-step-title">
							<?php the_sub_field('process_step_title'); ?>
						</h3>
						<p class="process-step-description">
							<?php the_sub_field('process_step_description');  ?>
						</p>
						
				<?php	$images = get_sub_field('process_step_images');
				

				if( $images ): ?>
					<div class="process-step-images">
						<?php foreach( $images as $image ): ?>
					
							<img class="step-image-each" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
						
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
			
				<?php

				endwhile;

			else :

				// no rows found

			endif;

			?>
		</section>
		
		<?php
		if (function_exists ('get_field')):
			if(get_field('button_live_website')): ?>
				<div class="text-center">
					<a class="btn-live-website" href="<?php echo get_field('button_live_website') ; ?>">
					View Live Website </a>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		

		<?php

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php

get_footer();
