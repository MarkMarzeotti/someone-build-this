<?php
/**
 * The header for our theme
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Marzeotti_Base
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'marzeotti-base' ); ?></a>

	<header id="masthead" class="container mx-auto py-6 mb-10">
		<div class="flex items-center justify-between flex-wrap">
			<div class="flex items-center flex-shrink-0 lg:flex-grow mr-6">
				<a href="" class="flex items-center flex-shrink-0 text-gray-700 hover:text-teal-500 transition duration-300">
					<svg class="fill-current h-8 w-8 mr-2" width="54" height="54" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.16 6.42a8.03 8.03 0 0 0-3.58-3.58l-1.34 2.69a5.02 5.02 0 0 1 2.23 2.23l2.69-1.34zm0 7.16l-2.69-1.34a5.02 5.02 0 0 1-2.23 2.23l1.34 2.69a8.03 8.03 0 0 0 3.58-3.58zM6.42 2.84a8.03 8.03 0 0 0-3.58 3.58l2.69 1.34a5.02 5.02 0 0 1 2.23-2.23L6.42 2.84zM2.84 13.58a8.03 8.03 0 0 0 3.58 3.58l1.34-2.69a5.02 5.02 0 0 1-2.23-2.23l-2.69 1.34zM10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-7a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/></svg>
					<span class="font-medium text-2xl tracking-tight">Someone Build This</span>
				</a>
			</div>
			<div class="block lg:hidden">
				<button class="flex items-center px-3 py-2 border rounded text-teal-500 hover:text-teal-800">
					<svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
				</button>
			</div>
			<nav class="w-full block flex-grow lg:flex lg:items-center justify-end lg:w-auto">
				<!-- <div class="text-sm lg:flex-grow">
					<a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover:text-teal-800 mr-4">
						Docs
					</a>
					<a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover:text-teal-800 mr-4">
						Examples
					</a>
					<a href="#responsive-header" class="block mt-4 lg:inline-block lg:mt-0 text-teal-500 hover:text-teal-800">
						Blog
					</a>
				</div> -->
				<div>
					<a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-teal-500 border-teal-500 hover:border-transparent hover:text-white hover:bg-teal-500 transition duration-300 mt-4 lg:mt-0">Log In</a>
					<a href="#" class="inline-block text-sm px-4 py-2 leading-none border rounded text-teal-500 border-teal-500 hover:border-transparent hover:text-white hover:bg-teal-500 transition duration-300 mt-4 lg:mt-0">Sign Up</a>
				</div>
			</nav>
		</div>
	</header>

	<div id="content" class="content">
