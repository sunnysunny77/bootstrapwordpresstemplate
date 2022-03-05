<?php get_header() ?>

<main id="main" class="ms-3 me-3">

<h1 class="tex-sm-start text-md-end m-5"> <?php the_archive_title(); ?></h1>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post(); ?>

		<?php if (has_post_thumbnail()) {  ?> <div> <?php the_post_thumbnail(); ?> </div> <?php } ?>

		<h2 class="tex-sm-start text-md-end m-5">  <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>

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

<main>

<?php get_footer(); ?>