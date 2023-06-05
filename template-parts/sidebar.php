<?php if ( !is_singular('post') && ( !is_category() ) ): ?>
<div class="bg-gray-100 dark:bg-gray-700 shadow-lg rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Зараз читають", "treba-wp"); ?></div>
  <div>
    <?php 
      $now_posts = new WP_Query( array( 
        'post_type' => 'post', 
        'posts_per_page' => 5,
        'orderby'        => 'rand',
      ) );
      if ($now_posts->have_posts()) : while ($now_posts->have_posts()) : $now_posts->the_post(); 
    ?>
      <div class="relative flex items-center mb-6 last:mb-0">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div class="mr-4">          
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" class="w-[40px] min-w-[60px] h-[40px] min-h-[60px] object-cover rounded-lg"> 
        </div>
        <div>
          <div class="mb-1"><?php the_title(); ?></div>
          <div class="text-sm opacity-75"><?php _e("Переглядів", "treba-wp"); ?>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
        </div>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>
<?php endif; ?>

<div class="bg-gray-100 dark:bg-gray-700 shadow-lg rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Рейтинг міст", "treba-wp"); ?></div>
  <div>
    <?php 
    $index = 1;
    $categories = get_terms(array( 'taxonomy' => 'city', 'parent' => 0, 'meta_key' => 'meta_city_rating',
   'orderby' => 'meta_value', 'order' => 'DESC' ));
    foreach($categories as $category): ?>
      <div class="relative text-lg hover:text-indigo-500 mb-2">
        <a href="<?php echo get_term_link($category->term_id, 'city') ?>" class="absolute-link"></a>
        <div class="flex items-center justify-between">
          <div class="flex items-center mr-2">
            <div class="w-min-[20px] w-[20px] h-min-[20px] h-[20px] flex items-center justify-center text-sm opacity-75 bg-gray-400/40 rounded p-1 mr-2"><?php echo $index; ?></div>
            <div class=""><?php echo $category->name; ?></div>
          </div>
          <div class="text-sm opacity-75">
            <?php echo get_term_meta( $category->term_id, "meta_city_rating", true ); ?> / 100
          </div>
        </div>
        
      </div>

    <?php $index++; endforeach; ?>
  </div>
</div>

<div class="bg-gray-100 dark:bg-gray-700 shadow-lg rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Нові записи", "treba-wp"); ?></div>
  <div>
    <?php 
      $new_posts = new WP_Query( array( 
        'post_type' => 'post', 
        'posts_per_page' => 5,
      ) );
      if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
    ?>
      <div class="relative flex items-center mb-6 last:mb-0">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div class="mr-4">
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" class="w-[40px] min-w-[60px] h-[40px] min-h-[60px] object-cover rounded-lg"> 
        </div>
        <div>
          <div class="mb-1"><?php the_title(); ?></div>
          <div class="text-sm opacity-75"><?php _e("Переглядів", "treba-wp"); ?>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
        </div>
      </div>
    <?php endwhile; endif; wp_reset_postdata(); ?>
  </div>
</div>
