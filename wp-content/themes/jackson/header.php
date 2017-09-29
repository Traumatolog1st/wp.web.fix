<?php
	global $jackson;
	global $post;
	$page_meta = jackson_prepare_meta( get_post_meta( $post->ID ) );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<?php if(is_page_template('home-tpl.php')) { ?>
	<header class="header-page">
		<div class="top-header">
			<div class="logo"><a href="/"><img src="<?php echo $jackson['logotype']['url']; ?>" alt=""></a></div>
			<div class="search">
				 <?php get_search_form(); ?>
			</div>
			<div class="menu">
				<div class="burger"><i class="fa fa-bars" aria-hidden="true"></i></div>
				<?php wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'menu_class'     => 'nav'
				) ); ?>
			</div>
			
		</div>
		<div class="bottom-header">
			<h1><?php echo $page_meta['header_title']; ?></h1>
			<p><?php echo $page_meta['header_subtitle']; ?></p>
			<a href="#">See all products</a>
			<div class="line"></div>
		</div>

	</header>
	<?php } else {} ?>
	<div id="content" class="site-content">
