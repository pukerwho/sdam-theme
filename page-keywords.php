<?php
/*
Template Name: Get keywords
*/
?>
<?php get_header(); ?>

<div class="container">
  <table class="min-w-full bg-white rounded-lg">
    <tbody>
      <?php
      $cities = get_terms( array( 
        'taxonomy' => 'city',
        'orderby' => 'count',
        'parent' => 0,
      ) );
      foreach ($cities as $city):
      ?>
        <tr class="border-b">
          <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">снять квартиру <?php echo $city->name; ?></td>
          <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo get_term_link($city->term_id, 'city') ?></td>
        </tr>
        <tr class="border-b">
          <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">долгосрочная аренда квартиры <?php echo $city->name; ?></td>
          <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo get_term_link($city->term_id, 'city') ?></td>
        </tr>
        <tr class="border-b">
          <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">аренда квартиры <?php echo $city->name; ?></td>
          <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo get_term_link($city->term_id, 'city') ?></td>
        </tr>
        <tr class="border-b">
          <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">снять квартиру помесячно <?php echo $city->name; ?></td>
          <td class="text-gray-900 font-light px-6 py-4 whitespace-nowrap"><?php echo get_term_link($city->term_id, 'city') ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php get_footer(); ?>