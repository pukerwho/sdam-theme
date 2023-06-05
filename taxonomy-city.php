<?php 
$current_cat_id = get_queried_object_id();
?>


<?php get_header(); ?>
  <div class="container py-8 xl:py-12">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
      <ul class="flex items-center flex-wrap -mr-4">
        <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
          <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-200">
            <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
          </a>                        
          <meta itemprop="position" content="1">
        </li>
        <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
          <a itemprop="item" href="<?php echo get_page_url('page-cities'); ?>" class="text-indigo-400 dark:text-indigo-200">
            <span itemprop="name"><?php _e( 'Міста', 'treba-wp' ); ?></span>
          </a>                        
          <meta itemprop="position" content="2">
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
          <span itemprop="name"><?php single_term_title(); ?></span>
          <meta itemprop="position" content="3" />
        </li>
      </ul>
    </div>
    <!-- END Breadcrumbs -->

    <!-- Title -->
    <h1 class="text-3xl xl:text-4xl mb-6"><?php _e("Рейтинг міста", "treba-wp"); ?> <?php single_term_title(); ?></h1>
    <!-- END Title -->
    
    <!-- Meta -->
    <div class="mb-12">
      <div class="flex items-center mb-4">
        <div class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
          </svg>
        </div>
        <div ><?php _e("Оновлено", "treba-wp"); ?>: <span class="text-gray-700 underline"><?php echo  date('d.m.Y',strtotime("-1 days")); ?></span></div>
      </div>
      <div class="flex items-center mb-4">
        <div class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
          </svg>
        </div>
        <div ><?php _e("Переглядів", "treba-wp"); ?>: <span class="text-gray-700 opacity-75"><?php echo termCount($current_cat_id); ?></span></div>
      </div>
    </div>
    <!-- END Meta -->

    <div class="flex flex-wrap xl:-mx-10">
      
      <div class="w-full xl:w-2/3 xl:px-10 mb-20 xl:mb-0">
        <!-- Main -->
        <div class="lg:shadow-xl lg:rounded-xl lg:border border-gray-200 lg:p-8">
          <h2 class="text-2xl lg:text-3xl uppercase mb-6"><?php _e("Оцінки", "treba-wp"); ?>:</h2>
          <div class="overflow-x-auto bg-white border border-gray-300 mb-12">
            <table class="w-full table-auto">
              <tbody>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>⭐️ <?php _e("Загальний рейтинг", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      // $rand_lang_array = ["Українська", "Російська"]; 
                      // $rand_value = $rand_lang_array[array_rand($rand_lang_array, 1)];
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>👍 <?php _e("Оцінка якості життя", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_life', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>💵 <?php _e("Ціни", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_price', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>📡 <?php _e("Якість інтернету", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_internet', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>😝 <?php _e("Розваги", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_fun', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>👮‍♀️ <?php _e("Безпека", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_safety', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>👶 <?php _e("Дитячі садочки", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_kids', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>📚 <?php _e("Школи", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_schools', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>🎓 <?php _e("Університети", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_univer', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>⚽ <?php _e("Спорт", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_sport', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>🚦 <?php _e("Затори", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_trafic', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
                <tr class="border-b border-gray-300 last:border-transparent">
                  <td class="whitespace-nowrap px-4 py-3">
                    <div>🚎 <?php _e("Громадський транспорт", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-4 py-3">
                    <?php 
                      $rand_value = random_int(60,90);
                      $get_rating_meta = meta_city($current_cat_id, 'meta_city_rating_bus', $rand_value);
                      echo $get_rating_meta; 
                    ?> / 100
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Переваги -->
          <div class="mb-12">
            <h2 class="text-2xl lg:text-3xl uppercase mb-6"><?php _e("Переваги", "treba-wp"); ?>:</h2>
            <div>
              <?php 
                $rand_array = ["Yes", "No"]; 
                $items = [
                  [
                    "key" => "meta_city_pros_safety",
                    "name" => "Безпека",
                  ],
                  [
                    "meta" => "meta_city_pros_internet",
                    "name" => "Швидкий інтернет",
                  ],
                  [
                    "meta" => "meta_city_pros_places",
                    "name" => "Багато цікавих місць",
                  ],
                  [
                    "meta" => "meta_city_pros_air",
                    "name" => "Якість повітря",
                  ],
                  [
                    "meta" => "meta_city_pros_friends",
                    "name" => "Легко заводити друзів",
                  ],
                  [
                    "meta" => "meta_city_pros_health",
                    "name" => "Чудові лікарні",
                  ],
                ];
                foreach ($items as $item) {
                  $rand_value = $rand_array[array_rand($rand_array, 1)];
                  $get_value = meta_city($current_cat_id, $item["meta"], $rand_value);
                  if ($get_value === "Yes") {
                    echo "<div>✅ ".$item["name"]."</div>";
                  }
                }
              ?>
            </div>
          </div>
          <!-- End Переваги -->

          <!-- Недоліки -->
          <div class="mb-12">
            <h2 class="text-2xl lg:text-3xl uppercase mb-6"><?php _e("Недоліки", "treba-wp"); ?>:</h2>
            <div>
              <?php 
                $rand_array = ["Yes", "No"]; 
                $items = [
                  [
                    "key" => "meta_city_cons_green",
                    "name" => "Мало зелених зон",
                  ],
                  [
                    "meta" => "meta_city_cons_house",
                    "name" => "Дороге житло",
                  ],
                  [
                    "meta" => "meta_city_cons_roads",
                    "name" => "Небезпечно на дорогах",
                  ],
                  [
                    "meta" => "meta_city_cons_parking",
                    "name" => "Проблеми з паркуванням",
                  ],
                  [
                    "meta" => "meta_city_cons_water",
                    "name" => "Погана якість води",
                  ],
                ];
                foreach ($items as $item) {
                  $rand_value = $rand_array[array_rand($rand_array, 1)];
                  $get_value = meta_city($current_cat_id, $item["meta"], $rand_value);
                  if ($get_value === "Yes") {
                    echo "<div>❌ ".$item["name"]."</div>";
                  }
                }
              ?>
            </div>
          </div>
          <!-- End Недоліки -->

          <!-- Райони -->
          <div class="mb-12">
            <h2 class="text-2xl lg:text-3xl uppercase mb-6"><?php _e("Райони", "treba-wp"); ?>:</h2>
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
              <?php if (empty($districts_array)): ?>
                <div>🙈 <?php _e("Райони ще не додані", "treba-wp"); ?></div>
              <?php else: ?>
                <?php $districts_terms = get_terms(array(
                  'taxonomy' => 'district',
                  'include' => $districts_array,
                )) ?>
                
                <?php foreach($districts_terms as $districts_term): ?>
                  <div class="relative text-lg hover:text-indigo-500 mb-2">
                    <a href="<?php echo get_term_link($districts_term->term_id, 'district') ?>" class="absolute-link"></a>
                    <div>👉 <span class=""><?php echo $districts_term->name; ?></span></div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
          <!-- END Райони -->
        </div>
      </div>
      <div class="w-full xl:w-1/3 xl:px-10">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>