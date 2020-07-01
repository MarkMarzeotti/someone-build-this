<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

?>

<article id="post-<?php the_ID(); ?>" class="post__item">
	<header>
		<?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="post__meta">
			<?php
			marz_posted_on();
			marz_posted_by();
			?>
		</div>
		<?php endif; ?>
	</header>

	<div class="post__content">
		<?php the_excerpt(); ?>
	</div>
</article>
