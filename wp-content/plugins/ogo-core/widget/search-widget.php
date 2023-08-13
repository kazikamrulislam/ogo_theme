<?php
/**
 * @author  AddonMonster
 * @since   1.0
 * @version 1.0
 */

add_filter( 'get_search_form', 'ogo_search_form' );
function ogo_search_form(){
	$output =  '
	<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">
		<div class="custom-search-input">
			<div class="input-group">
			<input type="text" class="search-query form-control" placeholder="' . esc_attr__( 'Search ...', 'ogo-core' ) . '" value="' . get_search_query() . '" name="s" />
				<button class="btn amt-sidebar-search-icon" type="submit">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</form>
	';
	return $output;
}