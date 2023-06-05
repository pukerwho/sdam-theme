<?php
/*
Template Name: Всі міста
*/
?>

<?php get_header(); ?>
<div class="container py-8 xl:py-12">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
      <ul class="flex items-center flex-wrap -mr-4">
        <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
          <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-200">
            <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
          </a>                        
          <meta itemprop="position" content="1">
        </li>
        
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
          <span itemprop="name"><?php _e("Міста", "treba-wp"); ?></span>
          <meta itemprop="position" content="2" />
        </li>
      </ul>
    </div>
    <!-- END Breadcrumbs -->

    <!-- Title -->
    <h1 class="text-3xl xl:text-4xl mb-6"><?php _e("Всі міста", "treba-wp"); ?></h1>
    <!-- END Title -->
    
    <!-- Meta -->
    <div class="mb-12">
      <div class="flex items-center">
        <div class="mr-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
          </svg>
        </div>
        <div ><?php _e("Оновлено", "treba-wp"); ?>: <span class="text-gray-700 underline"><?php echo  date('d.m.Y',strtotime("-1 days")); ?></span></div>
      </div>
    </div>
    <!-- END Meta -->

    <div class="flex flex-wrap xl:-mx-10">
      
      <div class="w-full xl:w-2/3 xl:px-10 mb-20 xl:mb-0">
        <!-- Main -->
        <div class="lg:shadow-xl lg:rounded-xl lg:border border-gray-200 lg:p-8">
          <h2 class="text-2xl lg:text-3xl uppercase mb-6"><?php _e("Рейтинг", "treba-wp"); ?>:</h2>
          <div>
            <div class="overflow-x-auto bg-white border border-gray-300 mb-12">
              <table class="w-full table-auto">
                <thead class="bg-theme-sky border-b border-gray-300">
                  <tr>
                    <th class="text-left whitespace-nowrap border-r px-4 py-3">
                      <div class="text-left custom-font"><?php _e("Місто", "treba-wp"); ?></div>
                    </th>
                    <th class="text-left whitespace-nowrap px-4 py-3">
                      <div class="text-left custom-font"><?php _e("Загальний рейтинг", "treba-wp"); ?></div>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $cities = get_terms(array('taxonomy' => 'city', 'parent' => 0, 'meta_key' => 'meta_city_rating', 'orderby' => 'meta_value', 'order' => 'DESC')); 
                  foreach ($cities as $city): ?>
                  <tr class="border-b border-gray-300 last:border-transparent">
                    <td class="whitespace-nowrap border-r px-4 py-3">
                      <div><a href="<?php echo get_term_link($city->term_id, 'city'); ?>"><?php echo $city->name; ?></a></div>
                    </td>
                    <td class="whitespace-nowrap px-4 py-3">
                      <?php echo get_term_meta($city->term_id, "meta_city_rating", true)?> / 100
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="w-full xl:w-1/3 xl:px-10">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
    </div>
  </div>

<?php get_footer(); ?>