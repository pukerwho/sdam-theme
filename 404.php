<?php get_header(); ?>

<div class="container py-8 xl:py-12">
  <div class="border-l-4 border-l-indigo-500 border border-gray-300 rounded-lg p-6">
    <h1 class="text-3xl xl:text-4xl mb-6"><?php _e("Сторінку не знайдено", "treba-wp"); ?></h1>
    <div class="content mb-10">
      <?php _e("Неправильно набрано адресу або такої сторінки на сайті більше не існує", "treba-wp"); ?>.
    </div>
    <div>
      <a href="<?php echo get_home_url(); ?>" class="bg-indigo-500 hover:bg-indigo-700 text-gray-200 hover:text-gray-200 rounded px-6 py-2"><?php _e("Перейти на головну сторінку", "treba-wp"); ?></a>
    </div>
  </div>
</div>

<?php get_footer(); ?>

