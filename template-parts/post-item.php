<div class="relative shadow-xl rounded-xl border border-gray-200">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <div class="flex flex-wrap flex-col xl:flex-row">
    <div class="w-full xl:w-4/12">
      <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-l-xl">
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