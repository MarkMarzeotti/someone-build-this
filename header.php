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

	<header id="masthead" class="header">
		<div class="container">
			<div class="header__logo">
				<?php
				the_custom_logo();
				if ( is_front_page() && is_home() ) :
					?>
					<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
				else :
					?>
					<p><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php endif; ?>
			</div>

			<?php if ( has_nav_menu( 'primary-menu' ) || has_nav_menu( 'button-menu' ) ) : ?>
				<nav id="site-navigation" class="header__nav nav">
					<button id="menu-button" class="nav__button" aria-controls="primary-menu" aria-expanded="false">
						<span class="screen-reader-text"><?php esc_html_e( 'Primary Menu', 'marzeotti-base' ); ?></span>
						<span class="hamburger">
							<span class="hamburger__top"></span>
							<span class="hamburger__middle"></span>
							<span class="hamburger__bottom"></span>
						</span>
					</button>

					<div class="nav__container">
						<?php
						if ( has_nav_menu( 'primary-menu' ) ) :
							wp_nav_menu(
								array(
									'container'      => false,
									'menu_id'        => 'primary-menu',
									'menu_class'     => 'nav__level',
									'theme_location' => 'primary-menu',
									'walker'         => new Marz_Walker_Nav_Menu(),
								)
							);
						endif;

						if ( has_nav_menu( 'button-menu' ) ) :
							wp_nav_menu(
								array(
									'container'      => false,
									'menu_id'        => 'button-menu',
									'menu_class'     => 'nav__level button-menu',
									'theme_location' => 'button-menu',
									'walker'         => new Marz_Walker_Nav_Menu(),
									'depth'          => 1,
								)
							);
						endif;
						?>
					</div>
				</nav>
			<?php endif; ?>
		</div>
	</header>

	<div id="content" class="content">
