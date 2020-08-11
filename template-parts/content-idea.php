<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Marzeotti_Base
 */

?>

<div id="idea-<?php the_ID(); ?>" class="flex items-center my-4">
	<div class="w-14 flex flex-col content-center items-center flex-none">
		<button class="pt-1 pb-0 hover:pt-0 hover:pb-1 transition-spacing duration-300">
			<svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-teal-500 w-8" viewBox="0 0 20 20"><path d="M10.707 7.05L10 6.343 4.343 12l1.414 1.414L10 9.172l4.243 4.242L15.657 12z"/></svg>
		</button>
		<span class="text-md font-semibold text-gray-600">100k</span>
		<button class="pt-0 pb-1 hover:pt-1 hover:pb-0 transition-spacing duration-300">
			<svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-teal-500 w-8" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
		</button>
	</div>
	<div class="ml-6">
		<a href="<?php the_permalink(); ?>" class="block mt-1 mb-3 text-2xl font-normal text-gray-700 hover:text-teal-500 transition duration-300"><?php the_title(); ?></a>
		<a href="<?php the_permalink(); ?>" class="uppercase tracking-wide text-sm text-indigo-600 font-bold mr-3 hover:text-pink-600 transition duration-300">Idea</a>
		<a href="<?php the_permalink(); ?>branding/" class="uppercase tracking-wide text-sm text-gray-400 font-bold mr-3 hover:text-pink-600 transition duration-500">Branding</a>
		<a href="<?php the_permalink(); ?>design/" class="uppercase tracking-wide text-sm text-gray-400 font-bold mr-3 hover:text-pink-600 transition duration-500">Design</a>
		<a href="<?php the_permalink(); ?>engineering/" class="uppercase tracking-wide text-sm text-gray-400 font-bold mr-3 hover:text-pink-600 transition duration-500">Engineering</a>
	</div>
</div>
