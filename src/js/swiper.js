// import Swiper JS
import Swiper from 'swiper';
// import Swiper styles
import 'swiper/css';

var swiper = new Swiper(".swiper-cases", {
  slidesPerView: 3,
  spaceBetween: 30,
  breakpoints: {
    // when window width is >= 320px
    320: {
      slidesPerView: 2,
      spaceBetween: 20
    },
    1024: {
      slidesPerView: 3,
      spaceBetween: 30
    }
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});