<?php
	// Template Name: Home Page
	global $jackson;
	global $post;
	$page_meta = jackson_prepare_meta( get_post_meta( $post->ID ) );
	
	$query = new WP_Query( array( 
		'posts_per_page' => 4,
		'post_type' 	=> 'services',
		'order'			=> DESC,
	) );

	$query2 = new WP_Query( array( 
		'posts_per_page' => 4,
		'post_type' 	=> 'partners',
		'order'			=> DESC,
	) );
?>

<?php get_header(); ?>

<section class="advantages">
	<div class="container">
		<div class="entry-header">
			<h1><?php echo $page_meta['adv_title']; ?></h1>
			<p><?php echo $page_meta['adv_desc']; ?></p>
			<div class="bglogo"></div>
		</div>
		<div class="our-prod">
			<h1><?php echo $page_meta['our_prod']; ?></h1>
			<p><?php echo $page_meta['our_desc']; ?></p>
			<div class="video">
				<?php 
				// var_dump($page_meta['adv_video']['url']);
				$url = $page_meta['adv_video']['url'];
				$poster = $page_meta['adv_thumb']['url'];
				echo do_shortcode('[evp_embed_video url=' . $url . ' width="728" ratio="0.687" poster=' . $poster . ' template="mediaelement"]'); ?>
			</div>
		</div>
	</div>
</section>

<section class="supply-partners">
	<div class="commercial">
		<h1>Maintenance Supply</h1>
		<!-- <?php
		 //while  ($query->have_posts() ) : $query->the_post();   ?>
		<?php 
			//echo get_the_post_thumbnail();
			//echo get_the_title(); 
		?>
		<?php //endwhile; ?>
		<?php //wp_reset_postdata();?>
		<div class="supply">
			<img src="<?php //echo get_template_directory_uri(); ?>/img/Layer17.jpg" alt="">
			<a href="#">Chemicals</a>
		</div>
		<div class="supply">
			<img src="<?php //echo get_template_directory_uri(); ?>/img/Layer18.jpg" alt="">
			<a href="#">Hardware Maintenance</a>
		</div>
		<div class="supply">
			<img src="<?php //echo get_template_directory_uri(); ?>/img/Layer19.jpg" alt="">
			<a href="#">Industrial Supply</a>
		</div>
		<div class="supply">
			<img src="<?php //echo get_template_directory_uri(); ?>/img/Layer20.jpg" alt="">
			<a href="#">Tools</a>
		</div> -->

		 <?php while  ($query->have_posts() ) : $query->the_post();   ?>

			<div class="supply">
				<?php echo get_the_post_thumbnail(); ?>
				<a href="#"><?php echo get_the_title(); ?></a>
			</div> 

		<?php endwhile; ?>
		<?php wp_reset_postdata();?>

	</div>
	<div class="our-partners">
		<h1>Our partners</h1>
		<div class="responsive">
		<?php while  ($query2->have_posts() ) : $query2->the_post();   ?>

			<div class="partner"><?php echo get_the_post_thumbnail(); ?></div>

		<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata();?>

		<!-- <div class="partner"><img src="<?php //echo get_template_directory_uri(); ?>/img/Layer24.jpg" alt=""></div>
		<div class="partner"><img src="<?php //echo get_template_directory_uri(); ?>/img/Layer23.jpg" alt=""></div>
		<div class="partner"><img src="<?php //echo get_template_directory_uri(); ?>/img/Layer22.jpg" alt=""></div>
		<div class="partner"><img src="<?php //echo get_template_directory_uri(); ?>/img/Layer25.jpg" alt=""></div> -->
	</div>
</section>

<?php get_footer(); ?>