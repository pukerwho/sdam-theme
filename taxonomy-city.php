<?php 
$current_cat_id = get_queried_object_id();

?>

<?php get_header(); ?>
  <div class="container py-8 xl:py-12">
    <h1 class="text-3xl xl:text-4xl mb-12">
      <?php 
      $term = get_term_by('slug', get_query_var('term'), 'city');
      if((int)$term->parent): ?>
        <?php $parent_term = get_term_by( 'id', $term->parent, 'city' ); ?>
        <?php echo $parent_term->name; ?>: <?php single_term_title(); ?>
      <?php else: ?>
        <?php single_term_title(); ?>
      <?php endif; ?>
    </h1>
    <div>
      <?php the_archive_description( '<div class="content">', '</div>' ); ?>
    </div>
    <div class="flex flex-wrap xl:-mx-10">
      <div class="w-full xl:w-2/3 xl:px-10 mb-20 xl:mb-0">
        <?php 
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
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="mb-6">
          <?php get_template_part('template-parts/place-item'); ?>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>

        <div class="b_pagination text-center">
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