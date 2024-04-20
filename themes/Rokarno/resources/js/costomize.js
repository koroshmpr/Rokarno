jQuery(document).ready(function ($) {
    let lan = currentLanguage.language ;
    let tileNumber = 144;
    let selectSize = '';
    let selectedDesignsWithChances = [];
    let selectedDesign = '';
    function getRandomOpacityClass() {
        // Define an array of opacity classes
        let opacityClasses = ['opacity-75', 'opacity-50', 'opacity-100'];
        // Generate a random index within the range of opacityClasses array
        let randomIndex = Math.floor(Math.random() * opacityClasses.length);
        // Return the randomly selected opacity class
        return opacityClasses[randomIndex];
    }
    function getRandomRotationClass() {
        // Define an array of opacity classes
        let rotateClasses = ['rotate-90', 'rotate-180', 'rotate--90'];
        // Generate a random index within the range of opacityClasses array
        let randomIndex = Math.floor(Math.random() * rotateClasses.length);
        // Return the randomly selected opacity class
        return rotateClasses[randomIndex];
    }
    // $(".tile-size li").click(function () {
    //     // Remove the 'active' class from all li elements
    //     $(".tile-size li").removeClass("active");
    //
    //     // Add the 'active' class to the clicked li element
    //     $(this).addClass("active");
    //
    //     let size = $(this).data("size");
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
    //         let newSize = size + "px"; // You can modify this as needed
    //         $(".tile-img").css("width", newSize).css("height", newSize);
    //     }
    //
    // }
    // Add click event listener to each button
    $('[data-bs-target="#exampleModal"]').on('click', function () {
        // Get the design value from the button
        let design = $(this).data('design');
        // Update the modal's design value
        $('#exampleModal .modal-title').text(design);
        // Update the selectedDesign letiable
        selectedDesign = design;
    });
    // Add click event listener to each image in the modal
    $('#tileGallery .design-img').on('click', function () {
        // Get the image source
        let imgSrc = $(this).attr('src');
        let type = $(this).attr('tile-type');
        // Update the corresponding button's background image
        let designButton = $('[data-design="' + selectedDesign + '"]');
        designButton.css('background-image', 'url(' + imgSrc + ')');
        designButton.attr('tile-type' , type);
        // Add a reset button next to the chosen design button
        designButton.before(`
              <span data-aos="fade-left" data-aos-delay="100" class="reset-btn text-center text-danger z-2 position-absolute top-0 start-0">
                <svg width="18" height="18" fill="currentColor" class="bi bi-x-circle-fill bg-white rounded-circle" viewBox="0 0 16 16">
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
        let color = $(this).data('color');
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
        let size = $(this).data("size");
        let length = $(this).data('length');
        let slot = $(this).data('slot');
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
        let attrBtn = button.attr('data-design');
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
        let tileContainer = $('#tile');
        // Clear the existing content in #tile
        tileContainer.empty();
        // Array to store information about selected colors with chances
        let selectedDesignsLog = [];
        // Get the selected designs with chances
        let selectedDesignsWithChances = $('[data-design]').map(function () {
            let designElement = $(this); // Save the current element
            let design = designElement.data('design');
            let slot = designElement.data('slot');
            let type = designElement.attr('tile-type');
            let imageUrl = designElement
                .css('background-image')
                .replace(/^url\(["']?/, '')
                .replace(/["']?\)$/, '');
            let chance = parseFloat(designElement.next('.percentage-input').val()) || 0;
            let size = designElement.data('size'); // Add this line to get the 'data-size'
            // Check if the image URL is not 'none' and the chance is valid
            if (imageUrl !== 'none' && chance != 0) {
                // Add a class to the parent of the current element
                designElement.parent().removeClass('bg-danger');
                designElement.parent().addClass('bg-primary');

                // Push the information to the array
                selectedDesignsLog.push({
                    design: design,
                    slot: slot,
                    type : type,
                    imageUrl: imageUrl,
                    chance: chance,
                    size: size // Add 'size' to the stored information
                });
                return { design: design, imageUrl: imageUrl, chance: chance, size: size , slot: slot  , type : type};
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
        let totalChances = selectedDesignsWithChances.reduce(function (sum, item) {
            return sum + item.chance;
        }, 0);
        // If the total chances are not 100%, adjust them proportionally
        if (totalChances !== 100) {
            selectedDesignsWithChances.forEach(function (item) {
                item.chance = (item.chance / totalChances) * 100;
            });
        }
        // Repeat the selected images with chances to fill the #tile container
        for (let i = 0; i < tileNumber; i++) {
            let randomChance = Math.random() * 100;
            let cumulativeChance = 0;

            for (let j = 0; j < selectedDesignsWithChances.length; j++) {
                cumulativeChance += selectedDesignsWithChances[j].chance;
                if (randomChance <= cumulativeChance) {
                    // Generate a random opacity class
                    let opacityClass = getRandomOpacityClass();
                    let rotateClasses = getRandomRotationClass();
                    let type =  selectedDesignsWithChances[j].type;
                    let url = selectedDesignsWithChances[j].imageUrl
                    if (type == 'brush') {
                        // Check if the URL ends with .jpg or .png
                        if (url.endsWith('.jpg') || url.endsWith('.png')) {
                            // Find the position of the last '.' before the extension
                            const lastIndex = url.lastIndexOf('.');

                            // Split the URL into two parts: before and after the last '.'
                            const beforeExtension = url.substring(0, lastIndex); // URL before the extension
                            const extension = url.substring(lastIndex); // Extension (.jpg or .png)

                            // Generate a random number between 0 and 2
                            const randomNum = Math.floor(Math.random() * 3); // 0, 1, or 2

                            // Determine the suffix based on the random number
                            let suffix = '';
                            if (randomNum === 0) {
                                suffix = '-1';
                            } else if (randomNum === 1) {
                                suffix = '-2';
                            } // If randomNum is 2, suffix remains empty (no additional suffix)

                            // Construct the modified URL by appending the suffix after beforeExtension
                            url = beforeExtension + suffix + extension;
                        }
                    }

                    // Create a new image element with the 'tile-img' class and 'size' class
                    let imgElement = $('<img class="tile-img">')
                        .attr('src', url)
                        .attr('alt', selectedDesignsWithChances[j].design)
                        .attr('slot', selectedDesignsWithChances[j].slot)
                        .addClass(selectSize) // Add the 'size' class
                        .addClass(selectedDesignsWithChances[j].type); // Add the 'type' class
                    // Refactored version using ternary operator
                    imgElement.addClass(
                        selectedDesignsWithChances[j].type === 'composition' ? opacityClass :
                        selectedDesignsWithChances[j].type === 'brush' ? rotateClasses :  ''
                    );
                    // Append the image to #tile
                    tileContainer.append(imgElement);
                    break;
                }
            }
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
        let wallContainer = $('#wall');
        wallContainer.empty();
        // Repeat the selected images with chances to fill the #wall container for a 5x5 grid
        for (let col = 0; col < 5; col++) {
            let colElement = $('<div class="row mx-0 px-0">');
            for (let row = 0; row < 5; row++) {
                let tileElement = $('<div class="wall-tile px-0">');
                for (let i = 0; i < tileNumber; i++) {
                    let randomChance = Math.random() * 100;
                    let cumulativeChance = 0;
                    for (let j = 0; j < selectedDesign.length; j++) {
                        cumulativeChance += selectedDesign[j].chance;
                        if (randomChance <= cumulativeChance) {
                            let opacityClass = getRandomOpacityClass();
                            let rotateClasses = getRandomRotationClass();
                            let type =  selectedDesign[j].type;
                            let url = selectedDesign[j].imageUrl;
                            if (type == 'brush') {
                                // Check if the URL ends with .jpg or .png
                                if (url.endsWith('.jpg') || url.endsWith('.png')) {
                                    // Find the position of the last '.' before the extension
                                    const lastIndex = url.lastIndexOf('.');

                                    // Split the URL into two parts: before and after the last '.'
                                    const beforeExtension = url.substring(0, lastIndex); // URL before the extension
                                    const extension = url.substring(lastIndex); // Extension (.jpg or .png)

                                    // Generate a random number between 0 and 2
                                    const randomNum = Math.floor(Math.random() * 3); // 0, 1, or 2

                                    // Determine the suffix based on the random number
                                    let suffix = '';
                                    if (randomNum === 0) {
                                        suffix = '-1';
                                    } else if (randomNum === 1) {
                                        suffix = '-2';
                                    } // If randomNum is 2, suffix remains empty (no additional suffix)

                                    // Construct the modified URL by appending the suffix after beforeExtension
                                    url = beforeExtension + suffix + extension;
                                }
                            }
                            // Create a new image element
                            let imgElement = $('<img class="wall-img">')
                                .attr('src', url)
                                .attr('alt', selectedDesign[j].design)
                                .addClass(selectSize) // Add the 'size' class
                            .addClass(selectedDesign[j].type); // Add the 'type' class
                            // Refactored version using ternary operators
                            imgElement.addClass(
                                selectedDesign[j].type === 'composition' ? opacityClass :
                                selectedDesign[j].type === 'brush' ? rotateClasses :
                                        '' // Default class if neither 'simple' nor 'composition'
                            );
                            // Append the image to the current tile
                            tileElement.append(imgElement);
                            break;
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