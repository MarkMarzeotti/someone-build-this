<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<main id="main" class="container mx-auto">

		<?php
		$comment_category = get_query_var( 'comment_category' );
		print_r( $comment_category );
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile;
		?>

	</main>

<?php
get_footer();
