<?php get_header();?>


	<div class="middle">
		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
		<p style="text-align:center;">SINGLE</p>
		
		
		
		<?php if (have_posts()) :?>
			<?php while (have_posts()) : the_post();?>

			<article class="post">
		
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
	$height = $image['sizes'][ $size . '-height' ];

	if( $caption ): ?>
		<div class="wp-caption">
	<?php endif; ?>

	<a href="<?php echo $url; ?>" title="<?php echo $title; ?>">
		<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
	</a>
	<?php if( $caption ): ?>
			<p class="wp-caption-text"><?php echo $caption; ?></p>
		</div>
	<?php endif; ?>
<?php endif; ?>
			
			<p><?php the_field('name'); ?></p>
			<p><?php the_field('price'); ?></p>
			
	
			<h2><?php the_title();?></h2>
			<span>(<?php the_time('j.m.Y')?>)</span>	
			<p><?php the_post_thumbnail('medium', 'class=imgStyle ');?>
				<?php the_content()?> 
			</p>	
			
				<p><?php the_tags();?></p>
				
				<?php comments_template(); ?>

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