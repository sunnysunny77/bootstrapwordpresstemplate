    </main>

    <footer >

      <?php wp_nav_menu(
        array(
          'menu' => 'Footer Navigation',
          'container'  => 'ul',
          'menu_class' => 'col-sm-5',
          'items_wrap' => '<ul id="%1$s" class="%2$s"><li>links</li>%3$s</ul>',)
      );?>
          

      <ul class="col-sm-7">

        <li>&copy;</li>
        <?php dynamic_sidebar("widget_one"); ?>

	    </ul>

    </footer>

    <?php wp_footer(); ?>
    
</body>

</html>

