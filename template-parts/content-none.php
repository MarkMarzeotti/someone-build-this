<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

?>

<section>
	<header>
		<h1><?php esc_html_e( 'Nothing Found', 'marzeotti-base' ); ?></h1>
	</header>

	<div>
		<?php if ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'marzeotti-base' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'marzeotti-base' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</section>
