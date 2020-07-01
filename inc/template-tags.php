<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Marzeotti_Base
 */

/**
 * Prints HTML with meta information for the current post-date/time.
 */
function marz_posted_on() {
	$time_string = '<time class="published updated" datetime="%1$s">%2$s</time>';

	$time_string = sprintf(
		$time_string,
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	$posted_on = sprintf(
		/* translators: %s: post date. */
		esc_html_x( 'Posted on %s', 'post date', 'marzeotti-base' ),
		$time_string
	);

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="updated" datetime="%1$s">%2$s</time>';

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Updated on %s', 'post date', 'marzeotti-base' ),
			$time_string
		);
	}

	echo '<span class="posted-on">' . wp_kses( $posted_on, 'post' ) . '</span>';

}

/**
 * Prints HTML with meta information for the current author.
 */
function marz_posted_by() {
	$byline = sprintf(
		/* translators: %s: post author. */
		esc_html_x( 'by %s', 'post author', 'marzeotti-base' ),
		'<span class="author"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="byline"> ' . wp_kses( $byline, 'post' ) . '</span>';

}
