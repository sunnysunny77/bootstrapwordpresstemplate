<?php get_header() ?>

	<main id="main" class="ps-3 pe-3 container mx-auto">

		<h1 class="text-md-end m-5"> <?php the_archive_title(); ?></h1>

		<?php if (have_posts()) { ?>

			<?php while (have_posts())  { the_post(); ?>

				<?php if (has_post_thumbnail()) {  echo '<div role="img" aria-label="post_thumbnail" style="background-image: url(' . get_the_post_thumbnail_url() . ');"></div>'; } ?>

				<h2 class="text-md-end m-5">  <a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>

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

			<?php } ?>

		<?php } ?>

	<main>

<?php get_footer(); ?>