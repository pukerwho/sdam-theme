<?php
/*
Template Name: Додати
*/
?>

<?php get_header(); ?>

<div class="container py-8 xl:py-12">
  <h1 class="text-3xl xl:text-4xl mb-12">➕ <?php the_title(); ?></h1>
  <div class="flex flex-wrap xl:-mx-10">
    <div class="w-full xl:w-2/3 xl:px-10">
      <div class="content bg-gray-200 rounded-lg px-6 py-4 mb-6">
        <?php the_content(); ?>
      </div>
      <div class="mb-6">
        <input type="text" placeholder="<?php _e("Посилання на ваше оголошення", "treba-wp"); ?>" class="w-full text-gray-800 dark:text-gray-200 border rounded border-gray-200 dark:border-gray-500 dark:bg-dark-md py-2 px-4">
      </div>
      <div>
        <div class="inline-block bg-indigo-500 hover:bg-indigo-700 text-gray-200 hover:text-gray-200 rounded px-6 py-3"><?php _e("Відправити", "treba-wp"); ?></div>
      </div>
    </div>
    <div class="w-full xl:w-1/3 xl:px-10">
      <?php get_template_part('template-parts/sidebar'); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>