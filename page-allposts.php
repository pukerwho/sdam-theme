<?php
/*
Template Name: БЛОГ
*/
?>

<?php get_header(); ?>

<div class="space-top">
  <div class="mb-20 py-10 xl:py-20">
    <div class="container">
      <h1 class="text-3xl xl:text-4xl xl:leading-12 text-center font-title mb-6 treba-animate fade-up"><?php _e("Наш блог", "treba-wp"); ?></h1>
      <div class="flex items-center justify-center opacity-75 -mx-2 mb-10 treba-animate fade-up">
        <div class="bg-primary w-6 h-[1px] px-2"></div>
        <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
        <div class="bg-primary w-6 h-[1px] px-2"></div>
      </div>
      <div class="flex flex-wrap -mx-6">
        <?php 
          global $wp_query, $wp_rewrite;  
          $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

          $posts_list = new WP_Query( array( 
            'post_type' => 'post', 
            'posts_per_page' => 9,
            'order'    => 'DESC',
            'paged' => $current,
          ) );
        if ($posts_list->have_posts()) : while ($posts_list->have_posts()) : $posts_list->the_post(); ?>
          <div class="w-full xl:w-1/3 xl:min-w-[250px] px-6 mb-12">
            <?php echo get_template_part('template-parts/components/blog-card'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>

      <div class="pagination flex items-center justify-center -mr-3">
        <?php 
          $big = 9999999991; // уникальное число
          echo paginate_links( array(
            'format'  => 'page/%#%',
            'total' => $posts_list->max_num_pages,
            'current' => $current,
            'prev_next' => true,
            'next_text' => ('>'),
            'prev_text' => ('<'),
          )); 
        ?>
      </div>

    </div>
  </div>
</div>

<?php get_footer(); ?>