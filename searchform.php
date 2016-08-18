<?php
/**
 * Search Form
 */
?>
<form role="search" method="get" id="search-form" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-wrap">
		<input type="search" class="searchbox" placeholder="<?php echo __('Search', 'twentyfivenorth');?>" 
			value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
        <input type="submit" id="search-submit" class="submits" value="&#xe922;" />
    </div>
</form>
