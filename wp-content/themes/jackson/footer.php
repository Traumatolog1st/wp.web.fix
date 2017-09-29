<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jackson
 */
?>
	</div><!-- #content -->


<footer>
	<div class="contact-us">
		<form action="" method="post" id="contact-form">
			<h1>Contact Us</h1>
			<div class="form-item">
			<h2>Name</h2><input type="text" name="f-name" id="f-name" placeholder="First"></div>
			<div class="form-item">
			<input type="text" name="l-name" id="l-name" placeholder="Last"></div>
			<div class="form-item">
			<h2>Email</h2><input type="email" name="email" id="email"></div>
			<div class="form-item">
			<h2>Phone</h2><input type="text" name="phone"></div>
			<div class="form-item">
			<h2>Message</h2><textarea name="message"></textarea></div>
			<div class="form-item"><input class="submit" type="submit" value="SUBMIT"></div>
		</form>
		<?php //echo do_shortcode('[contact-form-7 id="55" title="Untitled"]'); ?>
	</div>
	<div class="copyright">
		<p>COPYRIGHT © 2016 JACKSONCO SUPPLY · WEBSITE BY DSKY</p>
	</div>
</footer>


<?php wp_footer(); ?>

</body>
</html>
