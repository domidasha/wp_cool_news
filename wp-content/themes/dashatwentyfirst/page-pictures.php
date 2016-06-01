<?php 
/**
 * Template Name: Pictures Page
 */

get_header();?>

	<?php get_header(); ?>

        <div id="container">
            <div id="content">
		<h1>Pictures Page</h1>
<?php            
  	wp_reset_postdata();  

            $args = array(
                   'post_type' => 'pictures',
                   'publish' => true,
                   'paged' => get_query_var('paged'),
               );
            
            query_posts($args);           
                    

            		if (have_posts()) : ?>  
					<?php while (have_posts()) : the_post();?>
					
					<article class="post-pictures">			
							
					<p><?php the_field('author'); ?></p>
										
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
					
						<p><?php the_field( "name" );?>,<?php the_field( "year" );?></p> 		

					<?php $terms = get_field('category');
							echo "Categories:";
								if( $terms ): ?>		
									<?php foreach( $terms as $term ): ?>
										<a href="<?php echo get_term_link( $term ); ?>">
										<?php echo $term->name; ?>
										</a>							
									<?php endforeach; ?>				
								<?php endif; ?>								
					<p> <?php the_tags(); ?></p> 
									
					</article>		
							
				<?php endwhile; ?>
				
				<?php else : ?>
		
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
				
				<?php endif; 

				wp_reset_query(); 
	?>
            </div><!-- #content -->
        </div><!-- #container -->
       

<?php get_footer();?>