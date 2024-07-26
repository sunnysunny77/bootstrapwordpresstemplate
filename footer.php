    <footer class="container d-flex">
    
        <?php if ( has_nav_menu( 'footer-nav' ) ) {
            wp_nav_menu(array(
                'theme_location'    => 'footer-nav',
                'depth'             => 2,
                'container'         => 'ul',
                'container_id'      => 'footer-nav',
                'menu_class'        => 'col-sm-5 list-unstyled',
                'items_wrap' => '<ul id="%1$s" class="%2$s"><li>links</li>%3$s</ul>'
                )
            ); 
        }?>

        <ul class="col-sm-7 text-end list-unstyled">

            <li>

                <i class="fa-regular fa-copyright"></i>

            </li>
            
            <?php dynamic_sidebar("widget_one"); ?>

	    </ul>
  
    </footer>

    <?php wp_footer(); ?>
    
</body>

</html>

