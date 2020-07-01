<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

?>

<article id="post-<?php the_ID(); ?>" class="post__item">
	<header>
		<?php the_title( '<h1>', '</h1>' ); ?>
	</header>

	<div class="post__content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div>' . esc_html__( 'Pages:', 'marzeotti-base' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>
</article>
