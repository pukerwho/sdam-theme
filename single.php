<?php get_header(); ?>
  <div class="container py-8 xl:py-12" itemscope itemtype="http://schema.org/Article">
    
    <div class="flex flex-wrap xl:-mx-10">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php $currentId = get_the_ID(); $countNumber = tutCount($currentId); ?>
      <div class="w-full xl:w-2/3 xl:px-10 mb-10 lg:mb-0">
        <div class="lg:shadow-xl lg:rounded-xl lg:border border-gray-200 lg:p-8 mb-16">
          <!-- Хлебные крошки -->
          <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200 mb-6" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <ul class="flex items-center flex-wrap -mr-4">
              <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4 pl-8">
                <a itemprop="item" href="<?php echo home_url(); ?>" class="text-indigo-400 dark:text-indigo-200">
                  <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
                </a>                        
                <meta itemprop="position" content="1">
              </li>
              <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
                <a itemprop="item" href="<?php echo get_page_url('page-blog'); ?>" class="text-indigo-400 dark:text-indigo-200">
                  <span itemprop="name"><?php _e( 'Блог', 'treba-wp' ); ?></span>
                </a>                        
                <meta itemprop="position" content="2">
              </li>
              <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-600 px-4">
                <span itemprop="name"><?php the_title(); ?></span>
                <meta itemprop="position" content="3" />
              </li>
            </ul>
          </div>
          <!-- END Хлебные крошки -->
          <article>
            <h1 class="text-2xl xl:text-3xl mb-6" itemprop="headline"><?php the_title(); ?></h1>
            <div class="bg-gray-200 dark:bg-gray-700 rounded-lg px-6 py-4 mb-4">
              <div class="mb-2">
                <div><span class="font-medium"><?php _e("Автор", "treba-wp"); ?></span>: 
                  <?php if (carbon_get_the_post_meta('crb_post_author')): ?>
                    <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_author'); ?></span>
                    <div class="flex items-center text-sm">
                      <!-- instagram -->
                      <?php if (carbon_get_the_post_meta('crb_post_author_instagram')): ?>
                        <div class="italic pb-2 pr-3"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_instagram'); ?>" class="text-indigo-500">Instagram</a></div>
                      <?php endif; ?>
                      <!-- facebook --> 
                      <?php if (carbon_get_the_post_meta('crb_post_author_facebook')): ?>
                        <div class="italic pb-2"><a href="<?php echo carbon_get_the_post_meta('crb_post_author_facebook'); ?>" class="text-indigo-500">Facebook</a></div>
                      <?php endif; ?>
                    </div>

                  <?php else: ?>
                    <?php echo get_the_author(); ?>
                  <?php endif; ?>
                </div>
              </div>
              <div class="flex flex-wrap -mx-2">
                <div class="flex items-center text-sm opacity-75 px-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                  </div>
                  <div><?php echo get_the_modified_time('d.m.Y') ?>;</div>
                </div>
                <div class="flex items-center text-sm opacity-75 px-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                  </div>
                  <div><?php echo $countNumber; ?>;</div>
                </div>
              </div>
            </div>
            <div class="mb-6">
              <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-full object-cover rounded-lg" itemprop="image">
            </div>
            <div class="content" itemprop="articleBody">
              <div class="single-subjects mb-5">
                <div class="text-2xl font-bold uppercase mb-3">
                  <?php _e('Зміст','treba-wp'); ?>:
                </div>
                <div class="single-subjects-inner"></div>
              </div>
              <?php the_content(); ?>
            </div>
          </article> 
        </div>  
        <div>
          <div class="text-2xl mb-6"><span class="border-b-4 border-indigo-300 font-bold"><?php _e("Коментарі", "treba-wp"); ?></span></div>
          <div class="content">
            <?php comments_template(); ?>
          </div>
        </div>    
      </div>
      <?php endwhile; endif; wp_reset_postdata(); ?>
      <div class="w-full xl:w-1/3 xl:px-10">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
    </div>
  </div>


<?php get_footer(); ?>