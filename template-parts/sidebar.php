<?php if ( is_tax( 'city' ) ): ?>
  <div class="bg-gray-100 dark:bg-gray-700 shadow-lg  rounded border-t-4 border-t-indigo-500 p-4 mb-12">
    <div class="text-xl uppercase font-bold mb-4"><?php _e("Райони у місті", "treba-wp"); ?></div>
    <div>
      <?php 
        $districts_array = [];
        $districts = carbon_get_term_meta(get_queried_object_id(), 'crb_city_district'); 
        foreach($districts as $district) {
          $district_id = $district['id'];
          array_push($districts_array, $district_id);
        }
      ?>
      <?php $districts_terms = get_terms(array(
        'taxonomy' => 'district',
        'include' => $districts_array,
      )) ?>
      <?php foreach($districts_terms as $districts_term): ?>
        <div class="relative text-lg mb-2">
          <a href="<?php echo get_term_link($districts_term->term_id, 'district') ?>" class="absolute-link"></a>
          <div>👉 <span class=""><?php echo $districts_term->name; ?></span></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
<?php endif; ?>

<div class="bg-gray-100 dark:bg-gray-700 shadow-lg rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Популярні пропозиції", "treba-wp"); ?></div>
  <div>
    <?php 
      $new_posts = new WP_Query( array( 
        'post_type' => 'places', 
        'posts_per_page' => 5,
        'meta_key' => 'post_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
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

<div class="bg-gray-100 dark:bg-gray-700 shadow-lg  rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Міста", "treba-wp"); ?></div>
  <div>
    <?php 
    $categories = get_terms(array( 'taxonomy' => 'city', 'parent' => 0 ));
    foreach($categories as $category): ?>
      <div class="relative text-lg mb-2">
        <a href="<?php echo get_term_link($category->term_id, 'city') ?>" class="absolute-link"></a>
        <div>➡️ <span class=""><?php echo $category->name; ?></span></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php if ( !is_tax( 'city' ) ): ?>
<div class="bg-gray-100 dark:bg-gray-700 shadow-lg  rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Популярні райони", "treba-wp"); ?></div>
  <div>
    <?php 
    $categories = get_terms(array( 'taxonomy' => 'district' ));
    foreach($categories as $category): ?>
      <div class="relative text-lg mb-2">
        <a href="<?php echo get_term_link($category->term_id, 'district') ?>" class="absolute-link"></a>
        <div>👉 <span class=""><?php echo $category->name; ?></span></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php endif; ?>

<?php if( is_front_page() ): ?>
<div class="bg-gray-100 dark:bg-gray-700 shadow-lg  rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Корисні сайти", "treba-wp"); ?></div>
  <div>
    <div class="relative text-lg mb-2">
      <a href="https://akvalekar.com/ru/protochnye-ionizatory-vody/" class="absolute-link"></a>
      <div>🔗 <span class="">Проточные ионизаторы воды</span></div>
    </div>
    <div class="relative text-lg mb-2">
      <a href="https://midsun-aroma.com/ru/aromatizaciya-meropriyatij" class="absolute-link"></a>
      <div>🔗 <span class="">Ароматизация мероприятий</span></div>
    </div>
  </div>
</div>
<?php endif; ?>