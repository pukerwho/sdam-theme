<?php 
get_header(); 

?>

<div class="container py-8 xl:py-12">
  <div class="flex flex-wrap xl:-mx-10">
    <div class="w-full xl:w-2/3 xl:px-10">
      <div class="mb-16">
        <h1 class="text-3xl mb-8">✍🏻 <?php the_archive_title(); ?></h1>
        <div class="mb-6">
          <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div class="mb-8">
              <?php get_template_part('template-parts/post-item'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div class="flex justify-between items-center prose-a:inline-block prose-a:bg-indigo-500 prose-a:text-gray-200 prose-a:rounded prose-a:px-6 prose-a:py-3">
          <?php posts_nav_link(); ?>	
        </div>
      </div>
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>