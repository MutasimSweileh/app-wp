<?php

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget
class wpb_widget extends WP_Widget {

function __construct() {
parent::__construct(

// Base ID of your widget
'wpb_widget',

// Widget name will appear in UI
__('Mo3tasmTheme About Widget', 'Mo3tasmTheme'),

// Widget description
array( 'description' => __( 'Sample widget based on WPBeginner Tutorial', 'Mo3tasmTheme' ), )
);
}

// Creating widget front-end

public function widget( $args, $instance ) {
		$title       = apply_filters( 'widget_title', $instance['title'] );
		$align       = isset( $instance['align'] ) ? $instance['align'] : '';
		$image       = $instance['image'];
		$circle      = isset( $instance['circle'] ) ? $instance['circle'] : '';
		$lazyload      = isset( $instance['lazyload'] ) ? $instance['lazyload'] : '';
		$imageurl    = isset( $instance['imageurl'] ) ? $instance['imageurl'] : '';
		$target      = isset( $instance['target'] ) ? $instance['target'] : '';
		$heading     = $instance['heading'];
		$description = $instance['description'];
        ?>
                 <!-- START Widget -->
                <div class="widgets__widget authorWidget">
                <?php  if($title){ ?>
                  <div class="widgets__widget--head">
                    <i class="flaticon-people"></i>
                    <h3><?=$title?></h3>
                  </div>
                  <?php } ?>
                  <div class="widgets__widget--content primaryContent">
                    <div class="authorInfo">

                    <?php  if($image){ ?>
                      <div class="authorWidgetImg">
                        <img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $title ); ?>" <?php echo $circle_style; ?> />
                      </div>
                     <?php } ?>
                      <p>
                   <?=$description?>
                      </p>
                      <ul class="authorSocial">
                        <?php  if(get_theme_mod("penci_facebook")) : ?>
                        <li>
                          <a href="<?=get_theme_mod("penci_facebook")?>">
                            <i class="flaticon-facebook"></i>
                          </a>
                        </li>
                        <?php endif;  ?>
                         <?php  if(get_theme_mod("penci_twitter")) : ?>
                        <li>
                          <a href="<?=get_theme_mod("penci_twitter")?>">
                            <i class="flaticon-twitter-1"></i>
                          </a>
                        </li>
                         <?php endif;  ?>
                         <?php  if(get_theme_mod("penci_google")) : ?>
                        <li>
                          <a href="<?=get_theme_mod("penci_google")?>">
                            <i class="flaticon-google"></i>
                          </a>
                        </li>
                          <?php endif;  ?>
                         <?php  if(get_theme_mod("penci_linkedin")) : ?>
                        <li>
                          <a href="<?=get_theme_mod("penci_linkedin")?>">
                            <i class="flaticon-linkedin"></i>
                          </a>
                        </li>
                          <?php endif;  ?>
                         <?php  if(get_theme_mod("penci_instagram")) : ?>
                        <li>
                          <a href="<?=get_theme_mod("penci_instagram")?>">
                            <i class="flaticon-instagram"></i>
                          </a>
                        </li>
                          <?php endif;  ?>
                         <?php  if(get_theme_mod("penci_pinterest")) : ?>
                        <li>
                          <a href="<?=get_theme_mod("penci_pinterest")?>">
                            <i class="flaticon-pinterest"></i>
                          </a>
                        </li>
                          <?php endif;  ?>

                      </ul>
                    </div>
                  </div>
                </div>
                <!-- END Widget -->
                <?php
}
 function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags for title and name to remove HTML (important for text inputs). */
		$instance['title']       = strip_tags( $new_instance['title'] );
		$instance['align']       = strip_tags( $new_instance['align'] );
		$instance['image']       = strip_tags( $new_instance['image'] );
		$instance['circle']      = strip_tags( $new_instance['circle'] );
		$instance['lazyload']    = strip_tags( $new_instance['lazyload'] );
		$instance['imageurl']    = strip_tags( $new_instance['imageurl'] );
		$instance['target']      = strip_tags( $new_instance['target'] );
		$instance['heading']     = strip_tags( $new_instance['heading'] );
		$instance['description'] = $new_instance['description'];

		return $instance;
	}

	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array( 'title' => 'About Me', 'align' => '', 'image' => '', 'circle' => '', 'lazyload' => '', 'imageurl' => '', 'target' => '', 'heading' => '', 'description' => '' );
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<!-- Widget Title: Text Input -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'soledad' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo sanitize_text_field( $instance['title'] ); ?>" />
		</p>



		<!-- image url -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php esc_html_e( 'About Image URL:', 'soledad' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" value="<?php echo esc_url( $instance['image'] ); ?>" /><br />
			<small><?php esc_html_e( 'Insert your image URL. For best result use 365px width.', 'soledad' ); ?></small>
		</p>

		<!-- Circle image -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'circle' ) ); ?>"><?php esc_html_e('Make About Image Circle:','soledad'); ?></label>
			<input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'circle' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'circle' ) ); ?>" <?php checked( (bool) $instance['circle'], true ); ?> /><br />
			<small><?php esc_html_e( 'To use this feature, please use square image for your image above to get best display.', 'soledad' ); ?></small>
		</p>



		<!-- description -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>"><?php esc_html_e( 'About me text: ( you can use HTML here )', 'soledad' ); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'description' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'description' ) ); ?>" rows="6"><?php echo esc_textarea( $instance['description'] ); ?></textarea>
		</p>


	<?php
	}

} // Class wpb_widget ends here

?>