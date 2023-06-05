<?php 

//Meta city
function meta_city($term_id, $meta, $value) {
  $tr_array_id = array();
  $tr_ids = pll_get_term_translations($term_id);
  foreach ($tr_ids as $tr_id) {
    array_push($tr_array_id, $tr_id);
  }
  foreach ($tr_array_id as $id) {
    if ( metadata_exists( 'term', $id, $meta ) ) {
      $city_meta = get_term_meta( $id, $meta, true );
      return $city_meta;
    } else {
      add_term_meta( $id, $meta, $value, true );
      $city_meta = get_term_meta( $id, $meta, true );
      return $city_meta;
    }
  }
}

?>