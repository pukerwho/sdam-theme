<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <?php 
    $currentId = get_the_ID();
    $countNumber = tutCount($currentId);
  ?>

  <div class="container py-8 xl:py-12">
    
    <div class="flex flex-wrap xl:-mx-10">
      <div class="w-full xl:w-2/3 xl:px-10 mb-10 lg:mb-0">
        <div class="lg:shadow-xl lg:rounded-xl lg:border border-gray-200 lg:p-8 mb-16">
          <div class="mb-4">
            <?php 
            $city_terms = wp_get_post_terms(  get_the_ID() , 'city', array( 'parent' => 0 ) );
            foreach (array_slice($city_terms, 0,1) as $city_term):
            ?>
              <?php if ($city_term): ?>
                <a href="<?php echo get_term_link($city_term); ?>" class="text-indigo-500 hover:text-indigo-500 hover:border-b-2 hover:border-indigo-500 font-semibold">#<?php echo $city_term->name; ?></a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
          <h1 class="text-2xl xl:text-3xl mb-6"><?php the_title(); ?></h1>
          <div class="mb-6">
            <div class="mb-2">🗓️ <span class="font-bold"><?php _e("Додано на сайт", "treba-wp"); ?></span>: <?php echo get_the_date('d.m.Y'); ?></div>
            <div class="border-b pb-4 mb-4">👀 <span class="font-bold"><?php _e("Переглядів", "treba-wp"); ?></span>: <?php echo get_post_meta( get_the_ID(), 'post_count', true ); ?></div>
            <div class="mb-2"><span class="font-bold">📍 <?php _e("Адреса", "treba-wp"); ?>:</span> <?php echo carbon_get_the_post_meta('crb_places_address'); ?></div>
            <div><span class="font-bold">☎️ <?php _e("Телефон", "treba-wp"); ?>:</span> <?php echo carbon_get_the_post_meta('crb_places_phone'); ?></div>
          </div>
          
          <h2 class="text-2xl font-bold mb-4"><span class="border-b-4 border-indigo-300"><?php _e("Опис", "treba-wp"); ?></span></h2>
          <div class="content mb-8">
            <?php the_content(); ?>
          </div>
          <div class="mb-6">
            <?php $getField = carbon_get_the_post_meta('crb_ad_zditmy'); ?>
            <div class="text-base bg-indigo-100 dark:bg-gray-600 rounded px-4 py-3 mb-2"><span class="mr-4">👶 <?php _e("Чи можна з маленькими дітьми?", "treba-wp"); ?></span> -  <span class="ml-4 font-bold"><?php  echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). ''; ?></span></div>

            <?php $getField = carbon_get_the_post_meta('crb_ad_ztvarinami'); ?>
            <div class="text-base bg-indigo-100 dark:bg-gray-600 rounded px-4 py-3 mb-2"><span class="mr-4">🐕 <?php _e("Чи можна з тваринами?", "treba-wp"); ?></span> -  <span class="ml-4 font-bold"><?php  echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). ''; ?></span></div>

            <?php $getField = carbon_get_the_post_meta('crb_ad_studentam'); ?>
            <div class="text-base bg-indigo-100 dark:bg-gray-600 rounded px-4 py-3 mb-2"><span class="mr-4">👨‍🎓 <?php _e("Чи можна студентам?", "treba-wp"); ?></span> -  <span class="ml-4 font-bold"><?php  echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). ''; ?></span></div>

            <?php $getField = carbon_get_the_post_meta('crb_ad_kyryashim'); ?>
            <div class="text-base bg-indigo-100 dark:bg-gray-600 rounded px-4 py-3 mb-2"><span class="mr-4">🚬 <?php _e("Чи можна палити у квартирі?", "treba-wp"); ?></span> -  <span class="ml-4 font-bold"><?php  echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). ''; ?></span></div>

          </div>
          <div class="flex flex-col xl:flex-row xl:-mx-4 mb-8">
            <?php if (carbon_get_the_post_meta('crb_places_count_rooms')): ?>
              <div class="xl:px-4 mb-2 xl:mb-0"><span class="font-bold"><?php _e("Кімнат", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_count_rooms'); ?>;</div>
            <?php endif; ?>
            <?php if (carbon_get_the_post_meta('crb_places_square')): ?>
              <div class="xl:px-4 mb-2 xl:mb-0xl:mb-0"><span class="font-bold"><?php _e("Площа", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_square'); ?>;</div>
            <?php endif; ?>
            <?php if (carbon_get_the_post_meta('crb_places_floor')): ?>
              <div class="xl:px-4 mb-2 xl:mb-0"><span class="font-bold"><?php _e("Поверх", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_floor'); ?>;</div>
            <?php endif; ?>
          </div>
          <div class="mb-12">
            <h2 class="text-2xl font-bold mb-4"><span class="border-b-4 border-indigo-300"><?php _e("Зручності", "treba-wp"); ?></span></h2>  
            <table class="w-full table-auto">
              <thead class="bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-300 border border-gray-200 dark:border-gray-600 uppercase">
                <tr>
                  <th class="text-left whitespace-nowrap px-2 py-3">
                    <div class="text-left font-bold"><?php _e("Назва", "tarakan"); ?></div>
                  </th>
                  <th class="text-left whitespace-nowrap px-2 py-3">
                    <div class="text-left font-bold"><?php _e("Наявність", "tarakan"); ?></div>
                  </th>
                </tr>
              </thead>
              <tbody class="text-sm shadow-2xl">
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Лічильники", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_lichilnyky');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Wi-fi", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_wifi');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Пральна машина", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_pralnamashina');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Мікрохвильовка", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_mikrovolnovka');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Кондиціонер", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_konditcioner');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Бойлер", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_boyler');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Телевізор", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_televizor');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Посудомийна машина", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_posud');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
                <!-- TR ROW -->
                <tr class="border-b border-gray-300 dark:border-gray-700">
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300 font-bold"><?php _e("Засклений балкон", "treba-wp"); ?></div>
                  </td>
                  <td class="whitespace-nowrap px-2 py-3">
                    <div class="text-gray-500 dark:text-gray-300">
                      <?php
                        $getField = carbon_get_the_post_meta('crb_ad_ostekleniybalkon');
                        echo ($getField === 'yes') ? ''. _e("✅ Так", "treba-wp").'' : ''. _e("❌ Ні", "treba-wp"). '';
                      ?>
                    </div>
                  </td>
                </tr>
                <!-- END TR ROW -->
              </tbody>
            </table>
          </div>
          <div class="mb-6">
            <h2 class="text-2xl font-bold mb-4"><span class="border-b-4 border-indigo-300"><?php _e("Поруч", "treba-wp"); ?></span></h2>
            <div class="flex items-center flex-wrap -mx-2">
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_transportnarozvyazka') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Зупинка транспорту", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_supermarket') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Супермаркет", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_school') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Школа", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_dutsadok') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Дитячий садочок", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_dutmaidanchik') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Дитячий майданчик", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_apteka') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Аптека", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_likarnya') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Лікарня", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_poshta') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Відділення пошти", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
              <!-- Item -->
              <?php if (carbon_get_the_post_meta('crb_ad_bank') === "yes"): ?>
              <div class="mb-2 px-2">
                <div class="bg-gray-200 dark:bg-gray-600 rounded-lg px-4 py-2"><?php _e("Відділення банку", "treba-wp"); ?></div>
              </div>
              <?php endif; ?>
              <!-- END Item -->
            </div>
          </div>
          <h2 class="text-2xl font-bold mb-4"><span class="border-b-4 border-indigo-300"><?php _e("Галерея", "treba-wp"); ?></span></h2>
          <div class="mb-6">
            <div class="flex flex-wrap items-center -mx-3 mb-4">
              <?php 
                $attimages = get_attached_media('image', $currentId);
                foreach ($attimages as $image): 
              ?>
              <div class="w-1/2 lg:w-1/4 px-3 mb-2">
                <a href="<?php echo wp_get_attachment_image_src($image->ID, 'large')[0]; ?>" data-lightbox="product-gallery" data-title="<?php the_title(); ?>">
                  <img src="<?php echo wp_get_attachment_image_src($image->ID, 'medium')[0]; ?>" loading="lazy" class="w-full h-24 lg:h-32 object-cover bg-custom-gray dark:bg-dark-xl rounded-lg"> 
                </a>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="mb-6">
            <div class="text-xl"><span class="border-b-4 border-indigo-300 font-bold"><?php _e("Ціна", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_price'); ?></div>
          </div>
          <div class="bg-yellow-200 dark:bg-gray-600 rounded-lg px-6 py-3 mb-6">
            <span class="text-xl font-bold"><?php _e("Рейтинг оголошення", "treba-wp"); ?>:</span> <?php echo carbon_get_the_post_meta('crb_places_rating'); ?>/5 (<?php _e("Оцінок", "treba-wp"); ?>: <?php echo carbon_get_the_post_meta('crb_places_rating_count'); ?>)
          </div>
          <div>
            <?php if (carbon_get_the_post_meta('crb_places_author')): ?>
              <div class="border-t border-t-gray-200 pt-4"><span class="font-bold"><?php _e("Додав", "treba-wp"); ?></span>: <?php echo carbon_get_the_post_meta('crb_places_author'); ?></div>
            <?php endif; ?>
          </div>
        </div>  
        <div>
          <div class="text-2xl mb-6"><span class="border-b-4 border-indigo-300 font-bold"><?php _e("Коментарі", "treba-wp"); ?></span></div>
          <div class="content">
            <?php comments_template(); ?>
          </div>
        </div>    
      </div>
      <div class="w-full xl:w-1/3 xl:px-10">
        <?php get_template_part('template-parts/sidebar'); ?>
      </div>
    </div>
  </div>

<?php endwhile; endif; wp_reset_postdata(); ?>
<?php get_footer(); ?>