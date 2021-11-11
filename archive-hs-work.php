<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package HS_Portfolio
 */

get_header();
?>

	<main id="primary" class="site-main">

			<header class="page-header">
				<h1 class="archive-works-title"> A glance at my work... </h1>
				<?php
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
			<?php
					$args = array(
						'post_type' => 'hs-work',
						'posts_per_page' => -1,
							
					);
					$query = new WP_Query($args);
					if ( $query->have_posts() ): ?>
					
					<section class="all-works">
						<?php
						while( $query->have_posts() ):
						
							$query->the_post(); ?>
							<article class="work-item">
								<a href="<?php the_permalink(); ?>">
									 <div class="image-frame">  <!-- div to apply sliding box feature -->
										<?php the_post_thumbnail('work-tiles'); ?> 		
										<div class="image-caption">   <!-- div to apply sliding box feature -->
											<h2><?php the_title(); ?> </h2>
											<h4> <?php echo get_post(get_post_thumbnail_id())->post_content; ?> </h4>
										</div>
									</div>
								</a>      
							</article>
						<?php endwhile; ?>
						<?php	wp_reset_postdata(); ?>
					</section>
					<?php endif; ?>

	</main><!-- #main -->

<?php

get_footer();
