<?php get_header();?>

	<div class="middle">
	<p style="text-align:center;">ARCHIVE NEWS</p>
		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
		
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="post">

			<h2><a href='<?php the_permalink() ?>'><?php the_title();?></a></h2>
			<span>(<?php the_time('j.m.Y')?>)</span>	
			<?php the_post_thumbnail( array (100,100), 'class=imgStyle');?>, 
			<p>	<?php the_excerpt()?> </p>	
			
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