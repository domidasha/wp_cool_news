<?php get_header();?>

	<div class="middle">

		<div class="container">
			<div class="content">
			<section>
			<!-- Begin content -->
			<p style="text-align:center;">INDEX </p>  
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
					<?php $author = get_the_author();
					echo "The author: ". $author; ?>
				
					<p class="right"><a href="<?php the_permalink(); ?>">
					<?php comments_number("no comments", "1 comment", '% comments'); ?></a></p>
				
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
		
<!-- 		???????? -->
<?php the_widget(
  Create_Employee_Widget,
  $instance = array(
        'title'                 => __('WPFirstAid Sample'),
        'choices'               => 'The Doctor',
        'show_choices'          => true,
        'optionals'             => 'right'
  ),
  $args = array (
  'before_widget'   => '',
  'before_title'    => '',
  'after_title'     => '',
  'after_widget'    => ''
  )
);?>

	</div><!-- .middle-->

</div><!-- .wrapper -->

<?php get_footer();?>