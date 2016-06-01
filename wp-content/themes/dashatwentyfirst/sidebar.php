<aside class="left-sidebar">
	
	<?php if (!dynamic_sidebar('left-sidebar')):?>
		<div class="widget">
			<h3>Main Categories </h3>
			<?php if ( dynamic_sidebar('example_widget_area_name') ) : else : endif; ?>
			
			<ul>
			<?php wp_list_categories(array(
			'title_li'=>''));?>
			</ul>
			
		
			<h3>Picture categories: </h3>
			
			<?php $args = array( 'taxonomy' => 'pictures_categories');
			$categories = get_categories($args);
			if($categories){
				echo '<ul>';
				foreach($categories as $category) {
					echo '<li>';					
			?>
			
				<a href="<?php echo get_term_link( $category ); ?>">
				<?php echo $category->name; ?>
				</a>			
			<?php
					echo '</li>';
				} 
				echo '</ul>';
			}  	
			?>			
		</div>
		
	<?php endif;?>

</aside><!-- .left-sidebar -->

<aside class="right-sidebar">
	<div class="widget">
		<h3>quotations:</h3> 
		
		<?php
			wp_reset_postdata();  
	
	            $args = array(
	                   'post_type' => 'news',
	                   'publish' => true,
	               );
	            
	            query_posts($args);                        
	
	            		if (have_posts()) : ?>  
						<?php while (have_posts()) : the_post();?>
						
						<article class="post-pictures">			
								
						
					
						<a href="<?php the_permalink(); ?>">
							<p><?php the_title();?></p>
						</a> 
						<?php the_excerpt()?> 
										
						</article>		
								
					<?php endwhile; ?>
					
					<?php else : ?>
			
				<h2 class="center">Not Found</h2>
				<p class="center">Sorry, but you are looking for something that isn't here.</p>
				<?php get_search_form(); ?>
				
				<?php endif; 
	
			wp_reset_query(); ?>
	</div>
</aside><!-- .right-sidebar -->