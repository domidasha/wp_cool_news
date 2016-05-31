<?php get_header();?>


<style type="text/css">
.special-color {
    background-color: <?php the_field('color'); ?>;
}
</style>

	<div class="middle">
		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
		<p style="text-align:center;">SINGLE Pictures</p>
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="single-picture">	
				<div class="picture">		
					<?php $image = get_field('image');
						if( !empty($image) ): 
					
						// vars
						$url = $image['url'];
						$title = $image['title'];
						$alt = $image['alt'];
						$caption = $image['caption'];
					
						// thumbnail
						$size = 'thumbnail';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ];?>
					
						
					
						<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
							<img src="<?php echo $thumb; ?>" />
						</a>
						<?php if( $caption ): ?>
								<p class="wp-caption-text"><?php echo $caption; ?></p>
							</div>
						<?php endif; ?>
					<?php endif; ?>				
				</div>
				
				<div class="picture-info">
								
					<p>type:<?php the_field('type') ?></p>
					<p>art movement:<?php the_field('art_movements') ?></p>	
					<p>theme:<?php the_field('theme') ?></p>	
					
				</div>
				
				
				<div class= "info">
					<p><?php the_field( 'author' );?> "<?php the_field('name'); ?>"</p>
					<p><?php the_field( "year" );?></p>	
					<p><?php the_field('price'); ?>$</p>			
					
				</div>							
			
				
				<div class="description">
					<?php the_field('description'); ?>
				</div>		
			
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