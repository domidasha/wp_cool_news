<?php

get_header(); 

global $query_string;
	$posts = query_posts($query_string.'&post_type=pictures');
		if ( have_posts() ) 
			while ( have_posts() ) : the_post(); ?>
			<article class="post-pictures">
				
			<p><?php the_field( "name" );?>,<?php the_field( "year" );?></p>
			
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
									
									?>
							
									<a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb; ?>" /></a>					
									<?php endif; ?>
									
							</article>
<?php endwhile; // end of the loop. ?>
<?php get_footer(); ?>