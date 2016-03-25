<?php get_header();?>

	<div class="middle">

		<div class="container">
			<div class="content">
			<section>
			<h2><?php
			single_cat_title('Category: ');
			?></h2>
			<!-- Begin content -->

		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="post">

			<a href="<?php the_permalink(); ?>">
				<h2><?php the_title();?></h2>
			</a> 
			<span>(<?php the_time('j.m.Y')?>)</span>	
			<p><?php the_post_thumbnail('medium', 'class=imgStyle ');?>
				<?php the_excerpt()?> 
			<a href="<?php the_permalink()?>">read all</a></p>	
			
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