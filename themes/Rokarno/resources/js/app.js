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
    let lan = currentLanguage.language ;
    const toggleScrollClass = function () {
        if (window.scrollY > 30) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    };
    window.addEventListener('scroll', toggleScrollClass);
    AOS.init();
    function addCollapse(menuId, iconClass) {
        // Select the menu by its ID
        let menu = $(`#${menuId}`);

        // Counter for generating unique IDs
        let uniqueIdCounter = 1;

        // Find <li> elements with the "menu-item-has-children" class
        menu.find('li.menu-item-has-children').each(function () {
            let listItem = $(this);

            // Find the anchor link
            let anchor = listItem.children('a');
            let anchorHref = anchor.attr('href');
            let hasLink = anchorHref && anchorHref !== '#';

            // Generate a unique ID for the submenu
            let submenuId = `${menuId}-submenu-${uniqueIdCounter}`;

            // Add a button after the anchor link
            anchor.after(`<button type="button" class="btn btn-link ${iconClass} collapsed" data-bs-toggle="collapse" data-bs-target="#${submenuId}">
                    <svg  width="20" height="20" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                    </svg>
                </button>`);

            // Set attributes for Bootstrap collapse
            let submenu = listItem.find('ul.sub-menu');
            submenu.attr('id', submenuId);
            submenu.addClass('collapse');

            // Increment the unique ID counter
            uniqueIdCounter++;

            if (hasLink == false) {
                anchor.removeAttr('href'); // Remove href to prevent navigation
                anchor.attr('data-bs-toggle', 'collapse');
                anchor.attr('data-bs-target', `#${submenuId}`);
            }

            // Prevent the button from following the link
            anchor.next('button').on('click', function (event) {
                event.preventDefault();
            });
        });
    }


    addCollapse('navbarTogglerMenu' ,'text-white');
    addCollapse('navbarHomeMenu' ,'text-white');
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
        let x = event.clientX;
        if (lan && lan !== 'en') {
            x = x - window.screen.width;
        }
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
    const heroSlider = new Swiper('.hero_slider', {
        direction: 'vertical',
        slidesPerView: 1,
        spaceBetween: 0,
        grabCursor: true,
        mousewheel: {
            invert: false,
            sensitivity: 3
        },
        speed: 700,
        keyboard: {
            enabled: true,
            onlyInViewport: true, // Ensures the keyboard control only works when Swiper is in viewport
        },
        breakpoints: {
            968: {
                direction: 'horizontal',
                speed: 1500,
            },
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
    // Add code to auto-scroll after 5 seconds on mobile
    // const isMobile = window.matchMedia('(max-width: 767px)').matches;
    // if (isMobile) {
    //     setTimeout(() => {
    //         // Get the current position
    //         const currentPosition = heroSlider.translate;
    //
    //         // Calculate the position to slide to
    //         const newPosition = currentPosition - 50;
    //
    //         // Apply transition to the swiper wrapper
    //         heroSlider.wrapperEl.style.transition = 'transform 0.5s ease';
    //
    //         // Slide to the new position
    //         heroSlider.setTranslate(newPosition);
    //
    //         // After a short delay, slide back to the original position
    //         setTimeout(() => {
    //             // Apply transition to the swiper wrapper
    //             heroSlider.wrapperEl.style.transition = 'transform 0.5s ease';
    //
    //             heroSlider.setTranslate(currentPosition);
    //         }, 400); // Time for sliding back after 2000 milliseconds
    //     }, 8000); // Time to wait before auto-scrolling starts (5 seconds)
    // }


})
