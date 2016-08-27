<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package rootstrap
 */
?>
<?php do_action( 'rootstrap_content_end' ); ?>
	</div><!-- #content -->
<?php do_action( 'rootstrap_footer_before' ); ?>

	<div id="footer-area">
	<?php do_action( 'rootstrap_footer_start' ); ?>
            <div class="container" style="margin-bottom:0px;">
                <div class="row" style="text-align: center;">
                    <div class="col-sm-12 col-md-12">Copyright &copy; <?php echo date("Y"); ?>, Mashshare</div>
                </div>
            </div>
	</div>
	<?php do_action( 'rootstrap_footer_end' ); ?>
</div><!-- #page -->
<?php do_action( 'rootstrap_footer_after' ); ?>
<?php do_action( 'rootstrap_body_end' ); ?>



<?php wp_footer(); ?>
</body>
</html>