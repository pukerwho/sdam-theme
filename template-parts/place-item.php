<div class="relative shadow-xl rounded-xl border border-gray-200 p-4 lg:p-8">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="mb-4">
    <?php 
      $city_terms = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
      foreach (array_slice($city_terms, 0,1) as $city_term):
      ?>
        <?php if ($city_term): ?>
          <a href="<?php echo get_term_link($city_term); ?>" class="text-indigo-500 hover:text-indigo-500 hover:border-b-2 hover:border-indigo-500 font-semibold">#<?php echo $city_term->name; ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
  </div>
  <div class="text-2xl font-bold mb-4"><?php the_title(); ?></div>
  <div class="flex flex-col lg:flex-row lg:-mx-2 mb-4">
    <div class="w-full lg:w-1/2 lg:px-2 mb-4 lg:mb-0">
      <?php 
        $attimages = get_attached_media('image', $currentId);
        foreach (array_slice($attimages, 0, 1) as $image): 
      ?>
      <div>
        <img src="<?php echo wp_get_attachment_image_src($image->ID, 'medium')[0]; ?>" loading="lazy" class="w-full h-full object-cover bg-custom-gray dark:bg-dark-xl rounded-lg"> 
      </div>
      <?php endforeach; ?>
    </div>
    <div class="w-full lg:w-1/2 lg:px-2">
      <div class="text-sm content mb-4">
        <?php 
          $content_text = wp_strip_all_tags( get_the_content() );
          echo mb_strimwidth($content_text, 0, 265, '...');
        ?>
      </div>
      <div class="flex flex-col">
        <?php if (carbon_get_the_post_meta('crb_places_count_rooms')): ?>
          <div class="mb-4"><span class="font-bold"><?php _e("Кімнат", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_count_rooms'); ?>;</div>
        <?php endif; ?>
        <?php if (carbon_get_the_post_meta('crb_places_square')): ?>
          <div class="mb-4"><span class="font-bold"><?php _e("Площа", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_square'); ?>;</div>
        <?php endif; ?>
        <?php if (carbon_get_the_post_meta('crb_places_floor')): ?>
          <div class="mb-4"><span class="font-bold"><?php _e("Поверх", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_floor'); ?>;</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
  
  
  <div class="border-t pt-4">
    <div class="flex flex-col-reverse lg:flex-row lg:items-center lg:justify-between">
      <div class="mr-2">
        <?php if (carbon_get_the_post_meta('crb_places_author')): ?>
          <div class="mb-2"><span class="font-bold"><?php _e("Додав", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_author'); ?></div>
        <?php endif; ?>
        <div><?php echo get_the_date('d.m.Y'); ?></div>
      </div>
      <div class="mb-2 lg:mb-0"><span class="font-bold">👀 <?php _e("Переглядів", "treba-wp"); ?></span>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
    </div>
  </div>
</div>