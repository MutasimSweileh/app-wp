
<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
   <div class="col-md-4 <?=($rightslide?"col-md-pull-8":"")?>">
   <aside class="widgets">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</aside><!-- .sidebar .widget-area -->
    </div>
<?php endif;  ?>
