<?php
/*
Template Name: Archives
*/
get_header(); ?>

<div id="container">
	<div id="content" role="main">

		<?php
		$id=16; // ID заданной рубрики
		$n=3;   // количество выводимых записей
		$recent = new WP_Query("cat=$id&showposts=$n"); 
		while($recent->have_posts()) : $recent->the_post();
		?>
		<a href="<?php the_permalink() ?>" rel="bookmark">
		<?php the_title(); ?>
		</a><br><?php the_excerpt(); ?> 
		<?php endwhile; ?>

	</div><!-- #content -->
</div><!-- #container -->


<?php get_footer(); ?>