// Hero slider
const heroSwiper = new Swiper('.hero', {
    loop: true,
    speed: 600,
    effect: 'fade',
    fadeEffect: { crossFade: true },
    autoplay: { delay: 5000, disableOnInteraction: false },
});

// Bind hero custom buttons
document.getElementById('custom-next').addEventListener('click', () => {
    heroSwiper.slideNext();
});
document.getElementById('custom-prev').addEventListener('click', () => {
    heroSwiper.slidePrev();
});

// 3-grid slider
 

// Loop through all sliderContainers
  document.querySelectorAll('.sliderContainer').forEach(container => {
    // Find the buttons within the same section as the container
    const section = container.closest('section'); // get parent section
    const nextBtn = section.querySelector('.nextBtn');
    const prevBtn = section.querySelector('.prevBtn');

    new Swiper(container, {
      slidesPerView: 1,
      spaceBetween: 24,
      loop: false,
      speed: 600,
      breakpoints: {
        640: { slidesPerView: 2, spaceBetween: 16 },
        768: { slidesPerView: 2, spaceBetween: 24 },
        1024: { slidesPerView: 3, spaceBetween: 24 },
        1280: { slidesPerView: 3, spaceBetween: 32 },
      },
      navigation: {
        nextEl: nextBtn,
        prevEl: prevBtn,
      },
    });
  });


// Show More / Show Less for extra cards
const btn = document.getElementById("showMoreBtn");
const cards = document.querySelectorAll(".extra-card");

let expanded = false;

btn.addEventListener("click", () => {
    expanded = !expanded;

    cards.forEach((card, index) => {
        if (expanded) {
            card.classList.remove("hidden");
            requestAnimationFrame(() => {
                setTimeout(() => {
                    card.classList.remove("opacity-0", "translate-y-6", "scale-95");
                    card.classList.add("opacity-100", "translate-y-0", "scale-100");
                }, index * 120);
            });
        } else {
            card.classList.add("opacity-0", "translate-y-6", "scale-95");
            card.classList.remove("opacity-100", "translate-y-0", "scale-100");
            setTimeout(() => card.classList.add("hidden"), 500);
        }
    });

    btn.textContent = expanded ? "Show Less" : "Show More";
});

//  