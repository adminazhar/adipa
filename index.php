<?php get_header(); ?>
<main class="container-xl py-4 main-page">
	<div class="row">
		<div class="col-xl-12 ps-xl-4 pe-xl-3">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php include get_template_directory() . '/includes/postcard.php'; ?>
			<?php endwhile; ?>
			<?php else : ?>
				<?php echo '<p>There are no posts!</p>'; ?>
			<?php endif; ?>
			<?php pagenavi(); ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>