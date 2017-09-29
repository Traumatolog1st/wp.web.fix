<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
	<fieldset>
 		<input class="searchinput" type="text" id="s" value="<?php echo get_search_query() ?>" name="s" placeholder="Search">
 		<button id="searchsubmit" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
 	</fieldset>
</form>