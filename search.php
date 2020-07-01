<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Marzeotti_Base
 */

get_header();
?>

	<main id="main" class="content__search">

		<?php if ( have_posts() ) : ?>

			<header>
				<h1>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'marzeotti-base' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main>

	<?php get_sidebar(); ?>

<?php
get_footer();
