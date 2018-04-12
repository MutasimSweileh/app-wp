
<?php
/**
 * Extend Recent Posts Widget
 *
 * Adds different formatting to the default WordPress Recent Posts Widget
 */

Class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {

		extract( $args );

		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);

		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :

?>
                <!-- START Widget -->
                <div class="widgets__widget popularWidget">
                <?php 	if( $title ){  ?>
                <div class="widgets__widget--head">
                    <i class="flaticon-speech-bubble"></i>
                    <h3><?=$title?></h3>
                  </div>
                <?php } ?>
                  <div class="widgets__widget--content primaryContent">
                    <?php while( $r->have_posts() ) : $r->the_post(); ?>
                  <a class="popularItem" href="<?php the_permalink(); ?>">
                      <div class="popularItem__img">
                       <?php  the_post_thumbnail(); ?>
                      </div>
                      <div class="popularItem__content">
                        <h5><?php str_limit(the_title("","",false),60) ?></h5>
                       <?php if($instance['show_date']    === true){?>
                        <time><?php the_time( 'F d'); ?></time>
                        <?php } ?>

                      </div>
                    </a>
                  	<?php endwhile; ?>
                  </div>
                </div>
                <!-- END Widget -->
        <?php

        wp_reset_postdata();

		endif;
	}
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');

?>