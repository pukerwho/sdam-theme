<footer>
  text
</footer>

<!-- MODAL CONTACT -->
<div class="modal" data-modal="contact">
  <div class="modal_content w-4/5 lg:w-2/3 bg-main-dark rounded-xl">
    <div class="modal_content_close modal-close-js">
      ✖️
    </div>
    <div class="mt-6">
      <!-- ФОРМА -->
      <h2 class="text-3xl uppercase mb-10"><?php _e('Відправити запит', 'treba-wp'); ?></h2>
      <?php get_template_part('template-parts/components/contact-form'); ?>
      <div class="form_callback_success hidden bg-orange-100 dark:bg-dark-xl rounded-lg p-4"><?php _e("Ми отримали вашу заявку. Найближчим часом ми з вами зв'яжемося.", "treba-wp"); ?></div>
      </div>
      <!-- END ФОРМА -->
    </div>
  </div>
</div>
<!-- END MODAL CONTACT -->

<div class="modal" data-modal="menu">
  <div class="modal_content w-full h-screen">
    <div class="h-full bg-white rounded-xl p-4">
      <div class="flex items-center justify-between mb-12">
        <div class="flex relative text-xl ">
          <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
          <div class="border-b-2 border-t-2 border-t-transparent border-b-blue-500 mr-1">
            Сдам
          </div>
          <div class="border-t-2 border-b-2 border-b-transparent border-yellow-400">
            квартиру
          </div>
        </div>
        <div class="text-white text-lg modal-close-js">
          ✖️
        </div>
      </div>
      <div>
        <div class="text-2xl font-title mb-6"><?php _e("Меню", "treba-wp"); ?></div>
        <div class="mb-12">
          <?php wp_nav_menu([
            'theme_location' => 'header',
            'container' => 'div',
            'menu_class' => 'flex flex-col'
          ]); ?> 
        </div>
        <div class="text-2xl font-title mb-6"><?php _e("Мова", "treba-wp"); ?></div>
        <div class="lang text-sm flex">
          <?php if (function_exists('pll_the_languages')) { 
            pll_the_languages(); 
          } ?>
        </div>
      </div>
    </div>
  </div>  
</div>

<div class="modal-bg hidden"></div>

<?php wp_footer(); ?>

</body>
</html>