<?php get_header() ?>

	<section id="archive" class="content-area col-sm-12 col-lg-8 mx-auto">

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
				
				<br>
				<br>
				<br>

			<?php endwhile; ?>

		<?php endif; ?>

	</section>

<?php get_footer(); ?>