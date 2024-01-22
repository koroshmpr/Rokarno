require('./bootstrap');
import $ from 'jquery';
import 'swiper/css';
import Swiper from 'swiper/bundle';
import AOS from 'aos';
import 'aos/dist/aos.css';
$(document).ready(function () {
    setTimeout(function () {
        $('#preloader').fadeOut('slow');
    }, 4000);
});

document.addEventListener('DOMContentLoaded', function () {
    AOS.init();
    const cursor = document.getElementById('cursor');
    const stalker = document.getElementById('stalker');
    const allLinks = document.querySelectorAll('a');
    const allButtons = document.querySelectorAll('button');

// Function to add event listeners to elements
    const addEventListeners = (elements) => {
        elements.forEach(element => {
            element.addEventListener('mouseover', () => {
                cursor.classList.add('cursorHover');
            });

            element.addEventListener('mouseout', () => {
                cursor.classList.remove('cursorHover');
            });
        });
    };

// Add event listeners to links and buttons
    addEventListeners(allLinks);
    addEventListeners(allButtons);
    document.addEventListener('mousemove', (event) => {

        const x = event.clientX;
        const y = event.clientY;
        cursor.style.transform = `translate(${x}px, ${y}px)`;
        stalker.style.transform = `translate(${x}px, ${y}px)`;
    });
    const backToTop = document.getElementById("backToTop");

    function backtoTopHandler() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }

    if (backToTop) {
        backToTop.addEventListener('click', backtoTopHandler)
    }
    const video = document.getElementById('homeVideo');
    const playButton = document.getElementById('playButton');

    if (video) {
        if (video.paused) {
            playButton.classList.remove('opacity-0');
        }

        if (playButton) {
            playButton.addEventListener('click', function () {
                if (video.paused) {
                    video.play();
                    video.setAttribute('controls', 'true');
                    playButton.classList.add('opacity-0');
                }
            });
        }
    }

    const swiper = new Swiper('.product_image_swiper', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1,
        spaceBetween: 20,
        grabCursor: true,
        centeredSlides: true,
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
    // const card = new Swiper('.card-slide', {
    //     loop: false,
    //     effect: 'slide',
    //     speed: 500,
    //     slidesPerView: 1.2,
    //     spaceBetween: 20,
    //     grabCursor: true,
    //     direction: 'horizontal',
    //     pagination: {
    //         el: '.swiper-pagination',
    //         clickable: true
    //     },
    //     navigation: {
    //         nextEl: '.swiper-button-next',
    //         prevEl: '.swiper-button-prev',
    //     },
    //     breakpoints: {
    //         992: {
    //             slidesPerView: 6,
    //
    //         }
    //     },
    //     autoplay: {
    //         delay: 5000,
    //     },
    //     disableOnInteraction: false,
    // });
    const heroSlider = new Swiper('.hero_slider', {
        direction: 'horizontal',
        slidesPerView: 1,
        spaceBetween: 0,
        grabCursor: true,
        mousewheel: {
            invert: false,
            sensitivity: 3
        },
        speed: 1500,
        keyboard: {
            enabled: true,
            onlyInViewport: true, // Ensures the keyboard control only works when Swiper is in viewport
        },
        effect: 'slide',
        on: {
            init: function () {
                const slides = this.slides;

                // Add 'aos-animate' class to all slides except the first one during initialization
                slides.forEach(function (slide, index) {
                    if (index != 0) {
                        let elementsWithAos = slide.querySelectorAll('[data-aos]');
                        elementsWithAos.forEach(function (element) {
                            element.classList.remove('aos-animate');
                        });
                    }
                });
            },
            slideChange: function () {
                const activeSlideIndex = this.realIndex;
                const slides = this.slides;

                // Remove 'aos-animate' class from all elements
                slides.forEach(function (slide) {
                    let elementsWithAos = slide.querySelectorAll('[data-aos]');
                    elementsWithAos.forEach(function (element) {
                        element.classList.remove('aos-animate');
                    });
                });

                // Add 'aos-animate' class to the active slide elements
                let activeSlideElements = slides[activeSlideIndex].querySelectorAll('[data-aos]');
                activeSlideElements.forEach(function (element) {
                    element.classList.add('aos-animate');
                });
                video.pause();
                playButton.classList.remove('opacity-0');
            }
        }
    });
})
