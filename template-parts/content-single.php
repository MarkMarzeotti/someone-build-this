<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

?>

<article id="idea-<?php the_ID(); ?>">

	<div class="flex mb-20">

		<div class="w-2/3 mr-20">
			<h1 class="mt-0 mb-16 text-5xl font-medium text-indigo-600"><?php the_title(); ?></h1>
			<?php
			the_content();

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			?>
		</div>

		<aside class="w-1/3">
			<?php
			marz_posted_on();
			marz_posted_by();
			?>
		</aside>

	</div>

</article>
