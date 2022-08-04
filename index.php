<?php get_header(); ?>

<div class="container py-8 xl:py-12">
  <h1 class="text-3xl xl:text-4xl mb-12"><?php _e('Довгострокова оренда квартир у Києві', 'treba-wp'); ?></h1>
  <div class="flex flex-wrap xl:-mx-10">
    <div class="w-full xl:w-2/3 xl:px-10">
      <div class="flex items-center -mx-2 mb-8">
        <div class="px-2">
          <div class="bg-gray-200 hover:bg-yellow-100 dark:bg-gray-600 hover:dark:bg-gray-700 rounded cursor-pointer px-4 py-2"><?php _e("Нові", "treba-wp"); ?></div>
        </div>
        <div class="px-2">
          <div class="bg-gray-200 hover:bg-yellow-100 dark:bg-gray-600 hover:dark:bg-gray-700 rounded cursor-pointer px-4 py-2"><?php _e("Популярні", "treba-wp"); ?></div>
        </div>
      </div>
      <div>
        <?php 
          $new_posts = new WP_Query( array( 
            'post_type' => 'places', 
            'posts_per_page' => 10,
          ) );
          if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
        ?>
          <div class="mb-6">
            <?php get_template_part('template-parts/place-item'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>