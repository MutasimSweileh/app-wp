
</main>
      <footer id="footer">
         <?php  if(!get_theme_mod("penci_instgram")){ ?>
        <div class="instaFeed">
          <h3>Follow Me <a href="#">@moonwalker929</a></h3>
          <div class="instaFeed__content">
            <a href="#"><img src="https://dohtheme.com/html/noval/img/featuredBlog.jpg" alt=""></a>
            <a href="#"><img src="https://dohtheme.com/html/noval/img/blogBig3.jpg" alt=""></a>
            <a href="#"><img src="https://dohtheme.com/html/noval/img/featuredBlog3.jpg" alt=""></a>
            <a href="#"><img src="https://dohtheme.com/html/noval/img/about1.jpeg" alt=""></a>
            <a href="#"><img src="https://dohtheme.com/html/noval/img/about2.jpeg" alt=""></a>
            <a href="#"><img src="https://dohtheme.com/html/noval/img/blogBig4.jpg" alt=""></a>
        </div>
        </div>
       <?php
         }
         ?>
        <div class="container">
        <div class="center widgetAd">

        <?php echo  get_theme_mod("penci_footer_adsense"); ?>
          </div>
          <?php  if (!get_theme_mod("penci_footer_social") ) : ?>
          <div class="footer__social_div"  aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'Mo3tasmTheme' ); ?>" >
            <ul class="footer__social">
            <?php  if(get_theme_mod("penci_facebook")) : ?>
            <li>
              <a href="<?=get_theme_mod("penci_facebook")?>">
                <i class="flaticon-facebook"></i>
                Facebook
              </a>
            </li>
            <?php endif;  ?>
             <?php  if(get_theme_mod("penci_twitter")) : ?>
            <li>
              <a href="<?=get_theme_mod("penci_twitter")?>">
                <i class="flaticon-twitter-1"></i>
                Twitter
              </a>
            </li>
             <?php endif;  ?>
             <?php  if(get_theme_mod("penci_google")) : ?>
            <li>
              <a href="<?=get_theme_mod("penci_google")?>">
                <i class="flaticon-google"></i>
                Google+
              </a>
            </li>
              <?php endif;  ?>
             <?php  if(get_theme_mod("penci_linkedin")) : ?>
            <li>
              <a href="<?=get_theme_mod("penci_linkedin")?>">
                <i class="flaticon-linkedin"></i>
                LinkedIn
              </a>
            </li>
              <?php endif;  ?>
             <?php  if(get_theme_mod("penci_instagram")) : ?>
            <li>
              <a href="<?=get_theme_mod("penci_instagram")?>">
                <i class="flaticon-instagram"></i>
                Instagram
              </a>
            </li>
              <?php endif;  ?>
             <?php  if(get_theme_mod("penci_pinterest")) : ?>
            <li>
              <a href="<?=get_theme_mod("penci_pinterest")?>">
                <i class="flaticon-pinterest"></i>
                Pinterest
              </a>
            </li>
              <?php endif;  ?>
          </ul>


          </div>
          <?php endif;  ?>
            <?php  if ( has_nav_menu( 'Footer' ) ) : ?>
          <div class="footer__social_div"  aria-label="<?php esc_attr_e( 'Footer  Links Menu', 'Mo3tasmTheme' ); ?>" >



           <?php
						wp_nav_menu( array(
							'theme_location' => 'Footer',
							'menu_class'     => 'footer__links',
							'depth'          => 1,
						   //	'link_before'    => '<span class="screen-reader-text">',
							//'link_after'     => '</span>',
						) );
		   ?>

          </div>
          <?php endif; ?>
          <div id="copyRight">
          <?php
          if(has_custom_logo()){
          echo get_log_img();
          }else{
          ?>
          <img src="<?=get_template_directory_uri()?>/img/logo.png" alt="" />
          <?php } ?>
            <p>
           <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span> &nbsp;2018 © -  built by <a href="https://www.facebook.com/mohtasm.sawilh" target="_blank">Mo3tasm Mohamed</a>
            </p>
          </div>
        </div>
      </footer>
      <!-- JavaScript goes here -->
      <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/jquery.min.js"></script>
      <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/bootstrap-hover-dropdown.min.js"></script>
      <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/jquery.easing.min.js"></script>
      <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/apps.js"></script>
     <?php wp_footer(); ?>

    </body>

</html>
