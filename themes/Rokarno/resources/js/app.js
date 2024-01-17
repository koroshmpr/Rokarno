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

    // $('a').on('click', function(event) {
    //     // Exclude links with mailto: and tel: from the click event
    //     if (this.href.startsWith('mailto:') || this.href.startsWith('tel:')) {
    //         return;
    //     }
    //
    //     event.preventDefault();
    //     document.querySelectorAll('[data-aos]').forEach(function (element) {
    //         element.classList.remove('aos-animate');
    //     });
    //     document.querySelectorAll('.swiper-slide').forEach(function (item) {
    //         item.classList.remove('swiper-slide-active');
    //     });
    //
    //     var newLocation = this.href;
    //     $('.page-transition').css({
    //         'opacity': '0',
    //         'transform': 'translateX(-100%)'
    //     });
    //
    //     setTimeout(function() {
    //         window.location = newLocation;
    //     }, 500); // Adjust the time (in milliseconds) to match the CSS transition duration
    // });

});

document.addEventListener('DOMContentLoaded', function () {
    AOS.init();
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
    if (playButton) {
        playButton.addEventListener('click', function () {
            if (video.paused) {
                video.play();
                video.setAttribute('controls', 'true');
                playButton.classList.add('opacity-0');
            }
        })
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
    const card = new Swiper('.card-slide', {
        loop: false,
        effect: 'slide',
        speed: 500,
        slidesPerView: 1.2,
        spaceBetween: 20,
        grabCursor: true,
        direction: 'horizontal',
        pagination: {
            el: '.swiper-pagination',
            clickable: true
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            992: {
                slidesPerView: 6,

            }
        },
        autoplay: {
            delay: 5000,
        },
        disableOnInteraction: false,
    });
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
            }
        }
    });
})

if ($('#tileTemplate')) {
    $(document).ready(function () {
        let tileNumber = 1100;
        $(".tile-size li").click(function () {
            // Remove the 'active' class from all li elements
            $(".tile-size li").removeClass("active");

            // Add the 'active' class to the clicked li element
            $(this).addClass("active");

            var size = $(this).data("size");
            changeTileSize(size);
            if (size == 30) {
                $('#tile').css('gap', '3px')
            }
            if (size != 30) {
                $('#tile').css('gap', '2px')
            }
        });

        function changeTileSize(size) {
            // Reset the sizes first
            $(".tile-img").css("width", "").css("height", "");

            // Apply the new size
            if (!isNaN(parseFloat(size)) && isFinite(size)) {
                var newSize = size + "px"; // You can modify this as needed
                $(".tile-img").css("width", newSize).css("height", newSize);
            }

        }

        var selectedDesign = ''; // Variable to store the selected design

        // Add click event listener to each button
        $('[data-bs-target="#exampleModal"]').on('click', function () {
            // Get the design value from the button
            var design = $(this).data('design');
            // Update the modal's design value
            $('#exampleModal .modal-title').text(design);
            // Update the selectedDesign variable
            selectedDesign = design;
        });

        // Add click event listener to each image in the modal
        $('#tileGallery .design-img').on('click', function () {
            // Get the image source
            var imgSrc = $(this).attr('src');
            // Update the corresponding button's background image
            var designButton = $('[data-design="' + selectedDesign + '"]');
            designButton.css('background-image', 'url(' + imgSrc + ')');

            // Add a reset button next to the chosen design button
            designButton.before('<span data-aos="fade-left" data-aos-delay="100" class="reset-btn text-white text-center bg-danger m-2 z-2 position-absolute top-0 start-0 rounded-circle">X</span>');
            // Clear the current button's text
            designButton.text('');

            // Clear the selectedDesign variable
            selectedDesign = '';
        });

        // Add click event listener to the button that populates the #tile element
        $('#populateTileButton').on('click', function () {
            populateTile();
        });

        // Add click event listener to each li element
        $('.color-list li').on('click', function () {
            // Get the data-color attribute value
            var color = $(this).data('color');

            // Remove existing classes from #tile
            $('#tile').removeClass();

            // Add the new class based on the selected color
            $('#tile').addClass(color);
        });

// Delegate click event listener to dynamically created reset buttons
        $(document).on('click', '.reset-btn', function () {
            resetDesign($(this).siblings('[data-design]'), $(this).siblings('.percentage-input'));
            $(this).remove(); // Remove the reset button after clicking
        });

        function resetSelections() {
            // Reset the selected designs and inputs
            $('[data-design]').each(function () {
                resetDesign($(this), $(this).siblings('.percentage-input'));
            });

            // Remove all dynamically created reset buttons
            $('.reset-btn').remove();

            // Remove all child elements of $tile
            $('#tile').empty();
        }

        $(".tile-shape li").click(function () {
            // Remove the 'active' class from all li elements
            $(".tile-shape li").removeClass("active");

            // Add the 'active' class to the clicked li element
            $(this).addClass("active");

            var size = $(this).data("size");

            // Show the selected shape images and hide others
            $('#tileGallery div').addClass('d-none'); // Hide all image sets
            $(`#${size}`).removeClass('d-none'); // Show the selected shape images

            // Reset other fields when the shape changes
            resetSelections();
        });

        function resetDesign(button, input) {
            // Clear the background image and text of the chosen design button
            var attrBtn = button.attr('data-design');
            button.css('background-image', 'none').text(attrBtn);

            // Reset the input number
            input.val('');
        }

        // Add click event listener to the reset button
        $('#resetButton').on('click', function () {
            // Reset all chosen designs and inputs
            $('[data-design]').each(function () {
                resetDesign($(this), $(this).siblings('.percentage-input'));
            });

            // Remove all dynamically created reset buttons
            $('.reset-btn').remove();

            // Remove all child elements of $tile
            $('#tile').empty();
        });

        function populateTile() {
            // Get the #tile container
            var tileContainer = $('#tile');

            // Clear the existing content in #tile
            tileContainer.empty();

            // Get the selected designs with chances
            var selectedDesignsWithChances = $('[data-design]').map(function () {
                var design = $(this).data('design');
                var imageUrl = $(this).css('background-image').replace(/^url\(["']?/, '').replace(/["']?\)$/, '');
                var chance = parseFloat($(this).next('.percentage-input').val()) || 0;

                // Check if the image URL is not 'none' and the chance is valid
                if (imageUrl !== 'none' && !isNaN(chance)) {
                    return {design: design, imageUrl: imageUrl, chance: chance};
                }
            }).get();

            // Ensure the sum of chances is 100%
            var totalChances = selectedDesignsWithChances.reduce(function (sum, item) {
                return sum + item.chance;
            }, 0);

            // If the total chances are not 100%, adjust them proportionally
            if (totalChances !== 100) {
                selectedDesignsWithChances.forEach(function (item) {
                    item.chance = (item.chance / totalChances) * 100;
                });
            }
            // Repeat the selected images with chances to fill the #tile container
            for (var i = 0; i < tileNumber; i++) {
                var randomChance = Math.random() * 100;
                var cumulativeChance = 0;

                for (var j = 0; j < selectedDesignsWithChances.length; j++) {
                    cumulativeChance += selectedDesignsWithChances[j].chance;

                    if (randomChance <= cumulativeChance) {
                        // Create a new image element
                        var imgElement = $('<img class="tile-img">').attr('src', selectedDesignsWithChances[j].imageUrl).attr('alt', selectedDesignsWithChances[j].design);

                        // Append the image to #tile
                        tileContainer.append(imgElement);
                        break;
                    }
                }
            }
        }
    });
}