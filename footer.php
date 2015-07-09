<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>

</div><!-- .site-content -->
</div><!-- #content -->

<aside class="col-sm-3 col-lg-2 sidebar-left col-sm-pull-9 col-lg-pull-10">

  <!--Primary menu-->
  <div class="nav-primary">
    <nav id="menu_mobile">
      <?php wp_nav_menu( array(
        'container'  => 'ul',
        'menu_class' => 'main-menu clearfix',
        'menu_id'    => 'primary',
        'menu'       => 'Primary'
      ) );
      ?>
    </nav>
  </div>
  <?php if ( is_front_page() ) { ?>
    <div class="sidebar sidebar-outer">
      <?php dynamic_sidebar( 'sidebar-outer' ); ?>
    </div>
  <?php } ?>

</aside>


<footer class="site-footer clearfix">
  <div class="copyright clearfix">
    <div class="col-sm-8">
      <?php _e( 'Copyright &copy; ' );
      echo date( Y );
      _e( ' Vino Artino. All rights reserved.' ); ?>
    </div>
    <div class="col-sm-4" align="right">
      <a href="http://www.graphicsbycindy.com/" target="_blank">Houston Web Design</a> - Graphics by Cindy
    </div>
  </div>
</footer><!-- .site-footer -->

</div><!-- .row -->
</div><!-- .container -->

</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>
