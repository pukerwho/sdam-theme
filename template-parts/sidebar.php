<?php if ( is_tax( 'city' ) ): ?>

  <div class="bg-gray-100 dark:bg-gray-700 shadow-lg  rounded border-t-4 border-t-indigo-500 p-4 mb-12">
    <div class="text-xl uppercase font-bold mb-4"><?php _e("Райони", "treba-wp"); ?></div>
    <div>
      <?php 
        $taxonomyName = "city";
        $term = get_term_by('slug', get_query_var('term'), $taxonomyName);
        
        $districts_array = [];

        if((int)$term->parent) {
          $parent_term = get_term( $term->parent, $taxonomyName );
          $get_tax_id = $parent_term->term_id; 
        } else {
          $get_tax_id = get_queried_object_id();
        }

        $districts = carbon_get_term_meta($get_tax_id, 'crb_city_district'); 
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

  <div class="bg-gray-100 dark:bg-gray-700 shadow-lg  rounded border-t-4 border-t-indigo-500 p-4 mb-12">
    <div class="text-xl uppercase font-bold mb-4"><?php _e("Підкатегорії", "treba-wp"); ?></div>
    <?php 
    if((int)$term->parent) {
      $parent_term = get_term( $term->parent, $taxonomyName );
      $parent_id = $parent_term->term_id; 
    } else {
      $parent_id = get_queried_object_id();
    }
    $child_terms = get_terms($taxonomyName, array('parent' => $parent_id, 'hide_empty' => false ));
    foreach ( $child_terms as $child ): ?>
      <div class="relative text-lg mb-2">
        <a href="<?php echo get_term_link( $child ); ?>" class="absolute-link"></a>
        <div>🔺 <span class=""><?php echo $child->name ?></span></div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<div class="bg-gray-100 dark:bg-gray-700 shadow-lg rounded border-t-4 border-t-indigo-500 p-4 mb-12">
  <div class="text-xl uppercase font-bold mb-4"><?php _e("Зараз переглядають", "treba-wp"); ?></div>
  <div>
    <?php 
      $popular_places = new WP_Query( array( 
        'post_type' => 'places', 
        'posts_per_page' => 5,
        'orderby'        => 'rand',
        // 'meta_key' => 'post_count',
        // 'orderby' => 'meta_value_num',
      ) );
      if ($popular_places->have_posts()) : while ($popular_places->have_posts()) : $popular_places->the_post(); 
    ?>
      <div class="relative flex items-center mb-6 last:mb-0">
        <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
        <div class="mr-4">
          <!-- PLACE THUMB -->
          <?php if (get_locale() === 'uk'): ?>
            <?php 
            $files = get_attached_media('image', get_the_ID());
            if ($files): ?> 
              <?php foreach (array_slice($files,0,1) as $file): ?>
                <img src="<?php echo wp_get_attachment_image_src($file->ID, 'medium')[0]; ?>" loading="lazy" class="w-[40px] min-w-[60px] h-[40px] min-h-[60px] object-cover rounded-lg"> 
              <?php endforeach; ?>
            <?php else: ?>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[40px] min-w-[60px] h-[40px] min-h-[60px]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
              </svg>
            <?php endif; ?>
          <?php endif; ?>

          <?php if (get_locale() === 'ru_RU'): ?>
            <?php 
            $images_array = carbon_get_the_post_meta('crb_array_images'); 
            $images_array = json_decode($images_array, true);
            if ($images_array): ?>
              <?php foreach (array_slice($images_array,0,1) as $i_ru): ?>
                <img src="<?php echo $i_ru; ?>" loading="lazy" class="w-[40px] min-w-[60px] h-[40px] min-h-[60px] object-cover rounded-lg"> 
              <?php endforeach; ?>
            <?php else: ?>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-[40px] min-w-[60px] h-[40px] min-h-[60px]">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
              </svg>
            <?php endif; ?>
          <?php endif; ?>
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