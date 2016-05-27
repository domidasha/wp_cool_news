
<footer class="footer">


<h2>Footer Information:</h2>

<ul>
	<li>Email: <?php bloginfo('admin_email')?></li>
	<li><a href="#" class="soc facebook">facebook</a></li>
	<li><a href="#" class="soc twitter">twitter</a></li>
	<li><a href="#" class="soc rss">rss</a></li>	
</ul>
<br>

	<p><?php wp_nav_menu( array( 
		'theme_location' => 'menu', 
		'container_class' => 'myMenu',
		'content' =>false 
		) ); ?>
		</p>
<div class="push"></div>
</footer>
</div><!--//#across-->
<?php wp_footer();?>
</body>
</html>