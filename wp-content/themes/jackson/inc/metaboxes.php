<?php

// INCLUDE THIS BEFORE you load your ReduxFramework object config file.


// You may replace $redux_opt_name with a string if you wish. If you do so, change loader.php
// as well as all the instances below.
$redux_opt_name = THEME_OPT;

if ( !function_exists( "redux_add_metaboxes" ) ):
	function redux_add_metaboxes($metaboxes) {

	$page_options = array();

	$metaSection = array(
		'title'			=> 'Header',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' => array(
			array(
				'id'     => 'header_title',
				'type'   => 'text',
				'title'  => __( 'Title','jackson'),
			),
			array(
				'id'     => 'header_subtitle',
				'type'   => 'textarea',
				'title'  => __( 'Subtitle','jackson'),
			),
		)
	);

	$metaSection2 = array(
		'title'			=> 'Advantages',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' => array(
			array(
				'id'     => 'adv_title',
				'type'   => 'text',
				'title'  => __( 'Title','jackson'),
			),
			array(
				'id'     => 'adv_desc',
				'type'   => 'textarea',
				'title'  => __( 'Description','jackson'),
			),
		)
	);

	$metaSection3 = array(
		'title'			=> 'Our Productions',
		'icon_class'    => 'icon-large',
		'icon'          => 'el-icon-list-alt',
		'fields' => array(
			array(
				'id'     => 'our_prod',
				'type'   => 'text',
				'title'  => __( 'Title Production','jackson'),
			),
			array(
				'id'     => 'our_desc',
				'type'   => 'textarea',
				'title'  => __( 'Our Description','jackson'),
			),
			array(
				'id'     => 'adv_thumb',
				'type'   => 'media',
				'title'  => __( 'Thumbnail','jackson'),
			),
			array(
				'id'     => 'adv_video',
				'type'   => 'media',
				'mode'   => 'false',
				'title'  => __( 'Video','jackson'),
			),
		)
	);

	$page_options[] = $metaSection;
	$page_options[] = $metaSection2;
	$page_options[] = $metaSection3;

	$metaboxes[] = array(
		'id'            => 'page-options',
		'title'         => __( 'Page options', THEME_OPT ),
		'post_types'    => array( 'page' ),
		'page_template' => array('home-tpl.php'),
		'position'      => 'normal', // normal, advanced, side
		'priority'      => 'high', // high, core, default, low
		'sidebar'       => false, // enable/disable the sidebar in the normal/advanced positions
		'sections'      => $page_options,
	);

	return $metaboxes;
  }
  add_action("redux/metaboxes/{$redux_opt_name}/boxes", 'redux_add_metaboxes');
endif;