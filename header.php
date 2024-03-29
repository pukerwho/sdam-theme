<?php

$current_title = wp_get_document_title();

// FOR POSTs
if ( is_singular( 'post' ) ) {
  $current_title = get_the_title();
  $post_title = carbon_get_the_post_meta('crb_post_title');
  $post_description = carbon_get_the_post_meta('crb_post_description');
  if ($post_title) {
    $current_title = $post_title;
  }
  if ($post_description) {
    $current_description = $post_description;
  }
}

if (is_page()) {
	$current_title = get_the_title();
}

if (is_tax( 'city' )) {
	$tax_title = single_term_title( "", false );
  if (get_locale() === 'uk') {
    $current_title = "Рейтинг міста ".$tax_title;
    $current_description = "Загальний рейтинг міста ".$tax_title.". Оцінки від мешканців. Якість життя в місті ".$tax_title.", які є переваги та недоліки.";
  } else {
    $current_title = "Рейтинг города ".$tax_title;
    $current_description = "Общий рейтинг города ".$tax_title.". Оценки жителей. Качество жизни в городе ".$tax_title.", какие преимущества и недостатки.";
  }      
}

if (is_tax( 'district' )) {
	$district_title = single_term_title( "", false );
  if (get_locale() === 'uk') {
    $current_title = $district_title." - що відомо, рейтинг району, оцінки";
    $current_description = $district_title.". Які переваги та недоліки у району. Оцінки якості життя у районі. Читайте на сайті.";
  } else {
    $current_title = $district_title." - что известно, рейтинг района, оценки";
    $current_description = $district_title.". Какие преимущества и недостатки у района. Оценки качества жизни в районе. Читайте на сайте.";
  }  
}

if (is_home()) {
	if (get_locale() === 'uk') {
  	$current_title = 'SdamKvartiry - лайфхаки, ідеї та корисні поради';
    $current_description = 'На сайті зібрані корисні статті для креативних людей, які завжди шукають, як покращити себе та навколишній світ. Заходь та читай!';
  } else {
    $current_title = 'SdamKvartiry – лайфхаки, идеи и полезные советы';
    $current_description = 'На сайте собраны полезные статьи для креативных людей, которые всегда ищут, как улучшить себя и окружающий мир. Заходи и читай!';
  }
}

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php echo $current_title; ?></title>
  <?php if ($current_description): ?>
    <meta name="description" content="<?php echo $current_description; ?>"/>
  <?php endif; ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1D1E22" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>

  <?php if (is_singular()): ?>
    <meta property="og:title" content="<?php echo $current_title; ?>" />
    <?php if ($current_description): ?>
      <meta property="og:description" content="<?php echo $current_description; ?>" />
    <?php else: ?>
      <?php 
        $content_text_for_description = wp_strip_all_tags( get_the_content() );
      ?>
      <meta property="og:description" content="<?php echo mb_strimwidth($content_text_for_description, 0, 150, '...'); ?>" />
    <?php endif; ?>
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(); ?>">
    <?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
    <meta property="og:url" content="<?php echo $actual_link; ?>" />
    <meta property="og:article:published_time" content="<?php echo get_post_time('Y/n/j'); ?>" />
    <meta property="og:article:article:modified_time" content="<?php echo get_the_modified_time('Y/n/j'); ?>" />
    
    <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
      <meta property="og:article:author" content="<?php echo carbon_get_the_post_meta('crb_post_author'); ?>" />
    <?php else: ?>
      <meta property="og:article:author" content="<?php echo get_the_author(); ?>" />
    <?php endif; ?>
  
  <?php else: ?>
    <meta property="og:image" content="<?php echo get_stylesheet_directory_uri(); ?>/images/sdam-thumb.png">
  <?php endif; ?>

	<?php wp_head(); ?>
	<?php echo carbon_get_theme_option('crb_google_analytics'); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div class="wrap ">
    <header class="header">
      <div class="container">
        <div class="w-full">
          <div class="flex justify-between items-center">
            <div class="flex items-center text-xl relative">
              <a href="<?php echo get_home_url(); ?>" class="absolute-link"></a>
              <div class="border-b-2 border-t-2 border-t-transparent border-b-blue-500 mr-1">
                Сдам
              </div>
              <div class="border-t-2 border-b-2 border-b-transparent border-yellow-400">
                квартиру
              </div>
            </div>
            <div class="hidden xl:block mainmenu">
              <?php wp_nav_menu([
                'theme_location' => 'header',
                'container' => 'div',
                'menu_class' => 'flex'
              ]); ?> 
            </div>
            <div class="hidden xl:flex">
              <div class="cursor-pointer mr-6">
                <div class="hidden dark:block text-gray-200 js-toggle-light" data-light="off">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                  </svg>
                </div>
                <div class="block dark:hidden dark:text-gray-200 js-toggle-light" data-light="on">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                  </svg>
                </div>
              </div>
              <div class="mr-6"><a href="<?php echo get_page_url('page-add'); ?>" class="bg-indigo-500 hover:bg-indigo-700 text-gray-200 hover:text-gray-200 rounded px-6 py-2"><?php _e("Додати", "treba-wp"); ?> +</a></div>
               <div class="lang text-sm flex">
                <?php if (function_exists('pll_the_languages')) { 
                  pll_the_languages( array( 'hide_if_empty' => 0 ) ); 
                } ?>
              </div>
            </div>
            <div class="xl:hidden text-indigo-500 cursor-pointer modal-js" data-modal="menu">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h6a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </header>