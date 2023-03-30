<?php 
$current_cat_id = get_queried_object_id();
$current_page = !empty( $_GET['page'] ) ? $_GET['page'] : 1;
$query = new WP_Query( array( 
  'post_type' => 'places', 
  'posts_per_page' => 20,
  'order'    => 'DESC',
  'paged' => $current_page,
  'tax_query' => array(
    array(
      'taxonomy' => 'city',
      'terms' => $current_cat_id,
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    )
  ),
) );
$current_posts = get_posts(array(
  'post_type' => 'places',
  'numberposts' => -1,
  'orderby'     => 'date',
  'tax_query' => array(
    array(
      'taxonomy' => 'city',
      'terms' => $current_cat_id,
      'field' => 'term_id',
      'include_children' => true,
      'operator' => 'IN'
    )
  ),
));
?>

<?php get_header(); ?>
  <div class="container py-8 xl:py-12">
    <h1 class="text-3xl xl:text-4xl mb-10">
      <?php 
      $term = get_term_by('slug', get_query_var('term'), 'city');
      if((int)$term->parent): ?>
        <?php $parent_term = get_term_by( 'id', $term->parent, 'city' ); ?>
        <?php echo $parent_term->name; ?>: <?php single_term_title(); ?>
      <?php else: ?>
        <?php _e("Оренда квартир у м.", "treba-wp"); ?> <?php single_term_title(); ?>
      <?php endif; ?>
    </h1>
    <div>
      <?php the_archive_description( '<div class="content">', '</div>' ); ?>
    </div>
    <div class="flex flex-wrap xl:-mx-10">
      <div class="w-full xl:w-2/3 xl:px-10 mb-20 xl:mb-0">
        <?php if(!(int)$term->parent): ?>
        <table class="w-full border dark:border-gray-500 bg-gray-100 dark:bg-gray-700 table-auto mb-6">
          <tbody>
            <tr class="border-b border-gray-300 dark:border-gray-500">
              <td class="font-semibold whitespace-nowrap px-2 py-3">📒 <?php _e("Кількість оголошень", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3"><?php echo count($current_posts); ?></td>
            </tr>
            <tr class="border-b border-gray-300 dark:border-gray-500">
              <td class="font-semibold whitespace-nowrap px-2 py-3">⬇️ <?php _e("Найдешевша квартира", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3">
                <?php $get_min_price = get_city_min_price($query); echo $get_min_price; ?> <?php _e("грн/міс", "treba-wp"); ?>
              </td>
            </tr>
            <tr class="border-b border-gray-300 dark:border-gray-500">
              <td class="font-semibold whitespace-nowrap px-2 py-3">⬆️ <?php _e("Найдорожча квартира", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3">
                <?php $get_max_price = get_city_max_price($query); echo $get_max_price; ?> <?php _e("грн/міс", "treba-wp"); ?>
              </td>
            </tr>
            <tr class="border-b border-gray-300 dark:border-gray-500">
              <td class="font-semibold whitespace-nowrap px-2 py-3">💲 <?php _e("Середня вартість", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3">
                <?php $get_avarege_price = get_city_average_price($query); echo $get_avarege_price; ?> <?php _e("грн/міс", "treba-wp"); ?>
              </td>
            </tr>
            <tr class="border-b border-gray-300 dark:border-gray-500">
              <td class="font-semibold whitespace-nowrap px-2 py-3">🕒 <?php _e("Інформація оновлена", "treba-wp"); ?></td>
              <td class="whitespace-nowrap px-2 py-3"><?php echo date('d.m.Y',strtotime("-1 days")); ?></td>
            </tr>
          </tbody>
        </table>
        <div class="mb-8">
          <div class="mb-4">
            <?php if (get_locale() === 'uk'): ?>
              Оренда квартири в м.<?php single_term_title(); ?> ⏩ Зняти квартиру <?php single_term_title(); ?> ⭐ Великий вибір, актуальні ціни. 【Довгострокова оренда квартир】 <?php single_term_title(); ?>.
            <?php else: ?>
              Аренда квартиры в г.<?php single_term_title(); ?> ⏩ Снять квартиру <?php single_term_title(); ?> ⭐ Большой выбор, актуальные цены. 【Долгосрочная аренда квартир】<?php single_term_title(); ?>.
            <?php endif; ?>
          </div>
          <div class="text-gray-700 dark:text-gray-200 opacity-75"><?php _e("Переглядів", "treba-wp"); ?>: <?php echo termCount($current_cat_id); ?></div>
        </div>
        <?php endif; ?>
        <h2 class="text-2xl lg:text-3xl uppercase mb-6"><?php _e("Оголошення", "treba-wp"); ?>:</h2>
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="mb-6">
          <?php get_template_part('template-parts/place-item'); ?>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <div class="b_pagination text-center mb-12">
          <?php 
            $big = 9999999991; // уникальное число
            echo paginate_links( array(
              'format' => '?page=%#%',
              'total' => $query->max_num_pages,
              'current' => $current_page,
              'prev_next' => true,
              'next_text' => (''),
              'prev_text' => (''),
            )); 
          ?>
        </div>
        <div>
          <h2 class="text-2xl lg:text-3xl uppercase mb-6">
            <?php _e('Ціни на квартири', 'treba-wp'); ?>
          </h2>
          <table class="w-full border dark:border-gray-500 bg-gray-100 dark:bg-gray-700 table-auto mb-6">
            <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-gray-500 uppercase">
              <tr>
                <th class="text-left whitespace-nowrap px-2 py-3"><?php _e('Квартира', 'treba-wp'); ?></th>
                <th class="text-left whitespace-nowrap px-2 py-3"><?php _e('Ціна', 'treba-wp'); ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach (array_slice($current_posts, 0,5) as $post): ?>
              <tr class="border-b border-gray-300 dark:border-gray-500">
                <td class="whitespace-nowrap px-2 py-3"><?php echo $post->post_title; ?></td>
                <td class="whitespace-nowrap px-2 py-3"><?php echo carbon_get_the_post_meta('crb_places_price'); ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <?php 
        $seoText = carbon_get_term_meta($current_cat_id, 'crb_city_seo_text');
        if ($seoText && $current_page < 2): ?>
          <div class="content сity-content bg-gray-100 dark:bg-gray-600 dark:text-gray-200 rounded-lg shadow-lg border-2 border-indigo-300 px-4 lg:px-8 py-4 lg:py-6 mt-12">
            <?php echo apply_filters( 'the_content', $seoText  ); ?>
          </div>
        <?php endif; ?>
      </div>
      <div class="w-full xl:w-1/3 xl:px-10">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>