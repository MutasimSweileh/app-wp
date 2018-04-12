<?php
Class my_WP_Widget_Tag_Cloud  extends WP_Widget_Tag_Cloud {
    function widget( $args, $instance ) {
        // your code here for overriding the output of the widget
        static $first_dropdown = true;

        $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Categories' );

        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $h = ! empty( $instance['hierarchical'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';
         $cat_args = array(
            'orderby'      => 'name',
            'show_count'   => $c,
            'hierarchical' => $h,
            'echo' => 0,
        );

         $cat_args['title_li'] = '';
        ?>
                <!-- START Widget -->
                <div class="widgets__widget tagsWidget">
                <?php  if ( $title ) { ?>
                <div class="widgets__widget--head">
                    <i class="flaticon-shopping"></i>
                    <h3><?=$title?></h3>
                  </div>
                 <?php } ?>
                  <div class="widgets__widget--content primaryContent">
                    <div class="tags-container">
                    <?php
                    $list = wp_list_categories(apply_filters('widget_categories_args', $cat_args));
                    $list = str_replace('(', '<span class="number">', $list);
                    $list = str_replace(')', '</span>', $list);
                    $list = str_replace('<li>', '', $list);
                    $list = str_replace('</li>', '', $list);
                    echo $list;
                     ?>
                  </div>
                  </div>
                </div>
                <!-- END Widget -->
        <?php
    }

}

function my_WP_Widget_Tag_Cloud_register() {
    unregister_widget( 'WP_Widget_Tag_Cloud' );
    register_widget( 'my_WP_Widget_Tag_Cloud' );
}

add_action( 'widgets_init', 'my_WP_Widget_Tag_Cloud_register' );

?>