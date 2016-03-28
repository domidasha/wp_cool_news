<?php get_header();?>

	<div class="middle">
	<p style="text-align:center;">ARCHIVE Employee</p>
		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
		
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="post">
			<?php the_post_thumbnail( array (100,100), 'class=imgStyle');?>
			<br>
			<h2><a href='<?php the_permalink() ?>'><?php the_title();?></a></h2>
		
			<p>	<?php echo get_post_meta( $post->ID,'position', true); ?> </p>	
			
			</article>

		<?php endwhile; ?>
		<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>
	<?php endif; ?>
		 
			</section>
			</div><!-- .content -->
		</div><!-- .container-->

		<?php get_sidebar(); ?>

	</div><!-- .middle-->

</div><!-- .wrapper -->

<?php get_footer();?>