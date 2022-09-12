<div class="relative shadow-xl rounded-xl border border-gray-200">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="flex flex-wrap flex-col xl:flex-row">
    <div class="w-full xl:w-4/12">
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
      <div class="text-lg font-bold mb-6"><?php the_title(); ?></div>
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