<?php
/*
Template Name: БЛОГ
*/
?>
<?php get_header(); ?>

<div class="container py-8 xl:py-12">
  <div class="flex flex-wrap xl:-mx-10">
    <div class="w-full xl:w-2/3 xl:px-10">
      <div class="mb-16">
        <h2 class="text-3xl mb-8">✍🏻 <?php _e('Всі статті', 'treba-wp'); ?></h2>
        <div class="mb-6">
          <?php 
          global $wp_query, $wp_rewrite;  
          $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
          $blogs = new WP_Query( array(
            'post_type' => 'post',
            'orderby' => 'date',
            'paged' => $current,
            'posts_per_page' => 10,
          ));
          if ($blogs->have_posts()) : while ($blogs->have_posts()) : $blogs->the_post(); ?>
            <div class="mb-8">
              <?php get_template_part('template-parts/post-item'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div class="pagination flex justify-center items-center flex-wrap">
          <?php 
            $big = 9999999991; // уникальное число
            echo paginate_links( array(
              'format'  => 'page/%#%',
              'total' => $blogs->max_num_pages,
              'current' => $current,
              'prev_next' => true,
              'next_text' => (''),
              'prev_text' => (''),
            )); 
          ?>
        </div>
      </div>
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>