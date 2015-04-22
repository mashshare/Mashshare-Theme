<?php

/* Frontpage template for mashshare 
 * v. 1.0.1
 */
    
    if ( get_option( 'show_on_front' ) == 'posts' ) {
        get_template_part( 'index' );
    } elseif ( 'page' == get_option( 'show_on_front' ) ) {

get_header(); ?>
		
<?php rootstrap_featured_slider(); ?>
<?php rootstrap_call_for_action(); ?>
<div id="content" class="site-content container-fluid">
	<?php do_action( 'rootstrap_post_before' ); ?>
	<div id="primary" class="content-area col-sm-12 col-md-12">
		<div id="main" class="site-main" role="main">			
			
				<?php do_action( 'rootstrap_post_start' ); ?>
					<div class="entry-content">
						<div id="header-image">
                                                    <div id="header-content" class="container">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <svg width="100%" height="100%">
                                                                    <image xlink:href="<?php echo get_template_directory_uri(); ?>/images/logo_mashshare2.svg" src="svg.png" width="100%" height="100%"   />
</svg>
                                                                    <h2>The ultimate Social Media ecosystem</h2>
                                                                    <?php echo do_shortcode('[mashshare]'); ?>

                                                                </div>
                                                                <div class="col-md-6"><img src="<?php echo get_template_directory_uri(); ?>/images/packshot.png" alt="Packshot" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
                                                    <div class="container">
                                                        <div class="teaser col-md-8 col-md-offset-2">
                                                            <h3>Mashshare</h3>
                                                            Do you want to attract an insane amount of traffic to your WordPress site from Facebook, Twitter and other social networks? Than you need an easy-to-setup eye-catching “Share it” button that will make visitors want to spread your awesome content.

                                                        </div>
                                                    </div>
                                                    <div class="addons_container container-fluid">
                                                        <div class="decor-bottom container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_white.png" alt="white" /></div>
                                                        <div class="container">
                                                            <h3>Add-Ons for Mashshare</h3>
                                                        </div>
                                                        <div class="container frontpage_addons">
                                                            <div class="row">
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/facebook-like-bar/"><span class="title_addon">Facebook Like-Bar</span></a>
                                                                            <p class="no_small">A highly customizable, full responsive and mobile optimized sticky Like-Bar with Google Analytics Integration. Track and trace “Likes” and “Unlikes”</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/facebook-like-bar/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-fblike.png" alt="Facebook Like-Bar" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-social-networks-addon/"><span class="title_addon">Masshare Social Networks</span></a>
                                                                            <p class="no_small">Extend Mashshare with: Google+, Whatsapp, Pinterest, Digg, Linkedin, Reddit, Stumbleupon, Vk,Print, Delicious, Buffer, Weibo, Pocket, Xing, Tumblr …</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-social-networks-addon/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-networks.png" alt="Mashshare Social Networks Addon" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/sticky-sharebar/"><span class="title_addon">Sticky ShareBar</span></a>
                                                                            <p class="no_small">Full responsive all time visible ShareBar on top or bottom of your page which slides down after scrolling.</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/sticky-sharebar/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-sticky.png" alt="Mashshare Sticky ShareBar" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-responsive/"><span class="title_addon">Mashshare Responsive</span></a>
                                                                            <p class="no_small">Automatic responsive behavior for Mashshare on mobile devices, smartphones and tablets. Downsizes buttons to pure icons fitting in one line.</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-responsive/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-responsive.png" alt="Mashshare Responsive Add-on" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/google-analytics-integration/"><span class="title_addon">Mashshare Google Analytics Integration</span></a>
                                                                            <p class="no_small">Get full integration of Mashshare into Google Analytics. Track and count every single click on all Share Buttons.</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/google-analytics-integration/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-google.png" alt="Mashshare Google Analytics Integration" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-pageviews/"><span class="title_addon">Mashshare PageViews</span></a>
                                                                            <p class="no_small">Realtime Pageview Counter Increase user interaction and interest with this ajax based Pageview Counter</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-pageviews/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-pageviews.png" alt="Mashshare PageViews" /> </a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-open-graph/"><span class="title_addon">Mashshare Open Graph</span></a>
                                                                            <p class="no_small">Share your content in the best possible way. Social sharing optimization with Open Graph implementation</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-open-graph/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-open.png" alt="Mashshare Open Graph" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-likeaftershare/"><span class="title_addon">Mashshare LikeAfterShare</span></a>
                                                                            <p class="no_small">Share a post and get a Facebook Like Pop-Up overlay as seen on heftig.co or sfglobe.com.</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-likeaftershare/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-like.jpg" alt="Mashshare LikeAfterShare" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/shorturls-integration/"><span class="title_addon">Mashshare ShortURL Integration</span></a>
                                                                            <p class="no_small">Short URL Integration for twitter. Convert page URL into a short URL – Save space when posting longer tweets</p>
                                                                            <button class="btn btn-primary btn-cons no_small" type="button">view Details</button>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/shorturls-integration/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-short.png" alt="Mashshare ShortURL Integration" /></a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.container -->

                                                    </div>
                                                    <div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
                                                    <div class="container">
                                                        <h3>Satisfied Customers Say</h3>
                                                    </div>
                                                    <div class="testimonials container-fluid">
                                                        <div class="decor-bottom container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_white.png" alt="white" /></div>
                                                        <div class="container">
                                                            <div class="testimonial_border col-xs-12 col-sm-4 col-md-4">
                                                                <div class="thumbnail_ratings">
                                                                    <div class="row first_line">
                                                                        <div class="col-xs-4 cold-md-4 col-lg-4"><img src="<?php echo get_template_directory_uri(); ?>/images/iculture.png" alt="iculture" /></div>
                                                                        <div class="col-xs-8 cold-md-8 col-lg-8">
                                                                            <div class="row">
                                                                                <h6><a href="http://www.iculture.nl" target="_blank" rel="nofollow">iculture.nl</a></h6>
                                                                            </div>
                                                                            <div class="row"></div>
                                                                            <div class="row">
                                                                                <div class="col-xs-12 col-md-12 col-lg-12">by <a href="http://www.iculture.nl" target="_blank" rel="nofollow">Jean-Paul Horn</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    We have been using Mashshare for a while now and are extremely satisfied with the clean look and wide array of settings, both visually and technically. Rene's support is always professional and patient and he is very open to feature requests and general feedback. We use almost of the Mashshare add-ons and these are of the same high quality. More importantly to me as a publisher is Mashshare is a huge social traffic driver due to its crisp look and feel and ease of use for end users. Definitely recommended!

                                                                </div>
                                                            </div>
                                                            <div class="testimonial_border col-xs-12 col-sm-4 col-md-4">
                                                                <div class="thumbnail_ratings">
                                                                    <div class="row first_line">
                                                                        <div class="col-xs-4 cold-md-4 col-lg-4"><img src="<?php echo get_template_directory_uri(); ?>/images/ramsay.png" alt="Ramsay" /></div>
                                                                        <div class="col-xs-8 cold-md-8 col-lg-8">
                                                                            <div class="row">
                                                                                <h6><a href="http://www.blogtyrant.com/" target="_blank" rel="nofollow">blogtyrant.com</a></h6>
                                                                            </div>
                                                                            <div class="row"></div>
                                                                            <div class="row">
                                                                                <div class="col-xs-12 col-md-12 col-lg-12">by <a href="http://www.blogtyrant.com/" target="_blank" rel="nofollow">Ramsay</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    Just switched to this plugin because I wanted something a bit cleaner for my new responsive blog design. Very clean visuals, easy to install and, best of all, the guy who runs the plugin seems really nice and answers emails if you have any support issues. This is quite rare, in my experience.I've used the Add Ons as well. Nice to be able to add it to the bottom of my posts as well as in the body content for longer posts where you want to add the social stuff up the top.

                                                                </div>
                                                            </div>
                                                            <div class="testimonial_border col-xs-12 col-sm-4 col-md-4">
                                                                <div class="thumbnail_ratings">
                                                                    <div class="row first_line">
                                                                        <div class="col-xs-4 cold-md-4 col-lg-4"><img src="<?php echo get_template_directory_uri(); ?>/images/dan.png" alt="Dan Carr" /></div>
                                                                        <div class="col-xs-8 cold-md-8 col-lg-8">
                                                                            <div class="row">
                                                                                <h6><a href="http://DanCarrPhotography.com" target="_blank" rel="nofollow">DanCarrPhotography.com</a></h6>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-xs-12 col-md-12 col-lg-12">by <a href="http://DanCarrPhotography.com" target="_blank" rel="nofollow">Dan Carr</a></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    I went through a long period where I tried out many WordPress sharing plugins. When I discovered Mashshare I knew I'd found what I was looking for. There's no other sharing plugin that has the depth of options that you get from this one, not even close. For me it's also important to see a plugin is being actively developed and maintained, with Mashshare there are new features added every month! Having a great selection of add-ons means you can keep the plugin super lightweight and just add the functions that are important to you and your site. If you do need help with something, the developer is always quick to respond via the dedicated support forum on the Mashshare website. It’s the perfect social sharing plugin!

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
                                            </div><!-- .entry-content -->
                                            <?php edit_post_link(__('Edit', 'rootstrap'), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>'); ?>
                                    <?php do_action('rootstrap_post_end'); ?>
		</div><!-- #main -->
	</div><!-- #primary -->
	</div>

		<?php do_action( 'rootstrap_post_after' ); ?>
		<?php get_sidebar( 'home' ); ?>

<?php 
	get_footer(); 
}
?>
