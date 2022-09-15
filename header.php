<?php

$current_title = wp_get_document_title();

if (is_tax( 'city' )) {
	$city_title = single_term_title( "", false );
	if (get_locale() === 'uk') {
  	$help_title_text = 'довгострокова оренда квартири - зняти квартиру в м.';
    $help_description_text = 'зняти квартиру на порталі Sdamkvartiry.com - широкий вибір квартир. Ціни, фото, контакти.';
  } else {
    $help_title_text = 'долгосрочная аренда квартиры - снять квартиру в г.';
    $help_description_text = 'снять квартиру на портале Sdamkvartiry.com – широкий выбор квартир. Цены, фотографии, контакты.';
  }
	$current_title = $city_title . ': ' . $help_title_text . '' . $city_title;
  $current_description = $city_title . ': ' . $help_description_text;
}

if (is_tax( 'district' )) {
	$district_title = single_term_title( "", false );
	if (get_locale() === 'uk') {
  	$help_title_text = 'зняти квартиру (довгостроково), вигідна аренда квартири';
    $help_description_text = 'пошук квартири у районі. Знайти вигідно квартиру. Ціни, фото, контакти.';
  } else {
    $help_title_text = 'аренда квартиры (долгосрочно) - снять квартиру в г.';
    $help_description_text = 'поиск квартир в районе. Найти выгодно квартиру. Цены, фотографии, контакты.';
  }
	$current_title = $district_title . ': ' . $help_title_text;
  $current_description = $city_title . ': ' . $help_description_text;
}

if (is_home()) {
	if (get_locale() === 'uk') {
  	$current_title = 'Зняти квартиру в Україні - понад 13460 пропозицій, довгострокова оренда квартири';
    $current_description = 'Довготривала оренда квартир в Україні. Винайняти квартиру помісячно. Величезна база квартир для оренди.';
  } else {
    $current_title = 'Снять квартиру в Украине - более 13460 предложений, долгосрочная аренда квартиры';
    $current_description = 'Долгосрочная аренда квартир в Украине. Снять квартиру помесячно. Огромная база квартир для аренды.';
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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>
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
                  pll_the_languages(); 
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