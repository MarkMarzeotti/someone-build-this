<?php
/**
 * URL Structure logic.
 *
 * @package Marzeotti_Base
 */

/**
 * Add query vars.
 *
 * @param array $vars Existing query vars.
 */
function marz_add_query_vars( $vars ) {
	$vars[] = 'comment_category';
	return $vars;
}
add_filter( 'query_vars', 'marz_add_query_vars' );

function marz_add_rewrite_rules() {
	add_rewrite_rule( 'idea/([0-9]+)/([a-zA-Z0-9-_]+)(?:/([0-9]+))?/?$', 'index.php?p=$matches[1]&comment_category=$matches[2]&page=$matches[3]', 'top' );
}
add_action( 'init', 'marz_add_rewrite_rules' );
