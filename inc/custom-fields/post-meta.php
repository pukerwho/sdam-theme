<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'crb_post_theme_options' );
function crb_post_theme_options() {
	Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'post' )
    ->add_fields( array(
      // Field::make( 'text', 'crb_post_timetoread', 'Time to read'),
  ) );
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'products' )
    ->add_fields( array(
      Field::make( 'media_gallery', 'crb_product_gallery', 'Галерея' )->set_type( array( 'image' ) ),
      Field::make( 'complex', 'crb_product_content', 'Blocks' )->set_layout('tabbed-horizontal')->add_fields( array(
        Field::make( 'text', 'crb_product_content_title', 'Заголовок' ),
        Field::make( 'rich_text', 'crb_product_content_text', 'Текст' ),
      )),
  ) ); 
  Container::make( 'post_meta', 'More' )
    ->where( 'post_type', '=', 'places' )
    ->add_fields( array(
      Field::make( 'textarea', 'crb_array_images', 'Images Ru' ),
      Field::make( 'text', 'crb_places_author', 'Хто додав' ),
      Field::make( 'media_gallery', 'crb_places_gallery', 'Галерея' )->set_type( array( 'image' ) ),
      Field::make( 'text', 'crb_places_address', 'Адрес' ),
      Field::make( 'text', 'crb_places_phone', 'Телефон' ),
      Field::make( 'text', 'crb_places_count_rooms', 'Кілкість кімнат' ),
      Field::make( 'text', 'crb_places_price', 'Ціна' ),
      Field::make( 'text', 'crb_places_square', 'Площа' ),
      Field::make( 'text', 'crb_places_floor', 'Поверх' ),
      
      Field::make( 'text', 'crb_ad_transportnarozvyazka', 'Транспортна розв/язка' ),
      Field::make( 'text', 'crb_ad_supermarket', 'Супермаркет' ),
      Field::make( 'text', 'crb_ad_school', 'Школа' ),
      Field::make( 'text', 'crb_ad_dutsadok', 'Дитячий садочок' ),
      Field::make( 'text', 'crb_ad_dutmaidanchik', 'Дитячий майданчик' ),
      Field::make( 'text', 'crb_ad_apteka', 'Аптека' ),
      Field::make( 'text', 'crb_ad_likarnya', 'Лікарня' ),
      Field::make( 'text', 'crb_ad_poshta', 'Відділеня пошти' ),
      Field::make( 'text', 'crb_ad_bank', 'Відділеня банку' ),

      Field::make( 'text', 'crb_ad_lichilnyky', 'Лічильники' ),
      Field::make( 'text', 'crb_ad_wifi', 'Wi-fi' ),
      Field::make( 'text', 'crb_ad_pralnamashina', 'Пральна машинка' ),
      Field::make( 'text', 'crb_ad_mikrovolnovka', 'Мікрохвильовка' ),
      Field::make( 'text', 'crb_ad_konditcioner', 'Кондиціонер' ),
      Field::make( 'text', 'crb_ad_boyler', 'Бойлер' ),
      Field::make( 'text', 'crb_ad_televizor', 'Телевізор' ),
      Field::make( 'text', 'crb_ad_posud', 'Посудомийна машина' ),
      Field::make( 'text', 'crb_ad_ostekleniybalkon', 'Засклений балкон' ),

      Field::make( 'text', 'crb_ad_ztvarinami', 'Чи можна з тваринами?' ),
      Field::make( 'text', 'crb_ad_zditmy', 'Чи можна з маленькими дітьми?' ),
      Field::make( 'text', 'crb_ad_studentam', 'Чи можна студентам' ),
      Field::make( 'text', 'crb_ad_kyryashim', 'Можна палити?' ),
      
      Field::make( 'text', 'crb_places_rating', 'Рейтинг' ),
      Field::make( 'text', 'crb_places_rating_count', 'Кількість оцінок' ),
      
      
  ) );  
}

?>