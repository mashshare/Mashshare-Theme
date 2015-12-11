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
                                                                <div class="col-md-7">
                                                                    <svg width="100%" height="100%">
                                                                    <image xlink:href="<?php echo get_template_directory_uri(); ?>/images/logo_mashshare2.svg" src="<?php echo get_template_directory_uri(); ?>/images/logo_mashshare2.png" width="85%" height="85%" />
</svg>
                                                                    <h2>The Ultimate Social Media Ecosystem</h2>
                                                                    <?php echo do_shortcode('[mashshare]'); ?>

                                                                </div>
                                                                <div class="col-md-5"><img src="<?php echo get_template_directory_uri(); ?>/images/packshot.png" alt="Packshot" /></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
                                                    <div class="container">
                                                        <div class="teaser col-md-10 col-md-offset-1" style="margin-top: 30px;text-align: center;">
                                                            <h3 class="front_h" style="display:none;">Mashshare</h3>
                                                            <p style="font-size:46px;color:#666;font-weight:600;line-height: 48px;">Grow your traffic with this Supercharged Share Buttons for WordPress. </h2>
                                                            <p style="font-size:20px;color:#666;font-weight:500;">Do you want to attract an insane amount of traffic to your WordPress site from Facebook, Twitter and other social networks? Then you need an easy-to-setup eye-catching “Share it” button that will make visitors want to spread your awesome content.</p>
                                                            <p><a href="https://wordpress.org/plugins/mashsharer/" target="_blank" rel="nofollow external" class="download-button"><i class="fa fa-cloud-download"></i> Download</a></p>
                                                        </div>
                                                    </div>
                                                    <div class="addons_container container-fluid">
                                                        <div class="decor-bottom container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_white.png" alt="white" /></div>
                                                        <div class="container" style="margin-top: 30px;">
                                                            <h3 class="front_h">Unleash the power of Mashshare<br> with add-ons</h3>
                                                        </div>
                                                        <div class="container frontpage_addons">
                                                            <div class="row" style="margin-bottom:10px;">
                                                                <div class="hidden-xs col col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/facebook-like-bar/"><span class="title_addon">Facebook Like-Bar</span></a>
                                                                            <p class="no_small">A highly customizable, full responsive and mobile optimized sticky Like-Bar with Google Analytics Integration. Track and trace “Likes” and “Unlikes”</p>
                                                                            <a href="<?php echo get_permalink('11991'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/facebook-like-bar/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-fblike.png" alt="Facebook Like-Bar" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-social-networks-addon/"><span class="title_addon">Mashshare Social Networks</span></a>
                                                                            <p class="no_small">Extend Mashshare with: Google+, Whatsapp, Pinterest, Digg, Linkedin, Reddit, Stumbleupon, Vk,Print, Delicious, Buffer, Weibo, Pocket, Xing, Tumblr …</p>
                                                                            <a href="<?php echo get_permalink('70'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-social-networks-addon/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-networks.png" alt="Mashshare Social Networks Addon" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/sticky-sharebar/"><span class="title_addon">Sticky ShareBar</span></a>
                                                                            <p class="no_small">Full responsive all time visible ShareBar on top or bottom of your page which slides down after scrolling.</p>
                                                                            <a href="<?php echo get_permalink('5650'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/sticky-sharebar/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-sticky.png" alt="Mashshare Sticky ShareBar" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-responsive/"><span class="title_addon">Mashshare Responsive</span></a>
                                                                            <p class="no_small">Automatic responsive behavior for Mashshare on mobile devices, smartphones and tablets. Downsizes buttons to pure icons fitting in one line.</p>
                                                                            <a href="<?php echo get_permalink('468'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-responsive/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-responsive.png" alt="Mashshare Responsive Add-on" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/google-analytics-integration/"><span class="title_addon">Mashshare Google Analytics Integration</span></a>
                                                                            <p class="no_small">Get full integration of Mashshare into Google Analytics. Track and count every single click on all Share Buttons.</p>
                                                                            <a href="<?php echo get_permalink('4272'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/google-analytics-integration/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-google.png" alt="Mashshare Google Analytics Integration" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-pageviews/"><span class="title_addon">Mashshare PageViews</span></a>
                                                                            <p class="no_small">Realtime Pageview Counter Increase user interaction and interest with this ajax based Pageview Counter</p>
                                                                            <a href="<?php echo get_permalink('6705'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-pageviews/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-pageviews.png" alt="Mashshare PageViews" /> </a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-open-graph/"><span class="title_addon">Mashshare Open Graph</span></a>
                                                                            <p class="no_small">Share your content in the best possible way. Social sharing optimization with Open Graph implementation</p>
                                                                            <a href="<?php echo get_permalink('4469'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-open-graph/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-open.png" alt="Mashshare Open Graph" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/mashshare-likeaftershare/"><span class="title_addon">Mashshare LikeAfterShare</span></a>
                                                                            <p class="no_small">Share a post and get a Facebook Like Pop-Up overlay as seen on heftig.co or sfglobe.com.</p>
                                                                            <a href="<?php echo get_permalink('1439'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/mashshare-likeaftershare/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-like.jpg" alt="Mashshare LikeAfterShare" /></a>

                                                                    </div>
                                                                </div>
                                                                <div class="hidden-xs col-sm-4 col-md-4">
                                                                    <div class="thumbnail">
                                                                        <div class="hidden-xs caption"><a href="https://www.mashshare.net/downloads/shorturls-integration/"><span class="title_addon">Mashshare ShortURL Integration</span></a>
                                                                            <p class="no_small">Short URL Integration for twitter. Convert page URL into a short URL – Save space when posting longer tweets</p>
                                                                            <a href="<?php echo get_permalink('5202'); ?>"><button class="btn btn-primary btn-cons no_small" type="button"> view Details</button></a>

                                                                        </div>
                                                                        <a href="https://www.mashshare.net/downloads/shorturls-integration/"><img class="col-md-12" src="<?php echo get_template_directory_uri(); ?>/images/mash-short.png" alt="Mashshare ShortURL Integration" /></a>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="hidden-xs col col-sm-12 col-md-12" style="text-align: center;font-size:16px;text-decoration: underline;"><a href="https://www.mashshare.net/add-ons/" style="color: #fff;">See all available Add-Ons</a></div>
                                                            </div>
                                                        </div>
                                                        <!-- /.container -->

                                                    </div>
                                                    <div class="decor-top container"><img src="<?php echo get_template_directory_uri(); ?>/images/decor_top.png" alt="blue" /></div>
                                                    <div class="container" style="margin-top: 30px;">
                                                        <h3 class="front_h">Who is Sharing With Us?</h3>
                                                    </div>
                                                    <div class="testimonials container-fluid">
                                                        <div class="container">
                                                            <div class="row"> 
 <div class="row box hidden-xs">
  <div class="col-lg-10 col-lg-offset-1">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="row vorteile-bg" style="text-align: center;">
        
        <div class="col-xs-12">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <div class="carousel-caption">
                <img src="<?php echo get_template_directory_uri(); ?>/images/jean_paul.jpeg" alt="iculture" />
          <p>"We have been using Mashshare for a while now and are extremely satisfied with the clean look and wide array of settings, both visually and technically.  We use almost of the Mashshare add-ons and these are of the same high quality. Definitely recommended!"</p>
          <p>Jean-Paul Horn / iculture.nl</p>
              </div>
            </div>
            <div class="item">
              <div class="carousel-caption">
                <img src="<?php echo get_template_directory_uri(); ?>/images/ramsay2.png" alt="Ramsay" />
          <p>"Just switched to this plugin because I wanted something a bit cleaner for my new responsive blog design. I've used the Add Ons as well. Nice to be able to add it to the bottom of my posts as well as in the body content for longer posts where you want to add the social stuff up the top."</p>
          <p>Ramsay / blogtyrant.com</p>
              </div>
            </div>
            <div class="item">
              <div class="carousel-caption">
                <img src="<?php echo get_template_directory_uri(); ?>/images/dan2.png" alt="Dan Carr" />
          <p>"There's no other sharing plugin that has the depth of options that you get from this one. If you do need help with something, the developer is always quick to respond via the dedicated support forum on the Mashshare website. It’s the perfect social sharing plugin!"</p>
          <p>Dan Carr / DanCarrPhotography.com</p>
              </div>
            </div>
              <div class="item">
              <div class="carousel-caption">
                <img src="<?php echo get_template_directory_uri(); ?>/images/matt_shih.jpg" alt="Matthew Shih" />
                    <p>"We’ve tried a whole bunch of other social sharing solutions and never found a system that did everything we wanted until we found Mashshare. It looks and performs flawlessly, and if you ever have any hiccups, the developers are on top of it. Outstanding product and customer service, what more can you ask for?"</p>
                    <p style="color:#A5A5A5;">Matthew Shih / Factorialist.com</p>
              </div>
            </div>
          </div>
          <ol class="carousel-indicators hidden-xs">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
          </ol>
        </div>
      </div>
    </div>
    <div class="subnav">
      <hr>
      <nav class="nav nav-pills" role="navigation">
        <?php
          if (has_nav_menu('mediation_subnavigation')) :
            wp_nav_menu(array('theme_location' => 'mediation_subnavigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav nav-pills'));
          endif;
        ?>
      </nav>
    </div>
  </div>
</div>

<div class="fans-mobile visible-xs">
  <div class="row box">
    <div class="col-lg-10 col-lg-offset-1">
           
      <img src="<?php echo get_template_directory_uri(); ?>/images/jean_paul.jpg" alt="iculture" />
          <p>"We have been using Mashshare for a while now and are extremely satisfied with the clean look and wide array of settings, both visually and technically.  We use almost of the Mashshare add-ons and these are of the same high quality. Definitely recommended!"</p>
          <p>Jean-Paul Horn / iculture.nl</p>
    </div>
  </div>
  <div class="row box white">
    <div class="col-lg-10 col-lg-offset-1">
      <img src="<?php echo get_template_directory_uri(); ?>/images/ramsay2.png" alt="Ramsay" />
          <p>"Just switched to this plugin because I wanted something a bit cleaner for my new responsive blog design. I've used the Add Ons as well. Nice to be able to add it to the bottom of my posts as well as in the body content for longer posts where you want to add the social stuff up the top."</p>
          <p>Ramsay / blogtyrant.com</p>
    </div>
  </div>
  <div class="row box">
    <div class="col-lg-10 col-lg-offset-1">
       <img src="<?php echo get_template_directory_uri(); ?>/images/dan2.png" alt="Dan Carr" />
          <p>"There's no other sharing plugin that has the depth of options that you get from this one. If you do need help with something, the developer is always quick to respond via the dedicated support forum on the Mashshare website. It’s the perfect social sharing plugin!"</p>
          <p>Dan Carr / DanCarrPhotography.com</p>
    </div>
  </div>
    <div class="row box">
    <div class="col-lg-10 col-lg-offset-1">
       <img src="<?php echo get_template_directory_uri(); ?>/images/matt_shih.jpg" alt="Dan Carr" />
          <p>"We’ve tried a whole bunch of other social sharing solutions and never found a system that did everything we wanted until we found Mashshare. It looks and performs flawlessly, and if you ever have any hiccups, the developers are on top of it. Outstanding product and customer service, what more can you ask for?"</p>
          <p>Matthew Shih / Factorialist.com</p>
    </div>
  </div>

</div>
 
 <!-- Button trigger modal -->
 <div class="row" style="text-align: center; margin-bottom: 40px;">
<button type="button" class="download-button" data-toggle="modal" data-target="#myModal">
  <i class="fa fa-comments"></i> They love Mashshare
</button>
 </div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          <div class="header-color">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel"> They love Mashshare</h4>
          </div>
      </div>
      <div class="modal-body">
        <div class="container">
  <div class="row">
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
          <div class=" wall">
            <div class="row wall_testimonial">
                <div class="col-md-3 col-sm-3 col-xs-12"><img src="<?php echo get_template_directory_uri(); ?>/images/jean_paul.jpeg" alt="iculture" /></div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>We have been using Mashshare for a while now and are extremely satisfied with the clean look and wide array of settings, both visually and technically.  We use almost of the Mashshare add-ons and these are of the same high quality. Definitely recommended!</p>
                    <p style="color:#A5A5A5;">Jean-Paul Horn / iculture.nl</p>
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
          <div class=" wall">
            <div class="row wall_testimonial">
                <div class="col-md-3 col-sm-3 col-xs-12"><img src="<?php echo get_template_directory_uri(); ?>/images/ramsay2.png" alt="Ramsay" /></div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>Just switched to this plugin because I wanted something a bit cleaner for my new responsive blog design. I've used the Add Ons as well. Nice to be able to add it to the bottom of my posts as well as in the body content for longer posts where you want to add the social stuff up the top."</p>
                    <p style="color:#A5A5A5;">Ramsay / blogtyrant.com</p>
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
          <div class="wall">
            <div class="row wall_testimonial">
                <div class="col-md-3 col-sm-3 col-xs-12"><img src="<?php echo get_template_directory_uri(); ?>/images/dan2.png" alt="Dan Carr" /></div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>"There's no other sharing plugin that has the depth of options that you get from this one. If you do need help with something, the developer is always quick to respond via the dedicated support forum on the Mashshare website. It’s the perfect social sharing plugin!"</p>
                    <p style="color:#A5A5A5;">Dan Carr / DanCarrPhotography.com</p>
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
          <div class="wall">
            <div class="row wall_testimonial">
                <div class="col-md-3 col-sm-3 col-xs-12"><img src="<?php echo get_template_directory_uri(); ?>/images/matt_shih.jpg" alt="Matt_Shih_factorialist" /></div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>"We’ve tried a whole bunch of other social sharing solutions and never found a system that did everything we wanted until we found Mashshare. It looks and performs flawlessly, and if you ever have any hiccups, the developers are on top of it. Outstanding product and customer service, what more can you ask for?"</p>
                    <p style="color:#A5A5A5;">Matthew Shih / Factorialist.com</p>
                </div>
            </div>
          </div>
      </div>
      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
          <div class="wall">
            <div class="row wall_testimonial">
                <div class="col-md-3 col-sm-3 col-xs-12"><img src="<?php echo wp_get_attachment_url( 7177 ); ?>" /></div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <p>"Do you have something to say about Mashshare and want to show it here to all our friends and user?"</p>
                    <p class="download-button"><a href="https://www.mashshare.net/your-review/" style="color:#ffffff;">Submit review</a></p>
                </div>
            </div>
          </div>
      </div>
  </div>
 

</div>
      </div>
      
    </div>
  </div>
</div>
 

  <!-- Controls -->
</div>
                                                            </div>
                                                            </div>
                                                            <!--test slider end-->
                                                            
                                                        </div>
                                                    </div>
                                            </div><!-- .entry-content -->
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
