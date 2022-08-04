<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="h-[400px] w-full relative mb-12">
    <?php 
      $photo_medium = get_the_post_thumbnail_url( get_the_ID(), 'medium' ); 
      $photo_large = get_the_post_thumbnail_url( get_the_ID(), 'large' );
      $photo_full = get_the_post_thumbnail_url( get_the_ID(), 'full' );
    ?>
    <div>
      <img srcset="<?php echo $photo_medium; ?> 767w, 
      <?php echo $photo_large; ?> 1280w,
      <?php echo $photo_full; ?> 1440w"
      sizes="(max-width: 767px) 767px,
      (max-width: 1280px) 1280px,
      1440px"
      src="<?php echo $photo_full; ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-[400px] object-cover">
    </div>
    <div class="w-full h-full absolute top-0 left-0 bg-gradient-to-b from-slate-800/90 to-main-dark"></div>
    <div class="absolute left-1/2 bottom-0 -translate-x-1/2">
      <h1 class="text-4xl font-title text-center uppercase mb-12"><?php the_title(); ?></h1>
      <div class="text-xl opacity-75"><?php echo carbon_get_the_post_meta('crb_page_description'); ?></div>
    </div>
  </div>
  <div class="flex items-center justify-center opacity-75 -mx-2 mb-20 treba-animate fade-up">
    <div class="bg-primary w-6 h-[1px] px-2"></div>
    <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
    <div class="bg-primary w-6 h-[1px] px-2"></div>
  </div>
  <div class="container mb-20">
    <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-10 mb-20">
      <div class="w-full xl:w-2/3 xl:px-10">
        <div class="content">
          <?php the_content(); ?>
        </div>
      </div>
      <div class="w-full xl:w-1/3 xl:px-10">
        <div class="relative">
          <div class="w-full h-full absolute top-0 left-0" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-small.svg); background-size: cover;"></div>
          <div class="p-1">
            <div class="relative bg-main-dark rounded-3xl p-6">
              <div class="text-2xl font-title text-center uppercase mb-6"><?php _e("Отримати консультацію", "treba-wp"); ?></div>
              <?php get_template_part('template-parts/components/contact-form'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Блоки Текст+Картинка -->
    <div class="mb-32">
      <?php
        $items = carbon_get_the_post_meta('crb_page_blocks');
        foreach ($items as $item):
      ?>
        <div class="flex flex-col odd:xl:flex-row even:xl:flex-row-reverse xl:-mx-10 mb-20 last:mb-6">
          <div class="w-full xl:w-1/2 xl:px-10 mb-12 xl:mb-0">
            <?php 
              $photo_block_medium = wp_get_attachment_image_src( $item['crb_page_blocks_img'], 'medium' ); 
              $photo_block_large = wp_get_attachment_image_src( $item['crb_page_blocks_img'], 'large' );
              $photo_block_full = wp_get_attachment_image_src( $item['crb_page_blocks_img'], 'full' );
            ?>
            <div>
              <img srcset="<?php echo $photo_block_medium[0]; ?> 767w, 
              <?php echo $photo_block_large[0]; ?> 1280w,
              <?php echo $photo_block_full[0]; ?> 1440w"
              sizes="(max-width: 767px) 767px,
              (max-width: 1280px) 1280px,
              1440px"
              src="<?php echo $photo_block_full[0]; ?>" alt="<?php the_title(); ?>" loading="lazy" class="w-full h-full object-cover rounded-xl">
            </div>
          </div>
          <div class="w-full xl:w-1/2 xl:px-10">
            <div class="content mb-12">
              <?php 
                $text = $item['crb_page_blocks_content'];
                echo apply_filters( 'the_content', $text  ); 
                unset($text);
              ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <!-- END Блоки Текст+Картинка -->

    <!-- Cases -->
    <div class="flex flex-wrap flex-col lg:flex-row mb-40">
      <h2 class="text-3xl font-title mb-12"><?php _e('Наші кейси', 'treba-wp'); ?></h2>
      <div class="flex flex-wrap -mx-6">
        <?php 
          $query = new WP_Query( array( 
            'post_type' => 'cases', 
            'posts_per_page' => 3,
            'order'    => 'DESC',
          ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <div class="w-full xl:w-1/3 px-6 mb-6 xl:mb-0">
            <?php echo get_template_part('template-parts/components/case-card'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </div>
    <!-- END Cases -->
  </div>

  <div class="mb-32">
    <?php echo get_template_part('template-parts/components/consultation'); ?>
  </div>
  

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>