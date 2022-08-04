<?php
/*
Template Name: ГОЛОВНА
*/
?>

<?php get_header(); ?>

<!-- WELCOME BLOCK -->
<div class="welcome container pt-24">
  <div class="w-full py-10 xl:py-20">
    <div class="flex flex-wrap flex-col xl:flex-row xl:items-center xl:-mx-10">
      <div class="w-full xl:w-1/2 xl:px-10">
        <div class="overflow-hidden mb-6 xl:mb-10">
          <h1 class="welcome-title"><?php _e('Перетворіть пасивних споживачів в емоційно залучених клієнтів', 'treba-wp'); ?></h1>
        </div>
        <div class="overflow-hidden mb-8 xl:mb-16">
          <div class="welcome-description"><?php _e("Аромамаркетинг робить клієнтський досвід в місці контакту більш значущим. Створюйте прямі зв'язки та зміцнюйте відносини з клієнтами за допомогою аромату.", "treba-wp"); ?></div>
        </div>
        <div class="welcome-btn modal-js" data-modal="contact">
          <div class="relative bg-main-gray text-primary rounded-xl p-2 mr-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 xl:h-6 w-5 xl:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
            </svg>
          </div>
          <div class="relative text-lg xl:text-xl mr-2"><?php _e("Замовити безкоштовний тест", "treba-wp"); ?></div>
          <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
          </div>
        </div>
      </div>
      <div class="hidden xl:block w-full xl:w-1/2 xl:px-10">
        <div class="relative">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-big.svg" alt="" class="welcome-image-bg ">
          <div class="welcome-image welcome-image-scroll"></div> 
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END WELCOME BLOCK -->

<!-- Clients -->
  <?php echo get_template_part('template-parts/components/clients'); ?>
<!-- Clients END -->

<div class="mb-32">
  <div class="container">
    <div class="flex flex-col xl:flex-row xl:-mx-8">
      <div class="w-full xl:w-1/2 xl:px-8 mb-10 xl:mb-0">
        <div class="relative">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-small.svg" alt="" class="w-full h-full absolute -left-4 -top-8">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/welcome-bg.jpeg" alt="" class="w-full h-[250px] xl:h-[450px] relative object-cover rounded-xl photo-bg-style-one-animate">
        </div>
      </div>
      <div class="w-full xl:w-1/2 xl:px-8">
        <div class="font-title text-3xl xl:text-4xl xl:leading-12 mb-6"><?php _e("Лише 1 з 4 брендів виділяється споживачами", "treba-wp"); ?>.</div>
        <div class="block-top-animate text-lg mb-6">
          <div class="opacity-80">
            <?php _e("Кожна взаємодія має значення. У цифрову епоху особисті контакти на вашій території важать значно більше, ніж звичайні транзакції. Важливий емоційний досвід. Проте споживачі повідомляють, що лише один з 4 брендів відрізняється від конкурентів.", "treba-wp"); ?> <span class="text-primary"><?php _e("Будьте серед 25-ти кращих зі 100, що виділяються для споживачів.", "treba-wp"); ?></span> <?php _e("Арома маркетинг дає змогу компаніям виокремити себе завдяки потужним враженням в місцях контакту з клієнтами", "treba-wp"); ?>
          </div>
        </div>
        <div class="block-top-big-animate">
          <ul class="custom-list opacity-80">
            <li><?php _e("Зміцнює ідентичність бренду", "treba-wp"); ?></li>
            <li><?php _e("Покращує задоволеність клієнтів до 20%", "treba-wp"); ?></li>
            <li><?php _e("Збільшує до 11% прибутки від продажу", "treba-wp"); ?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Why us -->
<div class="mb-32">
  <?php echo get_template_part('template-parts/components/whyus'); ?>
</div>
<!-- Why us END -->

<div class="relative mb-20">
  <div class="flex items-center justify-center opacity-75 -mx-2 mb-6 treba-animate fade-up">
    <div class="bg-primary w-6 h-[1px] px-2"></div>
    <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-icon.svg" class="w-10 h-10"></div>
    <div class="bg-primary w-6 h-[1px] px-2"></div>
  </div>
</div>

<!-- Banners -->
<div class="mb-32 xl:mb-52">
  <div class="container">
    <div class="flex flex-col xl:flex-row xl:items-center xl:-mx-10">
      <div class="w-full xl:w-1/2 xl:px-10 mb-10 xl:mb-0">
        <div class="relative overflow-hidden p-6 treba-animate fade-up">
          <!-- Photo absolute -->
          <div class="w-full h-full absolute top-0 left-0"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-photo.jpg" alt="" class="w-full relative object-cover rounded-t-xl photo-bg-style-one-animate"></div>
          <!-- BG absolute -->
          <div class="w-full h-full absolute left-0 top-0 bg-gradient-to-b from-main-dark/60 via-main-dark/80 to-main-dark"></div>
          <!-- Content box -->
          <div class="relative">
            <div class="text-3xl xl:text-4xl font-title mb-10"><?php _e("Наука та", "treba-wp"); ?> <span class="text-primary"><?php _e("дослідження", "treba-wp"); ?></span></div>
            <div class="text-lg xl:text-xl mb-8"><?php _e("ScentAir був заснований у відповідь на приголомшливі результати дослідження впливу аромату на емоції та поведінку людини", "treba-wp"); ?></div>
            <div class="inline-flex relative bg-gradient-to-r from-main-gray to-main-dark border-2 border-main-gray rounded-xl px-6 py-4">
              <a href="#" class="absolute-link"></a>
              <div class="text-lg mr-4"><?php _e("Почитайте дослідження", "treba-wp"); ?></div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>        
      </div>
      <div class="w-full xl:w-1/2 xl:px-10">
        <div class="relative overflow-hidden p-6 treba-animate fade-up">
          <!-- Photo absolute -->
          <div class="w-full h-full absolute top-0 left-0"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-photo2.jpg" alt="" class="w-full relative object-cover rounded-t-xl photo-bg-style-one-animate"></div>
          <!-- BG absolute -->
          <div class="w-full h-full absolute left-0 top-0 bg-gradient-to-b from-main-dark/60 via-main-dark/80 to-main-dark"></div>
          <!-- Content box -->
          <div class="relative">
            <div class="text-3xl xl:text-4xl font-title mb-10"><span class="text-primary"><?php _e("Як працює", "treba-wp"); ?></span> <?php _e("аромамаркетінг", "treba-wp"); ?></div>
            <div class="text-lg xl:text-xl mb-8"><?php _e("Створіть багатий клієнтський досвід за допомогою аромамаркетингу, який будує відносини між брендом та клієнтами та створює довготривалі враження.", "treba-wp"); ?></div>
            <div class="inline-flex relative bg-gradient-to-r from-main-gray to-main-dark border-2 border-main-gray rounded-xl px-6 py-4">
              <a href="#" class="absolute-link"></a>
              <div class="text-lg mr-4"><?php _e("Дізнатись більше", "treba-wp"); ?></div>
              <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </div>
  </div>
</div>
<!-- Banners END -->

<!-- Aromabussiness-items -->
<div class="mb-20 xl:mb-32">
  <div class="container">
    <div class="relative flex flex-col items-center">
      <div class="aromabranding-subtitle stroke-text font-title absolute text-5xl xl:text-8xl uppercase opacity-10"><?php _e("Ароматизація", "treba-wp"); ?></div>
      <h2 class="text-3xl xl:text-4xl xl:leading-12 text-center font-title mb-6 treba-animate fade-up"><?php _e("Ароматизація бізнесу", "treba-wp"); ?></h2>
      <div class="flex items-center justify-center opacity-75 -mx-2 mb-6 treba-animate fade-up">
        <div class="bg-primary w-6 h-[1px] px-2"></div>
        <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
        <div class="bg-primary w-6 h-[1px] px-2"></div>
      </div>
    </div>
    <?php echo get_template_part('template-parts/aromaitems/aromabussiness-items'); ?>
  </div>
</div>
<!-- Aromabussiness-items END -->

<!-- Обладнання -->
<div class="mb-20 xl:mb-32">
  <div class="container">
    <div class="flex flex-col xl:flex-row justify-between xl:items-center mb-8 xl:mb-12">
      <div class="mb-6 xl:mb-0">
        <h2 class="text-3xl xl:text-4xl xl:leading-12 font-title treba-animate fade-up"><?php _e("Обладнання", "treba-wp"); ?></h2>
      </div>
      <div class="products-tabs flex items-center flex-nowrap xl:flex-wrap overflow-x-scroll xl:overflow-x-auto -mx-2">
        <div class="px-2"><div class="tab-btn bg-primary hover:bg-primary rounded-2xl text-center cursor-pointer whitespace-nowrap px-4 py-3" data-tab="products-aromadispansers"><?php _e("Аромадиспенсери", "treba-wp"); ?></div></div>
        <div class="px-2"><div class="tab-btn bg-main-gray hover:bg-primary rounded-2xl text-center cursor-pointer whitespace-nowrap px-4 py-3" data-tab="products-aromapalochki"><?php _e("Аромапалочки", "treba-wp"); ?></div></div>
        <div class="px-2"><div class="tab-btn bg-main-gray hover:bg-primary rounded-2xl text-center cursor-pointer whitespace-nowrap px-4 py-3" data-tab="products-car"><?php _e("Для авто", "treba-wp"); ?></div></div>
        <div class="px-2"><div class="tab-btn bg-main-gray hover:bg-primary rounded-2xl text-center cursor-pointer whitespace-nowrap px-4 py-3" data-tab="products-all"><?php _e("Всі товари", "treba-wp"); ?></div></div>
      </div>
    </div>
    <div>
      <div class="tab-content" data-tab="products-aromadispansers">
        <div class="flex flex-wrap -mx-4">
          <?php 
            $query = new WP_Query( array( 
              'post_type' => 'products', 
              'posts_per_page' => 8,
              'order'    => 'ASC',
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="w-1/2 xl:w-1/3 px-4 mb-6">
              <?php echo get_template_part('template-parts/components/product-card'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="tab-content hidden" data-tab="products-aromapalochki">
        <div class="flex flex-wrap -mx-4">
          <?php 
            $query = new WP_Query( array( 
              'post_type' => 'products', 
              'posts_per_page' => 8,
              'order'    => 'ASC',
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="w-1/2 xl:w-1/3 px-4 mb-6">
              <?php echo get_template_part('template-parts/components/product-card'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="tab-content hidden" data-tab="products-car">
        <div class="flex flex-wrap -mx-4">
          <?php 
            $query = new WP_Query( array( 
              'post_type' => 'products', 
              'posts_per_page' => 8,
              'order'    => 'ASC',
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="w-1/2 xl:w-1/3 px-4 mb-6">
              <?php echo get_template_part('template-parts/components/product-card'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
      <div class="tab-content hidden" data-tab="products-all">
        <div class="flex flex-wrap -mx-4">
          <?php 
            $query = new WP_Query( array( 
              'post_type' => 'products', 
              'posts_per_page' => 8,
              'order'    => 'ASC',
            ) );
          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <div class="w-1/2 xl:w-1/3 px-4 mb-6">
              <?php echo get_template_part('template-parts/components/product-card'); ?>
            </div>
          <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Обладнання -->

<div class="mb-20">
  <div class="container">
    <h2 class="text-3xl xl:text-4xl xl:leading-12 font-title mb-6 treba-animate fade-up"><?php _e("Кейси наших кліентів", "treba-wp"); ?></h2>
    <div class="w-full xl:w-2/3 text-base xl:text-lg opacity-75 mb-12 treba-animate fade-left"><?php _e("Scentair Technologies ароматизує понад 135,000 об'єктів по всьому світу, щонайменше в 4 рази випереджає конкурента №2, працює в індустрії арома маркетингу понад 25 років", "treba-wp"); ?></div>
    <div class="swiper swiper-cases">
      <div class="cases-list swiper-wrapper mb-12">
        <?php 
          $query = new WP_Query( array( 
            'post_type' => 'cases', 
            'posts_per_page' => 9,
            'order'    => 'DESC',
          ) );
        if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
          <div class="swiper-slide">
            <?php echo get_template_part('template-parts/components/case-card'); ?>
          </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</div>

<div class="mb-20 xl:mb-40">
  <div class="container">
    <h2 class="text-3xl xl:text-4xl xl:leading-12 text-center font-title mb-6 treba-animate fade-up"><?php _e("Наш блог", "treba-wp"); ?></h2>
    <div class="flex items-center justify-center opacity-75 -mx-2 mb-10 treba-animate fade-up">
      <div class="bg-primary w-6 h-[1px] px-2"></div>
      <div class="px-2"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-item.svg" class="w-4 h-4"></div>
      <div class="bg-primary w-6 h-[1px] px-2"></div>
    </div>
    <div class="flex flex-wrap -mx-6 mb-6 xl:mb-12">
      <?php 
        $query = new WP_Query( array( 
          'post_type' => 'post', 
          'posts_per_page' => 3,
          'order'    => 'DESC',
        ) );
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <div class="w-full xl:w-1/3 xl:min-w-[250px] px-6 mb-6 xl:mb-0">
          <?php echo get_template_part('template-parts/components/blog-card'); ?>
        </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    <div class="w-full text-center mx-auto">
      <div class="btn-primary relative inline-flex p-3 xl:p-4">
        <a href="<?php echo get_page_url('page-allposts'); ?>" class="absolute-link"></a>
        <div class="relative bg-main-gray text-primary rounded-xl p-2 mr-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 xl:h-6 w-5 xl:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
        </div>
        <div class="relative text-lg xl:text-xl mr-2"><?php _e("Більше дописів", "treba-wp"); ?></div>
        <div class="relative">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>