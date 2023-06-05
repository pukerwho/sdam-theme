<!-- photo -->
<div class="relative mb-4">
  <a href="<?php the_permalink(); ?>" class="absolute-link"></a>
  <?php 
    $medium_thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium');
    $large_thumb = get_the_post_thumbnail_url(get_the_ID(), 'large');
  ?>
  <img 
  class="w-full h-[250px] lg:h-[320px] object-cover rounded-lg" 
  alt="<?php the_title(); ?>" 
  src="<?php echo $medium_thumb; ?>" 
  srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w" 
  loading="lazy" 
  data-src="<?php echo $medium_thumb; ?>" 
  data-srcset="<?php echo $medium_thumb; ?> 1024w, <?php echo $large_thumb; ?> 1536w">
</div>
<!-- end photo -->

<!-- category --> 
<div class="text-sm mb-4 -mx-4">
  <?php
  $post_categories = get_the_terms( $new_posts->ID, 'category' );
  foreach ($post_categories as $post_category){ ?>
    <a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="text-indigo-500 hover:underline hover:text-indigo-600 px-4"><?php echo $post_category->name; ?></a> 
  <?php } ?>
</div>
<!-- end category --> 

<!-- title -->
<div class="text-2xl custom-font mb-4">
  <a href="<?php the_permalink(); ?>" class="hover:text-indigo-500"><?php the_title(); ?></a>
</div>
<!-- end title -->

<!-- content -->
<div class="content mb-6">
  <?php 
    $content_text = wp_strip_all_tags( get_the_content() );
    echo mb_strimwidth($content_text, 0, 120, '...');
  ?>
</div>
<!-- end content -->

<!-- meta -->
<div class="flex items-center">
  <!-- author -->
  <div class="custom-font mr-4">
    <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
      <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
      <div class="flex items-center text-sm">
        <!-- instagram -->
        <?php if (carbon_get_the_post_meta('crb_post_author_instagram')): ?>
          <div class="italic pb-2 pr-3"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_instagram'); ?>" class="text-indigo-500">Instagram</a></div>
        <?php endif; ?>
        <!-- facebook --> 
        <?php if (carbon_get_the_post_meta('crb_post_author_facebook')): ?>
          <div class="italic pb-2"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_facebook'); ?>" class="text-indigo-500">Facebook</a></div>
        <?php endif; ?>
      </div>

    <?php else: ?>
      <?php echo get_the_author(); ?>
    <?php endif; ?>
  </div>
  <!-- end author -->

  <!-- date -->
  <div class="opacity-75">
    <?php echo get_the_modified_time('d.m.Y') ?>
  </div>
  <!-- end date -->
</div>
<!-- end meta -->