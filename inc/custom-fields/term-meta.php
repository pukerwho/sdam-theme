<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_term_options' );
function crb_term_options() {
  Container::make( 'term_meta', __( 'Term Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'services-category' )
  ->add_fields( array(
    Field::make( 'image', 'crb_services_cat_image', 'Заглавная картинка' ),
    Field::make( 'rich_text', 'crb_services_cat_content', 'Текст' ),
  ));

  Container::make( 'term_meta', __( 'City Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'city' ) // only show our new field for categories
  ->add_fields( array(
    Field::make( 'image', 'crb_city_img', 'Заглавная картинка' )->set_value_type( 'url'),
    Field::make( 'association', 'crb_city_district', 'Райони' )
      ->set_duplicates_allowed( true )
      ->set_types( array(
        array(
          'type'      => 'term',
          'taxonomy' => 'district',
        )
      ) ),
    Field::make( 'rich_text', 'crb_city_seo_text', 'SE-O Текст' ),
  ));

  Container::make( 'term_meta', __( 'City Options', 'crb' ) )
  ->where( 'term_taxonomy', '=', 'district' ) // only show our new field for categories
  ->add_fields( array(
    
  ));
}

?>
