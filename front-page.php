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

	<main id="main" class="container mx-auto">

		<?php get_template_part( 'template-parts/static', 'intro' ); ?>

		<h2 class="uppercase mb-2 tracking-wide text-md text-gray-600 font-medium">Top Ideas</h2>

		<?php
		$args = array(
			'post_type'              => array( 'post' ),
			'post_status'            => array( 'publish' ),
			'paged'                  => $paged,
			'posts_per_page'         => 20,
		);

		$query = new WP_Query( $args );

		if ( $query->have_posts() ) {
			?>
			<div id="ideas" class="mb-16">
				<?php
				while ( $query->have_posts() ) {
					$query->the_post();
					get_template_part( 'template-parts/content', 'idea' );
				}
				?>
			</div>
			<?php
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}

		wp_reset_postdata();
		?>

	</main>

<?php
get_footer();
