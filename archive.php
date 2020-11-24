<?php get_header() ?>

<div id="archive" class="content-area col-sm-12 col-lg-8 mx-auto">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

			<h1><?php the_title(); ?></h1>

			<?php the_field("") ?>

			<?php echo get_the_date(); ?>

			<?php the_time(); ?>

			<?php the_author(); ?><br />

			<?php the_excerpt(); ?>

			<?php comments_popup_link(); ?>.

		<?php endwhile; ?>

	<?php endif; ?>

	<?php wp_pagenavi(); ?>

</div>

<?php get_footer() ?>