<?php get_header();?>


	<div class="middle">
		All
		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
			
			

		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="post">

			<h2><?php the_title();?></h2>
			<span>(<?php the_time('j.m.Y')?>)</span>	
			<p><?php the_post_thumbnail('full', 'class=imgStyle ');?>
				<?php the_content()?> 
			</p>	
			
				<p><?php the_tags();?></p>


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