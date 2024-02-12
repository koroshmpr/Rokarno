jQuery(document).ready(function ($) {
    let lan = currentLanguage.language ;
    let tileNumber = 144;
    let selectSize = '';
    let selectedDesignsWithChances = [];
    // $(".tile-size li").click(function () {
    //     // Remove the 'active' class from all li elements
    //     $(".tile-size li").removeClass("active");
    //
    //     // Add the 'active' class to the clicked li element
    //     $(this).addClass("active");
    //
    //     var size = $(this).data("size");
    //     changeTileSize(size);
    //     if (size == 30) {
    //         $('#tile').css('gap', '3px')
    //     }
    //     if (size != 30) {
    //         $('#tile').css('gap', '2px')
    //     }
    // });

    // function changeTileSize(size) {
    //     // Reset the sizes first
    //     $(".tile-img").css("width", "").css("height", "");
    //
    //     // Apply the new size
    //     if (!isNaN(parseFloat(size)) && isFinite(size)) {
    //         var newSize = size + "px"; // You can modify this as needed
    //         $(".tile-img").css("width", newSize).css("height", newSize);
    //     }
    //
    // }

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
        designButton.before(`
              <span data-aos="fade-left" data-aos-delay="100" class="reset-btn text-center text-danger z-2 position-absolute top-0 start-0">
                <svg width="18" height="18" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                </svg>
              </span>
             `);

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
        $('#wall').addClass(`${color}`);
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
        var length = $(this).data('length');
        var slot = $(this).data('slot');
        if(length) {
            tileNumber = length
        }if (!length) {
            tileNumber = 144
        }
        selectSize = size;
        // Show the selected shape images and hide others
        $('#tileGallery article').addClass('d-none'); // Hide all image sets
        $(`#${size}`).removeClass('d-none'); // Show the selected shape images

        // Add the 'size' class to the generated images
        $('#tile .tile-img').addClass(size);

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
            $(this).parent().removeClass('bg-primary bg-danger');
        });

        // Remove all dynamically created reset buttons
        $('.reset-btn').remove();

        // Remove all child elements of $tile
        $('#tile').empty();
        $('#wall').empty();
        $('#wall').removeClass('shadow');
    });
    // create tile preview
    function populateTile() {
        // Get the #tile container
        var tileContainer = $('#tile');

        // Clear the existing content in #tile
        tileContainer.empty();

        // Array to store information about selected colors with chances
        var selectedDesignsLog = [];

        // Get the selected designs with chances
        var selectedDesignsWithChances = $('[data-design]').map(function () {
            var designElement = $(this); // Save the current element
            var design = designElement.data('design');
            var slot = designElement.data('slot');
            var imageUrl = designElement
                .css('background-image')
                .replace(/^url\(["']?/, '')
                .replace(/["']?\)$/, '');
            var chance = parseFloat(designElement.next('.percentage-input').val()) || 0;
            var size = designElement.data('size'); // Add this line to get the 'data-size'

            // Check if the image URL is not 'none' and the chance is valid
            if (imageUrl !== 'none' && chance != 0) {
                // Add a class to the parent of the current element
                designElement.parent().removeClass('bg-danger');
                designElement.parent().addClass('bg-primary');

                // Push the information to the array
                selectedDesignsLog.push({
                    design: design,
                    slot: slot,
                    imageUrl: imageUrl,
                    chance: chance,
                    size: size // Add 'size' to the stored information
                });

                return { design: design, imageUrl: imageUrl, chance: chance, size: size , slot: slot };
            }
            if (imageUrl == 'none' && chance == 0) {
                designElement.parent().removeClass('bg-danger bg-primary');
            }
            if (imageUrl != 'none' || chance != 0) {
                // Add a class to the parent of the current element
                designElement.parent().addClass('bg-danger');
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
                    // Generate a random opacity class
                    var opacityClass = getRandomOpacityClass();
                    // Create a new image element with the 'tile-img' class and 'size' class
                    var imgElement = $('<img class="tile-img">')
                        .attr('src', selectedDesignsWithChances[j].imageUrl)
                        .attr('alt', selectedDesignsWithChances[j].design)
                        .attr('slot' , selectedDesignsWithChances[j].slot)
                        .addClass(selectSize) // Add the 'size' class
                        .addClass(opacityClass);
                    // Append the image to #tile
                    tileContainer.append(imgElement);
                    break;
                }
            }
        }
        function getRandomOpacityClass() {
            // Define an array of opacity classes
            var opacityClasses = ['opacity-75', 'opacity-50', 'opacity-100'];
            // Generate a random index within the range of opacityClasses array
            var randomIndex = Math.floor(Math.random() * opacityClasses.length);
            // Return the randomly selected opacity class
            return opacityClasses[randomIndex];
        }
        selectedDesign = selectedDesignsWithChances;
    }

    // creating wall
    $('#wallCreator').on('click', function () {
        createWall();
        // Smoothly scroll to the wallContainer
        $('html, body').animate({
            scrollTop: $('#wall').offset().top
        }, 500); // Adjust the duration as needed (in milliseconds)
    });
    function createWall() {

        // Clear the existing content in #wall
        var wallContainer = $('#wall');
        wallContainer.empty();

        // Repeat the selected images with chances to fill the #wall container for a 5x5 grid
        for (var col = 0; col < 5; col++) {
            var colElement = $('<div class="row mx-0 px-0">');

            for (var row = 0; row < 5; row++) {
                var tileElement = $('<div class="wall-tile px-0">');

                for (var i = 0; i < tileNumber; i++) {
                    var randomChance = Math.random() * 100;
                    var cumulativeChance = 0;

                    for (var j = 0; j < selectedDesign.length; j++) {
                        cumulativeChance += selectedDesign[j].chance;

                        if (randomChance <= cumulativeChance) {
                            var opacityClass = getRandomOpacityClass();
                            // Create a new image element
                            var imgElement = $('<img class="wall-img">')
                                .attr('src', selectedDesign[j].imageUrl)
                                .attr('alt', selectedDesign[j].design)
                                .addClass(opacityClass)
                                .addClass(selectSize); // Add the 'size' class

                            // Append the image to the current tile
                            tileElement.append(imgElement);
                            break;
                        }
                        function getRandomOpacityClass() {
                            // Define an array of opacity classes
                            var opacityClasses = ['opacity-75', 'opacity-50', 'opacity-100'];
                            // Generate a random index within the range of opacityClasses array
                            var randomIndex = Math.floor(Math.random() * opacityClasses.length);
                            // Return the randomly selected opacity class
                            return opacityClasses[randomIndex];
                        }
                    }
                }

                // Append the tile to the current column
                colElement.append(tileElement);
            }

            // Append the column to the wall
            wallContainer.append(colElement);
        }
        wallContainer.addClass('shadow')
    }

});