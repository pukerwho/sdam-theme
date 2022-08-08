<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="container py-8 xl:py-12">
  <h1 class="text-3xl xl:text-4xl mb-12"><?php the_title(); ?></h1>
  <div class="flex flex-wrap xl:-mx-10">
    <div class="w-full xl:w-2/3 xl:px-10">
      <div class="content bg-gray-100 dark:bg-gray-600 dark:text-gray-200 rounded-lg shadow-lg border-2 border-indigo-300 px-8 py-6 mb-6">
        <?php the_content(); ?>
      </div>
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>


<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>