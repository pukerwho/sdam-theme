<div class="relative shadow-xl rounded-xl border border-gray-200">
  
  <div class="flex flex-wrap flex-col xl:flex-row">
    <div class="w-full relative xl:w-4/12">
      <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
      <?php 
        $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
      ?>
      <img 
      class="w-full h-full object-cover rounded-l-xl" 
      alt="<?php the_title(); ?>" 
      src="<?php echo $medium_thumb; ?>" 
      srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
      loading="lazy" 
      data-src="<?php echo $medium_thumb; ?>" 
      data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
    </div>
    <div class="w-full xl:w-8/12 p-6">
      <div class="text-sm mb-4 -mx-4">
        <?php
        $post_categories = get_the_terms( $new_posts->ID, 'category' );
        foreach ($post_categories as $post_category){ ?>
          <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="text-indigo-500 hover:underline hover:text-indigo-600 px-4"><?php echo $post_category->name; ?></a> 
        <?php } ?>
      </div>
      <div class="text-lg custom-font mb-4"><a href="<?php the_permalink(); ?>" class="hover:text-indigo-500"><?php the_title(); ?></a></div>
      <div class="content text-sm mb-4">
        <?php 
        $content_text = wp_strip_all_tags( get_the_content() );
        echo mb_strimwidth($content_text, 0, 200, '...');
        ?>
      </div>
      <div class="text-sm opacity-50">
        <?php echo get_the_date('d.m.Y'); ?>
      </div>
    </div>
  </div>
</div>