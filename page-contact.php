<?php
/*
Template Name: КОНТАКТИ
*/
?>

<?php get_header(); ?>

<div class="space-top">
  <div class="mb-20 py-10 xl:py-20">
    <div class="container">
      <h1 class="text-4xl xl:text-4xl xl:leading-12 font-title mb-12 treba-animate fade-up"><?php the_title(); ?></h1>
      <div class="flex flex-col xl:flex-row xl:-mx-10">
        <div class="w-full xl:w-1/3 xl:px-10 mb-10">
          <div class="bg-main-gray rounded-xl p-6 mb-12">
            <div class="flex items-center mb-6">
              <div class="opacity-75 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M21 3l-6 6m0 0V4m0 5h5M5 3a2 2 0 00-2 2v1c0 8.284 6.716 15 15 15h1a2 2 0 002-2v-3.28a1 1 0 00-.684-.948l-4.493-1.498a1 1 0 00-1.21.502l-1.13 2.257a11.042 11.042 0 01-5.516-5.517l2.257-1.128a1 1 0 00.502-1.21L9.228 3.683A1 1 0 008.279 3H5z" />
                </svg>
              </div>
              <div>
                +38(050) 355-19-27
              </div>
            </div>
            <div class="flex items-center mb-6">
              <div class="opacity-75 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                08:00 - 20:00
              </div>
            </div>
            <div class="flex items-center">
              <div class="opacity-75 mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <div>
                м. Київ, проспект Соборності 17, офіс 2-246
              </div>
            </div>
          </div>
          <div>
            <div class="text-2xl font-title mb-6"><?php _e("Ми у соцмережах", "treba-wp"); ?></div>
            <div class="flex items-center -mx-4">
              <div class="text-primary px-4">
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                  </svg>
                </a>
              </div>
              <div class="text-primary px-4">
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="2" />
                    <line x1="8" y1="11" x2="8" y2="16" />
                    <line x1="8" y1="8" x2="8" y2="8.01" />
                    <line x1="12" y1="16" x2="12" y2="11" />
                    <path d="M16 16v-3a2 2 0 0 0 -4 0" />
                  </svg>
                </a>
              </div>
              <div class="text-primary px-4">
                <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="4" y="4" width="16" height="16" rx="4" />
                    <circle cx="12" cy="12" r="3" />
                    <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="w-full xl:w-2/3 xl:px-10">
          <?php get_template_part("template-parts/components/contact-form"); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>