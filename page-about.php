<?php
/*
Template Name: ПРО НАС
*/
?>

<?php get_header(); ?>

<div class="space-top">
  <div class="mb-20 py-10 xl:py-20">
    <div class="container">
      <h1 class="text-4xl xl:text-4xl xl:leading-12 text-center font-title mb-6 treba-animate fade-up"><?php the_title(); ?></h1>
      <div class="flex items-center justify-center opacity-75 -mx-2 mb-10 treba-animate fade-up">
        <div class="bg-primary w-6 h-[1px] px-2"></div>
        <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
        <div class="bg-primary w-6 h-[1px] px-2"></div>
      </div>
      <div class="w-full xl:w-2/3 bg-main-gray rounded-xl mx-auto pt-4 pb-6 px-6 xl:px-8 mb-20 xl:mb-32">
        <div class="content"><?php the_content(); ?></div>
      </div>
      <div class="flex flex-col xl:flex-row xl:-mx-10 mb-20">
        <div class="w-full xl:w-1/2 xl:px-10 mb-12 xl:mb-0">
          <div class="relative">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-small.svg" alt="" class="hidden xl:block w-full h-full absolute -left-4 -top-8">
            <img src="https://static.tildacdn.com/tild6164-6661-4064-a532-303732663563/MG_8647.jpg" alt="" class="w-full h-[250px] xl:h-[450px] relative object-cover rounded-xl photo-bg-style-one-animate">
          </div>
        </div>
        <div class="w-full xl:w-1/2 xl:px-10">
          <div class="text-2xl font-title mb-12"><?php _e("Чому Мідсан і Scentair кращі партнери?", "treba-wp"); ?></div>
          <div>
            <?php $items = carbon_get_the_post_meta('crb_about_whyus_partner');
              $i = 1;
              foreach ($items as $item):
            ?>
              <div class="flex text-lg mb-10">
                <div class="stroke-text text-5xl font-title opacity-50 mr-4"><?php echo $i; ?></div>
                <div>
                  <div><?php echo $item['crb_about_whyus_partner_text']; ?></div>
                  <div><a href="<?php echo $item['crb_about_whyus_partner_link']; ?>" class="text-primary"><?php _e("Детальніше", "treba-wp"); ?></a></div>
                </div>
              </div>
              <?php $i++; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="relative mb-20 xl:mb-32">
        <div class="w-full h-full absolute left-1 xl:left-3 top-1 xl:top-3 bg-primary rounded-xl"></div>
        <div class="relative bg-white rounded-xl p-6">
          <div class="flex flex-wrap xl:-mx-6 z-1">
            <?php
              $items = carbon_get_the_post_meta('crb_about_midsun_partner');
              foreach ($items as $item):
            ?>
              <div class="w-full xl:w-1/4 xl:px-6 mb-20 last:mb-0 xl:mb-0">
                <div class="mb-6">
                  <img src="<?php echo $item['crb_about_midsun_partner_img']; ?>" alt="" loading="lazy" class="w-full h-[150px] object-contain">
                </div>
                <div class="text-main-gray"><?php echo $item['crb_about_midsun_partner']; ?></div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <!-- Блоки Текст+Картинка -->
      <div>
        <?php
          $items = carbon_get_the_post_meta('crb_about_blocks');
          foreach ($items as $item):
        ?>
          <div class="flex items-center flex-col odd:xl:flex-row even:xl:flex-row-reverse xl:-mx-10 mb-20 last:mb-6">
            <div class="w-full xl:w-1/2 xl:px-10 mb-12 xl:mb-0">
              <div>
                <img src="<?php echo $item['crb_about_blocks_img']; ?>" alt="" loading="lazy" class="w-full h-full object-cover rounded-xl">
              </div>
            </div>
            <div class="w-full xl:w-1/2 xl:px-10">
              <div class="content mb-12">
                <?php 
                  $text = $item['crb_about_blocks_content'];
                  echo apply_filters( 'the_content', $text  ); 
                  unset($text);
                ?>
              </div>
              <div class="btn-primary relative inline-flex p-3 xl:p-4 modal-js" data-modal="contact">
                <div class="relative bg-main-gray text-primary rounded-xl p-2 mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 xl:h-6 w-6 xl:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                </div>
                <div class="relative text-lg xl:text-xl mr-2"><?php echo $item['crb_about_blocks_btn']; ?></div>
                <div class="relative">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
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