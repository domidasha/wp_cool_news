<aside class="left-sidebar">
	

	<?php if (!dynamic_sidebar('left-sidebar')):?>
		<div class="widget">
			<h2>World News </h2>
			<?php if ( dynamic_sidebar('example_widget_area_name') ) : else : endif; ?>
			<ul>
			<?php wp_list_categories(array(
			'title_li'=>''));?>
			</ul>
		</div>
	<?php endif;?>


	<!-- <em>Left Side Bar:</em> 
	
	<ul>
		<li><a href="">Vintage in the Sunny Cold</a></li>
		<li><a href="">CONVERSATION WITH SYLVIE MUS</a></li>
		<li><a href="">Thank you for all the lovely and generous Lookbook </a></li>
		<li><a href="">Emerald, Jade, Lime and Mint, oh my!</a></li>
		<li><a href="">The small man is slow to launch out into expense when things are going well. </a></li>
	</ul> -->
</aside><!-- .left-sidebar -->

<aside class="right-sidebar">
	<em>Right Side Bar:</em> 
	<ul>
		<li><a href="">What matters in life is not what happens to you but what you remember and how you remember it</a></li>
		<li><a href="">It is not true that people stop pursuing dreams because they grow old, they grow old because they stop pursuing dreams.</a></li>
		<li><a href="">THANK YOU for all the lovely and generous Lookbook </a></li>
		<li><a href="">Emerald, Jade, Lime and Mint, oh my!</a></li>
		<li><a href="">The small man is slow to launch out into expense when things are going well. </a></li>
	</ul>
</aside><!-- .right-sidebar -->