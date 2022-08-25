<?php get_header(); ?>

<div class="container py-8 xl:py-12">
  <h1 class="text-3xl xl:text-4xl mb-8">🏠 <?php _e('Сайт про нерухомість в Україні', 'treba-wp'); ?></h1>
  <div class="citycards flex flex-nowrap md:flex-wrap overflow-x-scroll md:overflow-x-auto -mx-2 mb-16">
    <?php 
    $cities = get_terms(
      array( 
        'taxonomy' => 'city',
        'meta_query' => array(
          array(
            'key'       => '_crb_city_img',
            'value' => '',
            'compare' => '!=',
          )
        )
      )
    );
    shuffle( $cities );
    foreach($cities as $city): ?>
      <div class="citycard w-1/2 min-w-[200px] xl:w-1/5 mb-4 px-2">
        <div class="relative">
          <a href="<?php echo get_term_link($city->term_id, 'city') ?>" class="absolute-link"></a>
          <div>
            <img src="<?php echo carbon_get_term_meta($city->term_id, 'crb_city_img' ); ?>" alt="<?php echo $city->name ?>" loading="lazy" class="w-full h-72 object-cover rounded-lg">
          </div>
          <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b to-black/90 from-transparent rounded-lg"></div>
          <div class="w-full absolute bottom-4 left-0">
            <div class="text-xl text-white text-center"><?php echo $city->name; ?></div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
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
      <div>
        <h2 class="text-3xl mb-8">🏛️ <?php _e('Довгострокова оренда квартир в Україні', 'treba-wp'); ?></h2>
        <div class="flex items-center -mx-2 mb-8">
          <div class="px-2">
            <div class="tab-btn btn-primary cursor-pointer px-4 py-2" data-tab="new"><?php _e("Нові", "treba-wp"); ?></div>
          </div>
          <div class="px-2">
            <div class="tab-btn btn-secondary cursor-pointer px-4 py-2" data-tab="popular"><?php _e("Популярні", "treba-wp"); ?></div>
          </div>
        </div>
        <div class="tab-content" data-tab="new">
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
        <div class="tab-content hidden" data-tab="popular">
          <?php 
            $new_posts = new WP_Query( array( 
              'post_type' => 'places', 
              'posts_per_page' => 10,
              'meta_key' => 'post_count',
              'orderby' => 'meta_value_num',
              'order' => 'DESC'
            ) );
            if ($new_posts->have_posts()) : while ($new_posts->have_posts()) : $new_posts->the_post(); 
          ?>
            <div class="mb-6">
              <?php get_template_part('template-parts/place-item'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>