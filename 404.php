<?php
/*
Template Name: 404 error template
*/
?>

<?php  include_once('header-404.php');?>

	

	<div id="page-wrap" class="container-fluid">
            <div id="header-image"><!--start header-image-->
<div id="header-content" class="container"><!--start header-->
    <div class="row"><!--start row-->
        <div class="col-md-12">
            <h1 class="h1-404">You've found the goat!</h1>
        </div>
        
    </div><!--end row-->
</div><!--end header-->
</div><!--end header-image-->
<div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
            <div class="row"><!-- start row -->
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1">
                    <div id="content" class="sixteen columns">
				
			<article class="post">
	
				<div class="entry" id="error-404">
						
					<h3 class="error-404" style='font-size:3rem;line-height:1.2'>Ahhhhhhhhhhh! This page doesn't exist</h3>
					<h3 class="error-404">Not to worry. You can either head back to our homepage, or sit there and listen to a goat scream like a human.</h3>
					<div class="content  fit-vid  vid is-loaded">
                                            <div class="fluid-width-video-wrapper" style="padding-top: 56.25%;">
                                                <iframe src="//www.youtube.com/embed/SIaFtAKnqBU?vq=hd720&amp;rel=0&amp;showinfo=0&amp;controls=0&amp;iv_load_policy=3&amp;loop=1&amp;playlist=SIaFtAKnqBU&amp;modestbranding=1&amp;autoplay=1" frameborder="0" webkitallowfullscreen="" allowfullscreen="" id="fitvid885371"></iframe></div>
                                        </div>
					<?php //echo do_shortcode('[contact-form-7 id="5152" title="404"]'); ?>
					<!--<span align="center"><a href="<?php echo home_url(); ?>" target="_self" class="button alternative-1 large">Go to home</a></span>-->
                                        <aside class="mashsb-container mashsb-main">
                                            <div class="mashsb-box">
                                                <div class="mashsb-count mash-large" style="float:left;">
                                                    <div class="counts mashsbcount">1.1k</div>
                                                    <span class="mashsb-sharetext">SHARES</span></div>
                                                <div class="mashsb-buttons">
                                                    <a class="mashicon-facebook mash-large" href="http://www.facebook.com/sharer.php?u=https://www.mashshare.net/404-not-found" target="_blank" rel="nofollow"><span class="icon"></span><span class="text">Share&nbsp;a&nbsp;Screaming&nbsp;Goat</span></a>
                                                    <a class="mashicon-twitter mash-large" href="https://twitter.com/intent/tweet?text=You%20must%20see%20this%20funny%20404%20error%20page%20on%20https://www.mashshare.net/404-not-found%20via%20@mashshare" target="_blank" rel="nofollow"><span class="icon"></span><span class="text">&nbsp;Tweet&nbsp;a&nbsp;Screaming&nbsp;Goat</span></a>
´                                               </div>   
                                            </div>                                                
                                        </aside>
	                                <div style="clear:both;text-align: center;"><a href="https://www.mashshare.net" target="_self">Get these cool share buttons</a></div>

			</article>
		</div> <!-- end content -->
            </div><!-- end row -->
	</div> <!-- end page-wrap -->

<?php //get_footer(); ?>
            </div><!-- end container //->
</div> <!-- end header //->


        <?php wp_footer(); ?>
</body>
</html>