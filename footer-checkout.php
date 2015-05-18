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
            <div class="container" style="margin-bottom:10px;">
                <div class="row" style="text-align: center;">
                    <div class="col-sm-12 col-md-12">Copyright &copy; 2014 - 2015, Mashshare</div>
                </div>
            </div>
	</div>
	<?php do_action( 'rootstrap_footer_end' ); ?>
</div><!-- #page -->
<?php do_action( 'rootstrap_footer_after' ); ?>
<?php do_action( 'rootstrap_body_end' ); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-912289-17', 'mashshare.net');
  ga('require', 'displayfeatures');
  ga('send', 'pageview');
</script>

<?php wp_footer(); ?>
</body>
</html>