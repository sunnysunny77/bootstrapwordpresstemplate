<?php get_header() ?>

<div id="archive" class="content-area col-sm-12 col-lg-8 mx-auto">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

			<h1><?php the_title(); ?></h1>

			<p><?php the_field("bp") ?></p>

			<?php echo get_the_date( ); ?> <!-- Date published -->
			<?php the_time(); ?>  <!-- Time published -->
			<?php  the_author(); ?><br /> <!-- Author of the post -->

			<?php the_excerpt(); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</div>

<?php get_footer() ?>