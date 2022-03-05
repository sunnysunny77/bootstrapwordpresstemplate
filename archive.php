<?php get_header() ?>

<h1><?php the_archive_title(); ?></h1>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

		<h2> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>

		<?php the_excerpt(); ?>

		<p>
			By:&nbsp;
			<?php the_author(); ?>
			,
			<?php echo get_the_date(); ?>
			,
			<?php the_time(); ?>
		</p>

		<p>

			Comments:

			<?php comments_popup_link(); ?>

		</p>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>