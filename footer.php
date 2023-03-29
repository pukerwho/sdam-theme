<footer class="bg-gray-700 text-gray-200 rounded-b-xl py-12">
  <div class="container">
    <div class="mb-16">
      <div class="text-lg font-medium opacity-75 mb-4">🔍 <?php _e("Популярные запросы", "treba-wp"); ?>:</div>
      <div class="border dark:border-gray-500 shadow-lg rounded-lg">
        <div class="flex flex-wrap lg:-mx-2 px-2 py-2">
          <?php 
            $current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $footer_links = footer_links($current_url);
            foreach ($footer_links as $footer_link):
          ?>
            <div class="w-full lg:w-1/2 xl:w-1/3 text-sm px-2">
              <?php 
                echo $footer_link->top_links; 
              ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    <div class="flex flex-wrap flex-col xl:flex-row xl:-mx-4">
      <div class="w-full xl:w-1/2 xl:px-4 mb-6 xl:mb-0">
        <div class="flex relative text-xl mb-4">
          <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
          <div class="border-b-2 border-t-2 border-t-transparent border-b-blue-500 mr-1">
            Сдам
          </div>
          <div class="border-t-2 border-b-2 border-b-transparent border-yellow-400">
            квартиру
          </div>
        </div>
        <div class="w-full xl:w-9/12 mb-4">
          <?php _e("Всі можливі пропозиціі по довгостроковій оренді квартир в Україні зібрані на одном сайті.", "treba-wp"); ?>
        </div>
        <div class="flex items-center">
          <a href="https://priazovka.com/">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/priazovka.jpg" width="20">
          </a>
          <?php if (is_home()): ?>
            <a href="https://webgolovolomki.com/" class="pl-2">
              <img src="https://sdamkvartiry.com/wp-content/uploads/2022/11/web-g.jpg" width="20">
            </a>
          <?php endif; ?>
        </div>
      </div>
      <div class="w-full xl:w-1/4 xl:px-4 mb-6 xl:mb-0">
        <div class="text-xl font-bold mb-2"><?php _e("Навігація", "treba-wp"); ?></div>
        <?php wp_nav_menu([
          'theme_location' => 'footer',
          'container' => 'div',
          'menu_class' => 'flex flex-col'
        ]); ?> 
      </div>
      <div class="w-full xl:w-1/4 xl:px-4">
        <div class="text-xl font-bold mb-2"><?php _e("Напишіть нам", "treba-wp"); ?></div>
        <div>✉️ info@sdamkvartiry.com</div>
      </div>
    </div>
  </div>
</footer>

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