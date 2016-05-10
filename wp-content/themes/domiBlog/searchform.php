<div class="controller">
<form role="search" method="get" class="search-form" action="<?php echo home_url(); ?>">
<input type="textbox" name="s" class="form-control" id="search-box" value="<?php the_search_query(); ?>">
<input class="btn btn-primary no-border" type="submit" class="search-submit" value="Search" />
</form>
</div>
