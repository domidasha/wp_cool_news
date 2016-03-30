<?php /*
Template Name: Calculation
*/


get_header();?>

	<div class="middle">

		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
			<p style="text-align:center;">Calculation page</p>
		<h2 class="page-title">Page: <?php the_title();?></h2>
		
			
		
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="post">

			<h2><?php the_title();?></h2>
			<span>(<?php the_time('j.m.Y')?>)</span>	
			<p>	<?php the_content()?> </p>	
			
			</article>

		<?php endwhile; ?>
		<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
	
	<?php get_sidebar('calculation'); ?>
	
			</section>
			</div><!-- .content -->
		</div><!-- .container-->

		<?php get_sidebar(); ?>
	
	</div><!-- .middle-->

</div><!-- .wrapper -->

<?php get_footer();?>