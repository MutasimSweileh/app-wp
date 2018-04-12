<?php
get_header();
if(!get_theme_mod("penci_post_box")){
?>

        <section class="featuredBlogs">
          <div class="container">
             <?php
			// Start the loop.
             $outbut = "";
             $outbut4 = "";
             $outbut23 = "";
             $outbut1 = "";
             $num = 0;
             if ( have_posts() ) :
		      while ( have_posts() ) : the_post();
                  $num++;
                  if($num > 4)
                  break;

            $content = get_the_content();
           $content =  substr($content, 0, 200);

            $outbut =' '.($num==4?"<article class='featuredBlog__vertical'>":"").'
            <article class="featuredBlog">
              <div class="featuredBlog--img">
                   '.get_the_post_thumbnail().'
              </div>
              <div class="featuredBlog--overlay gradient-'.$num.'"></div>
              <div class="featuredBlog--content">
                <time class="featuredBlog--time"><span>'.get_the_time( 'd').'</span>'.get_the_time( 'F').'</time>
                <h3 class="featuredBlog--title"><a href="'.get_permalink().'">'.str_limit(the_title("","",false),60,false).'</a></h3>
                <p class="featuredBlog--desc">'.$content.'</p>
              </div>
              <a href="'.get_permalink().'" class="featuredBlog--link">Continue reading<i class="flaticon-fast-forward-button"></i></a>
            </article>
            '.($num==4?"</article>":"").'
              ';
            if($num == 1){
             $outbut1 = $outbut;
             }else if($num == 4){
             $outbut4 = $outbut;
             }else {
             $outbut23 .= $outbut;
             }
		    	endwhile;
		        endif;
		      ?>
            <?=$outbut1?>
            <div class="row">

              <div class="col-md-8">
                 <?=$outbut23?>
              </div>

              <div class="col-md-4">
                <?=$outbut4?>

               

              </div>

            </div>
          </div>
        </section>
  <?php } ?>
        <!-- END Featured Blogs -->

        <div class="container insideSidebar">
          <div class="row">

            <div class="col-md-8 <?=($rightslide?"col-md-pull-4":"")?>">
              <section class="bigBlogs">
              <?php if ( have_posts() ) : ?>
               <?php
			// Start the loop.
		     	while ( have_posts() ) : the_post();  ?>
                <!-- START BLOG BIG -->
                <article class="<?=($gridBlog?"gridBlog":"blogBig")?> primaryContent"  id="post-<?php the_ID(); ?>" >
                  <div class="blogBig__img">
                    <?php echo mo3tasm_post_thumbnail();?>
                  </div>
                  <div class="blogBig__info">
                    <div class="blogBig__meta">
                     <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                     <div class="clear"></div>
                      <div class="fl">
                        <ul class="blogBig__meta--statics">
                          <li><i class="flaticon-people"></i> <?php the_author_posts_link(); ?></li>

                          <li><i class="flaticon-big-brochure"></i><a href="#"><?php the_category( ', ' ); ?></a></li>
                        </ul>
                      </div>
                      <div class="fr">
                        <ul class="blogBig__meta--statics">
                          <li><i class="flaticon-heart"></i>500</li>
                          <li><i class="flaticon-medical"></i>1,280</li>
                        </ul>
                      </div>
                    </div>
                     <div class="clear"></div>
                    <p>
                    <?php the_excerpt(); ?>
                    </p>
                     <div class="clear"></div>
                    <div class="btn_more fr" >
                    <a href="<?php the_permalink() ?>" class="button">Continue reading</a>
                       </div>
                    <div class="clear"></div>
                  </div>
                   <div class="clear"></div>
                </article>
                <!-- END BLOG BIG -->
            <?php	// End the loop.
			endwhile;
          // If no content, include the "No posts found" template.
	    	else :
			//get_template_part( 'template-parts/content', 'none' );

		 endif;
		?>

              </section>

              <!-- START PAGINATION -->
              <?php

           // Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
				'next_text'          => __( 'Next page', 'twentysixteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
			));

              ?>

              <div aria-label="Page navigation "  class="center">
                <ul class="pagination">
                  <li>
                    <a href="#" aria-label="Previous">
                      <span aria-hidden="true">السابق</span>
                    </a>
                  </li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li>
                    <a href="#" aria-label="Next">
                      <span aria-hidden="true">التالي</span>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- END PAGINATION -->

            </div>

            <?php get_sidebar();  ?>
            </div>
            </div>



<?php get_footer(); ?>
