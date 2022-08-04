const { gsap } = require("gsap/dist/gsap");
const { ScrollTrigger } = require("gsap/dist/ScrollTrigger");

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('DOMContentLoaded', function(){

  //Animate Treba 
  function onEntry(entry) {
    entry.forEach(change => {
      if (change.isIntersecting) {
        change.target.classList.add('treba-show');
      }
    });
  }

  let options = {
    threshold: [0.5]
  };
  let observer = new IntersectionObserver(onEntry, options);
  let elements = document.querySelectorAll('.treba-animate');

  for (let elm of elements) {
    observer.observe(elm);
  }


  let animateWelcomeImages = gsap.timeline({
    scrollTrigger: {
      trigger: '.welcome',
      scrub: true
    },
  });
  animateWelcomeImages.from('.welcome-image-scroll', { backgroundPosition: '50% 100%', y: 0 });
  animateWelcomeImages.to('.welcome-image-scroll', { backgroundPosition: '50% 0%', y: -50 });

  gsap.to('.clients-animate', { translateX: "-100%", duration: 20, ease: "none", repeat: -1 });

  let photoWithBgStyleOne = gsap.timeline({
    scrollTrigger: {
      trigger: '.photo-bg-style-one-animate',
      scrub: true
    },
  });
  photoWithBgStyleOne.from('.photo-bg-style-one-animate', { left: '-1rem', top: '-1rem' });
  photoWithBgStyleOne.to('.photo-bg-style-one-animate', { left: '0', top: '0' });

  let blockTopAnimate = gsap.timeline({
    scrollTrigger: {
      trigger: '.block-top-animate',
      scrub: true,
      start: 'top bottom',
      end: 'top 0px',
    },
  });
  blockTopAnimate.from('.block-top-animate', { translateY: '50px', opacity: 0 });
  blockTopAnimate.to('.block-top-animate', { translateY: '0px', opacity: 1 });

  let blockTopBigAnimate = gsap.timeline({
    scrollTrigger: {
      trigger: '.block-top-big-animate',
      scrub: true,
      start: 'top bottom',
      end: 'top 0px',
    },
  });
  blockTopBigAnimate.from('.block-top-big-animate', { translateY: '100px', opacity: 0 });
  blockTopBigAnimate.to('.block-top-big-animate', { translateY: '0px', opacity: 1 });

  let footerWaveAnimate = gsap.timeline({
    scrollTrigger: {
      trigger: '.footer-wave-animate',
      scrub: true,
      start: 'bottom bottom',
      end: 'top 0px',
    },
  });
  footerWaveAnimate.from('.footer-wave-animate', { translateY: '50%' });
  footerWaveAnimate.to('.footer-wave-animate', { translateY: '0' });

  let aromabrandingSubtitle = gsap.timeline({
    scrollTrigger: {
      trigger: '.aromabranding-subtitle',
      scrub: true,
      start: 'bottom bottom',
      end: 'top 0px',
    },
  });
  aromabrandingSubtitle.from('.aromabranding-subtitle', { translateY: '0%' });
  aromabrandingSubtitle.to('.aromabranding-subtitle', { translateY: '-100%' });
  
  // CASE ITEMS
  // let caseItems = document.querySelectorAll('.case-item-animation');
  // caseItems.forEach((item) => {
  //   let caseItemContent = gsap.timeline({
  //     scrollTrigger: {
  //       trigger: item,
  //       scrub: true,
  //       start: "bottom bottom",
  //       end: "center 20%",
  //       immediateRender: false,
  //       markers: true
  //     },
  //   });
  //   caseItemContent.from(item, { autoAlpha: 0  });
  //   caseItemContent.to(item, { autoAlpha: 1  });
  //   caseItemContent.to(item, { autoAlpha: 0  });
  // });
  

  gsap.timeline().to('.welcome-image', { className: 'welcome-image welcome-image-scroll show-treba' }, '+=0.25');
  gsap.timeline().to('.welcome-image-bg', { className: 'welcome-image-bg show-treba' }, '+=0.25');
  gsap.timeline().to('.welcome-title', { className: 'welcome-title welcome-image-scroll show-treba font-title' }, '+=0.5');
  gsap.timeline().to('.welcome-description', { className: 'welcome-description show-treba' }, '+=0.75');
  gsap.timeline().to('.welcome-btn', { className: 'welcome-btn show-treba btn-primary' }, '+=1');
  gsap.timeline().to('.home .header', { className: 'header show-treba' }, '+=1.25');
  
  
  // gsap.to(".animate-treba", {
  //   className: "+=active",
  //   ease: "power1.inOut",
  //   delay: 2,
  //   repeat: -1,
  //   yoyo: true,
  //   repeatDelay: 2,
  //   duration: 2
  // });
});




//Border WP on Welcome Block
let animateWpCircle = gsap.timeline({
  scrollTrigger: {
    trigger: '.welcome',
    start: 'top top',
    end: 'bottom 100px',
    scrub: true
  },
})

animateWpCircle.from('.animate-wp-cirlce', { strokeDashoffset: '1000' });
animateWpCircle.to('.animate-wp-cirlce', { strokeDashoffset: '920' })

//Project items first
let animateProjectsItemsFirst = gsap.timeline({
  scrollTrigger: {
    trigger: '.project-items-first',
    start: 'top bottom',
    end: 'top 0px',
    scrub: true
  },
})

animateProjectsItemsFirst.from('.project-items-first', { y: 50 });
animateProjectsItemsFirst.to('.project-items-first', { y: 0 })

//Arrow-Down
let animateArrowDown = gsap.timeline({
  scrollTrigger: {
    trigger: '.animate-arrow-down',
    start: 'top bottom',
    end: 'top 0px',
    scrub: true
  },
})

animateArrowDown.from('.animate-arrow-down', { height: 0, y: 50 });
animateArrowDown.to('.animate-arrow-down', { height: 106, y: 0 })

//Project items second
let animateProjectsItemsSecond = gsap.timeline({
  scrollTrigger: {
    trigger: '.project-items-second',
    start: 'top bottom',
    end: 'top 0px',
    scrub: true
  },
})

animateProjectsItemsSecond.from('.project-items-second', { y: 150 });
animateProjectsItemsSecond.to('.project-items-second', { y: 0 })

//Project items third
let animateProjectsItemsThird = gsap.timeline({
  scrollTrigger: {
    trigger: '.project-items-third',
    start: 'top bottom',
    end: 'top 0px',
    scrub: true
  },
})

animateProjectsItemsThird.from('.project-items-third', { y: 50 });
animateProjectsItemsThird.to('.project-items-third', { y: 0 })

//Project items fourth
let animateProjectsItemsFourth = gsap.timeline({
  scrollTrigger: {
    trigger: '.project-items-fourth',
    start: 'top bottom',
    end: 'top 100px',
    scrub: true
  },
})

animateProjectsItemsFourth.from('.project-items-fourth', { y: 150 });
animateProjectsItemsFourth.to('.project-items-fourth', { y: 0 })

//About Quote
let animateAboutQuote = gsap.timeline({
  scrollTrigger: {
    trigger: '.animate-about-quote',
    start: '+=50 bottom',
    end: 'top 0',
    scrub: true
  },
})

animateAboutQuote.from('.animate-about-quote', { y: -55 });
animateAboutQuote.to('.animate-about-quote', { y: 0 })

//About Contact H2
let animateContactH2 = gsap.timeline({
  scrollTrigger: {
    trigger: '.animate-contact-h2',
    start: '+=50 bottom',
    end: 'top 0',
    scrub: true
  },
})

animateContactH2.from('.animate-contact-h2', { y: -65 });
animateContactH2.to('.animate-contact-h2', { y: 0 })

//About Contact BTN
let animateContactBtn = gsap.timeline({
  scrollTrigger: {
    trigger: '.animate-contact-btn',
    start: '+=50 bottom',
    end: 'top 0',
    scrub: true
  },
})

animateContactBtn.from('.animate-contact-btn', { y: 65 });
animateContactBtn.to('.animate-contact-btn', { y: 0 })

//Animate Gutenberg Photos
let animateGutenbergPhotos = gsap.timeline({
  scrollTrigger: {
    trigger: '.animation-gutenberg',
    start: '-=350 bottom',
    end: 'top top',
    scrub: true
  },
})

animateGutenbergPhotos.from('.animation-gutenberg', { y: 0 });
animateGutenbergPhotos.to('.animation-gutenberg', { y: -350 })

//Animate Y axis
let animateY = document.querySelectorAll('.animation-y');
animateY.forEach((item) => {
  let animateItem = gsap.timeline({
    scrollTrigger: {
      trigger: item,
      start: 'top bottom',
      end: 'top 0px',
      // scrub: true
    },
  })
  animateItem.from(item, { y: 100, duration: 1 });
  animateItem.to(item, { y: 0 })
})