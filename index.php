<?php get_header(); ?>

<div class="container py-8 xl:py-12">
  <h1 class="text-3xl xl:text-4xl mb-8">🧑‍🎨 <?php _e('Ідеї та поради для креативних людей', 'treba-wp'); ?></h1>
  <div class="flex flex-wrap -mx-4 mb-6">
    <?php 
    $categories = get_terms(array( 'taxonomy' => 'category', 'parent' => 0, 'hide_empty' => false,'meta_query' => array( array('key' => '_crb_category_top', 'value' => 'yes', 'compare' => '===')) ));
    foreach($categories as $category): ?>
      <div class="w-1/2 lg:w-1/4 px-4 mb-6 last-of-type:mb-0">
        <div class="relative">
          <a href="<?php echo get_term_link($category->term_id, 'category') ?>" class="absolute-link"></a>
          <?php 
            $r_photo_medium = wp_get_attachment_image_src(carbon_get_term_meta($category->term_id, 'crb_category_img'), 'medium'); 
            $r_photo_large = wp_get_attachment_image_src(carbon_get_term_meta($category->term_id, 'crb_category_img'), 'large'); 
            $r_photo_full = wp_get_attachment_image_src(carbon_get_term_meta($category->term_id, 'crb_category_img'), 'full'); 
          ?>
          <div class="h-[225px] lg:h-[295px]">
            <img srcset="<?php echo $r_photo_medium[0] ?> 767w, 
            <?php echo $r_photo_large[0] ?> 1280w,
            <?php echo $r_photo_full[0] ?> 1440w"
            sizes="(max-width: 767px) 767px,
            (max-width: 1280px) 1280px,
            1440px"
            src="<?php echo $r_photo_full[0] ?>" alt="" loading="lazy"
            class="w-full h-full object-cover rounded-lg"
            >
          </div>
          <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-transparent to-black/50 rounded"></div>
          <div class="w-full absolute bottom-4 text-xl text-white custom-font">
            <div class="text-center"><?php echo $category->name; ?></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <div class="flex flex-wrap lg:-mx-6 mb-16">
    <?php 
      $new_top_post = new WP_Query( array( 
        'post_type' => 'post', 
        'posts_per_page' => 2,
        'order' => 'DESC'
      ) );
      if ($new_top_post->have_posts()) : while ($new_top_post->have_posts()) : $new_top_post->the_post(); 
    ?>
      <div class="w-full lg:w-1/2 lg:px-6 mb-6 lg:mb-0 last-of-type:mb-0">
        <?php get_template_part("template-parts/home/top-posts"); ?>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
  
  <div class="flex flex-wrap xl:-mx-10">
    <div class="w-full xl:w-2/3 xl:px-10">
      <!-- БЛОГ -->
      <div class="mb-16">
        <h2 class="text-3xl mb-8">✍🏻 <?php _e('Нові записи', 'treba-wp'); ?></h2>
        <div class="mb-6">
          <?php 
            $new_posts = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 10,
              'offset' => 2,
            ) );
            if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
          ?>
            <div class="mb-8">
              <?php get_template_part('template-parts/post-item'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
        <div>
          <a href="<?php echo get_page_url('page-blog'); ?>" class="w-full block border-2 border-yellow-400 dark:border-gray-700 hover:bg-yellow-400 dark:hover:bg-gray-700 rounded-lg text-lg hover:text-black dark:hover:text-gray-200 text-center font-bold py-4"><?php _e("Всі записи", "treba-wp"); ?></a>
        </div>
      </div>
      <!-- END БЛОГ -->
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>