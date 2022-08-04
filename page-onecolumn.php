<?php
/*
Template Name: One Column
*/
?>

<?php get_header(); ?>

<div class="space-top">
  <div class="mb-20 py-10 xl:py-20">
    <div class="container">
      <h1 class="text-4xl xl:text-4xl xl:leading-12 font-title text-center mb-6 treba-animate fade-up"><?php the_title(); ?></h1>
      <div class="flex items-center justify-center opacity-75 -mx-2 mb-12 treba-animate fade-up">
        <div class="bg-primary w-6 h-[1px] px-2"></div>
        <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
        <div class="bg-primary w-6 h-[1px] px-2"></div>
      </div>
      <div class="w-full xl:w-2/3 mx-auto mb-20">
        <div class="content bg-main-gray rounded-xl border-l-4 border-primary p-8">
          <?php the_content(); ?>
        </div>
      </div>
      
      <div class="divider w-full h-[8px] mb-20"></div>

      <!-- Блоки Текст+Картинка -->
      <div >
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
    </div>
  </div>
</div>

<?php get_footer(); ?>