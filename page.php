<?php get_header() ?>

<div id="page" class="content-area col-sm-12 col-lg-8 mx-auto">

	<h1><?php the_title(); ?></h1>

	<p class="text-center"><?php the_content(); ?></p>

	<?php dynamic_sidebar("widget"); ?>
</div>

<?php get_footer() ?>