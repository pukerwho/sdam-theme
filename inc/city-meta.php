<?php 

//Meta city
function meta_city($term_id, $meta, $value) {
  if ( metadata_exists( 'term', $term_id, $meta ) ) {
    $city_meta = get_term_meta( $term_id, $meta, true );
    return $city_meta;
  } else {
    add_term_meta( $term_id, $meta, $value, true );
    $city_meta = get_term_meta( $term_id, $meta, true );
    return $city_meta;
  }
}

?>