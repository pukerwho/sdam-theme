<?php get_header(); ?>
  <div class="container py-8 xl:py-12" itemscope itemtype="http://schema.org/Article">
    
    <div class="flex flex-wrap xl:-mx-10">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php 
        $currentId = get_the_ID(); 
        $countNumber = tutCount($currentId);
        $translated_ids = pll_get_post_translations($currentId);
        $post_categories = get_the_terms( $currentId, 'category' );
        foreach (array_slice($post_categories, 0, 1) as $post_category) {
          $category_name = $post_category->name;
          $category_id = $post_category->term_id;
        }
      ?>
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
                <?php if (carbon_get_the_post_meta('crb_post_editor')): ?>
                  <div><span class="font-medium"><?php _e("Перевірив", "treba-wp"); ?></span>: <span class="italic"><?php echo carbon_get_the_post_meta('crb_post_editor'); ?></span></div>
                <?php endif; ?>
              </div>
              <div class="flex flex-wrap -mx-2">
                <div class="text-sm opacity-75 px-2">
                  <?php _e("Категорія", "treba-wp"); ?>: <a href="<?php echo get_term_link($category_id, 'category') ?>" class="text-indigo-500"><?php echo $category_name; ?></a>;
                </div>
                <div class="flex items-center text-sm opacity-75 px-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                    </svg>
                  </div>
                  <div><?php echo get_the_date('d.m.Y') ?>;</div>
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
                <div class="flex items-center text-sm opacity-75 px-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <div class="post-time-read">
                    <span></span> <?php _e("хв читання", "treba-wp"); ?>
                  </div>
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
          <div class="my-12">
            <div class="text-2xl font-bold uppercase text-center mb-6"><?php _e("Оцініть статтю", "treba-wp"); ?></div>
            <div class="flex justify-center items-center text-md lg:text-lg -mx-2 lg:-mx-4 js-post-vote" data-post-id="<?php echo $currentId; ?>" data-local-translate-id="<?php foreach( $translated_ids as $id) {echo $id;} ?>">
              <!-- Up -->
              <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="meta_up_">
                <div class="flex justify-center items-center bg-green-100 dark:bg-green-700 rounded text-center px-3 lg:px-12 py-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
										  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
										</svg>
                  </div>
                  <div><span class="js-vote-result"><?php echo get_vote_count($currentId, 'meta_up_'); ?></span></div>
                </div>  
              </div>
              <!-- END Up -->

              <!-- Down -->
              <div class="w-1/2 lg:w-auto cursor-pointer px-2 lg:px-4 js-vote-item" data-vote-item="meta_down_">
                <div class="flex justify-center items-center bg-red-100 dark:bg-red-700 rounded text-center px-3 lg:px-12 py-2">
                  <div class="mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5" />
                    </svg>
                  </div>
                  <div><span class="js-vote-result"><?php echo get_vote_count($currentId, 'meta_down_'); ?></span></div>
                </div>  
              </div>
              <!-- END Down -->
            </div>
          </div>
          <div>
            <div class="flex items-center mb-3">
              <div class="mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                </svg>
              </div>
              <div class="text-2xl font-bold uppercase">
                <?php _e("Поширити", "treba-wp"); ?>
              </div>
            </div>
            <div><?php do_action('show_social_share_buttons'); ?></div>
          </div>
        </div>  
        <div class="lg:shadow-xl lg:rounded-xl lg:border border-gray-200 lg:p-8 mb-16">
          <div class="text-2xl mb-6"><?php _e("Схожі записи", "treba-wp"); ?></div>
          <div>
            <?php 
              $current_id = get_the_ID();
              $custom_query = new WP_Query( array( 
              'post_type' => 'post', 
              'posts_per_page' => 5,
              'post__not_in' => array($current_id),
              'tax_query' => array(
                array(
                  'taxonomy' => 'category',
                  'terms' => $category_id,
                  'field' => 'term_id',
                  'include_children' => true,
                  'operator' => 'IN'
                )
              ),
            ) );
            if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
              <div class="relative flex mb-4 last:mb-0">
                <div class="mr-2"><img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>" alt="" loading="lazy" class="w-[50px] h-[50px] min-h-[50px] min-w-[50px] object-cover"></div>
                <div>
                  <div class="text-lg"><a href="<?php the_permalink(); ?>" class="hover:text-indigo-500"><?php the_title(); ?></a></div>
                  <div class="text-sm opacity-75"><?php _e("Переглядів", "treba-wp"); ?>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
                </div>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
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