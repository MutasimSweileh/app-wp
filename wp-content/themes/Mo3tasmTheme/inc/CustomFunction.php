<?php
if ( ! function_exists( 'mo3tasm_post_thumbnail' ) ) :
/**
 * Displays an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 *
 * Create your own twentysixteen_post_thumbnail() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function mo3tasm_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :

  $aut ='<div class="post-thumbnail">
		 the_post_thumbnail();
	</div>';

	 else :

	 $aut ='<a class="post-thumbnail" href="'.get_permalink().'" aria-hidden="true">
		 '.get_the_post_thumbnail().'
	</a>';

    endif; // End is_singular()

    return $aut;
}
endif;

if ( ! function_exists( 'mo3tasm_excerpt' ) ) :
	/**
	 * Displays the optional excerpt.
	 *
	 * Wraps the excerpt in a div element.
	 *
	 * Create your own mo3tasm_excerpt() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 *
	 * @param string $class Optional. Class string of the div element. Defaults to 'entry-summary'.
	 */
	function mo3tasm_excerpt( $class = 'entry-summary' ) {
		$class = esc_attr( $class );

		if ( has_excerpt() || is_search() ) : ?>
			<div class="<?php echo $class; ?>">
				<?php the_excerpt(); ?>
			</div><!-- .<?php echo $class; ?> -->
		<?php endif;
	}
endif;
function japanworm_shorten_title( $title ) {
     if(!is_single()  && !is_page() ){
     $newTitle = substr( $title, 0, 50 ); // Only take the first 20 characters
     return $newTitle . " &hellip;"; // Append the elipsis to the text (...)
         }else{
     return $newTitle   ;
         }
}
//add_filter( 'the_title', 'japanworm_shorten_title', 10, 1 );

function str_limit($title,$limit = 30,$echo=true){
  $newTitle = substr( $title, 0,$limit); // Only take the first 20 characters
  if(!$echo)
  return $newTitle . " &hellip;"; // Append the elipsis to the text (...)
  echo $newTitle . " &hellip;"; // Append the elipsis to the text (...)

}

if ( ! function_exists( 'mo3tasm_excerpt_more' ) && ! is_admin() ) :
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * Create your own mo3tasm_excerpt_more() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function mo3tasm_excerpt_more() {
    /*
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mo3tasm' ), get_the_title( get_the_ID() ) )
	);*/
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'mo3tasm_excerpt_more' );
endif;

function get_log_img(){
$custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
echo '<img src="'.$image[0].'" alt="'.get_bloginfo('name').'" />';
}

function new_excerpt_length($length) {
	return 30 ;
}
add_filter('excerpt_length', 'new_excerpt_length');






?>