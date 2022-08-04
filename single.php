<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php 
  $currentId = get_the_ID();
  $countNumber = tutCount($currentId);
?>
<div class="hidden postID"><?php echo get_the_ID(); ?></div>
<div class="space-top">
  <main id="primary" class="mb-20 py-10 xl:py-20" itemscope itemtype="http://schema.org/Article">
    <div class="container">
      <div class="w-full xl:w-2/3 mx-auto">
        <div class="relative mb-10">
          <div class="w-full h-full absolute -left-2 -top-4" style="background: url( <?php echo get_stylesheet_directory_uri(); ?>/images/aroma-pattern-small.svg );">
          </div>
          <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="w-full h-[350px] object-cover relative rounded-lg" loading="lazy" itemprop="image">
        </div>
        <h1 class="text-4xl font-title uppercase mb-10" itemprop="headline"><?php the_title(); ?></h1>
        <div class="flex flex-wrap -mx-4 mb-4">
          <?php
          $post_categories = get_the_terms( get_the_ID(), 'category' );
          foreach ($post_categories as $post_category){ ?>
            <div class="px-4"><a href="<?php echo get_term_link($post_category->term_id, 'category') ?>" class="inline-block bg-orange-100 text-black hover:text-black hover:bg-orange-200 rounded px-4 py-2 mb-2"><?php echo $post_category->name; ?></a></div>
          <?php } ?>
        </div>
        <div class="flex items-center text-sm text-gray-300 mb-6">
          <div class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <?php echo get_the_date('d.m.Y'); ?>
          </div>
        </div>
        <div class="content mb-20" itemprop="articleBody"><?php the_content(); ?></div>
      </div>
    </div>
    <!-- Consultation -->
    <div class="my-12 lg:my-24">
      <?php echo get_template_part('template-parts/components/consultation'); ?>
    </div>
    <!-- Хлебные крошки -->
    <div class="border-y dark:border-none border-gray-900 py-3 mb-20">
      <div class="container">
        <div class="w-full xl:w-2/3 flex items-center mx-auto">
          <div class="breadcrumbs text-sm text-gray-800 dark:text-gray-200" itemprop="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
            <ul class="flex items-center flex-wrap -mx-4">
              <li itemprop='itemListElement' itemscope itemtype='https://schema.org/ListItem' class="breadcrumbs_item px-4">
                <a itemprop="item" href="<?php echo home_url(); ?>" class="text-orange-400 dark:text-orange-200">
                  <span itemprop="name"><?php _e( 'Головна', 'treba-wp' ); ?></span>
                </a>                        
                <meta itemprop="position" content="1">
              </li>
              <li itemprop='itemListElement' itemscope itemtype='http://schema.org/ListItem' class="breadcrumbs_item px-4">
                <a itemprop="item" href="<?php echo get_post_type_archive_link('post'); ?>" class="text-orange-400 dark:text-orange-200">
                  <span itemprop="name"><?php _e( 'Блог', 'treba-wp' ); ?></span>
                </a>                        
                <meta itemprop="position" content="2">
              </li>
              <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem" class="breadcrumbs_item text-gray-300 px-4">
                <span itemprop="name"><?php the_title(); ?></span>
                <meta itemprop="position" content="3" />
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- END Хлебные крошки -->

    <div class="container">
      <div class="w-full">
        <!-- RELATED POSTS -->
        <div class="flex flex-wrap flex-col lg:flex-row">
          <h2 class="text-3xl font-title mb-12"><?php _e('Рекомендовані статті', 'treba-wp'); ?></h2>
          <div class="flex flex-wrap -mx-6 mb-10 xl:mb-12">
            <?php 
              $current_id = get_the_ID();
              $query = new WP_Query( array( 
                'post_type' => 'post', 
                'posts_per_page' => 3,
                'order'    => 'DESC',
                'post__not_in' => array($current_id),
              ) );
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <div class="w-full xl:w-1/3 xl:min-w-[250px] px-6 mb-6 xl:mb-0">
                <?php echo get_template_part('template-parts/components/blog-card'); ?>
              </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
          </div>
        </div>
        <!-- END LATEST POSTS -->
      </div>
    </div>
  </main>
</div>

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>