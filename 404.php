<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<main id="main" class="content__404">

		<section>
			<header>
				<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'marzeotti-base' ); ?></h1>
			</header>

			<div>
				<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'marzeotti-base' ); ?></p>
				<?php get_search_form(); ?>
			</div>
		</section>

	</main>

<?php
get_footer();
