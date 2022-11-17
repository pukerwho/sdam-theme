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