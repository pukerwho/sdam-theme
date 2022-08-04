<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#1D1E22" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
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
              <div class="mr-6"><a href="#" class="bg-indigo-500 hover:bg-indigo-700 text-gray-200 hover:text-gray-200 rounded px-6 py-2"><?php _e("Додати", "treba-wp"); ?> +</a></div>
              <div class="lang">
                <?php wp_nav_menu([
                  'theme_location' => 'lang_header',
                  'container' => 'div',
                  'menu_class' => 'flex',
                ]); ?> 
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