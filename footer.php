<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
	</section><!-- #main -->
	<footer class="ftr" role="contentinfo" >
		<div class="wrapper">
			<a class="ftr-logo-mod" href="/"><h3 class="ftr-logo-icon">Upstatement</h3></a>

			<p class="ftr-msg">
				<span class="br"><a href="/about">Learn more</a> about who we are and <a href="/portfolio">what we do</a> </span>
				<span>or <a href="mailto:info@upstatement.com">send us an email</a> to discuss your project.</span></p>

			<p class="ftr-info"><a href="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=Upstatement&sll=42.349347,-71.053433&sspn=0.0098,0.021157&ie=UTF8&hq=Upstatement&hnear=&ll=42.349347,-71.053433&spn=0.018808,0.042315&z=15&iwloc=A">319 A Street Boston, MA 02210</a> &bull; 617 329 1316</p>
			<p class="ftr-info">Upstatement LLC &copy; <?= date('Y'); ?></p>
		</div><!-- wrapper -->
<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	// get_sidebar( 'footer' );
?>

	</footer><!-- footer -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body></html>