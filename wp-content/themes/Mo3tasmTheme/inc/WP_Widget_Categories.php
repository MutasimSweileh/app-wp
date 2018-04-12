<?php
Class My_Categories_Widget extends WP_Widget_Categories {
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
                <div class="widgets__widget categoriesWidget">
                <?php  if ( $title ) { ?>
                <div class="widgets__widget--head">
                    <i class="flaticon-big-brochure"></i>
                    <h3><?=$title?></h3>
                  </div>
                 <?php } ?>
                  <div class="widgets__widget--content primaryContent">
                    <ul class="categoriesList">
                    <?php
                    $list = wp_list_categories(apply_filters('widget_categories_args', $cat_args));
                    $list = str_replace('(', '<span class="number">', $list);
                    $list = str_replace(')', '</span>', $list);
                    echo $list;
                     ?>
                    </ul>
                  </div>
                </div>
                <!-- END Widget -->
        <?php
    }

}

function my_categories_widget_register() {
    unregister_widget( 'WP_Widget_Categories' );
    register_widget( 'My_Categories_Widget' );
}

add_action( 'widgets_init', 'my_categories_widget_register' );

?>