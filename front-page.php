<?php
/**
 * The template for displaying the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<main id="main" class="content__front content__blocks">

		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile;
		?>

	</main>

<?php
get_footer();
