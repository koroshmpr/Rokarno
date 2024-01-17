
jQuery(document).ready(function ($) {
    let tileNumber = 144;
    let selectedDesignsWithChances = [];
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
        $('#wall').removeClass(function (index, className) {
            return (className.match(/(^|\s)bg-\S+/g) || []).join(' ');
        });


        // Add the new class based on the selected color
        $('#tile').addClass(color);
        $('#wall').addClass(`${color} p-3 border border-white border-opacity-25`);
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
    $('#wallCreator').on('click', function () {
        createWall();
    });

    function createWall() {
        // Get the #tile container
        var tileContainer = $('#tile');

        // Clear the existing content in #tile
        // tileContainer.empty();

        // Repeat the selected images with chances to fill the #tile container for a 5x5 grid
        for (var row = 0; row < 5; row++) {
            for (var col = 0; col < 5; col++) {
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

        // Add the 5x5 grid of tiles to the wall
        var wallContainer = $('.wall');
        wallContainer.empty(); // Clear existing content

        // Create a new row for each row of the wall
        for (var i = 0; i < 5; i++) {
            var rowElement = $('<div class="row mx-0 px-0">');

            // Append 5 tiles to each row
            for (var j = 0; j < 5; j++) {
                rowElement.append(tileContainer.clone()); // Clone the #tile container
            }

            wallContainer.append(rowElement); // Append the row to the wall
        }
    }
});