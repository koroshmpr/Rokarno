<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.8.0
 */

defined('ABSPATH') || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if (!function_exists('wc_get_gallery_image_html')) {
    return;
}

global $product;

$columns = apply_filters('woocommerce_product_thumbnails_columns', 4);
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes = apply_filters(
    'woocommerce_single_product_image_gallery_classes',
    array(
        'd-flex',
        'justify-content-center',
        'justify-content-lg-start',
        'position-relative',
        'woocommerce-product-gallery--' . ($post_thumbnail_id ? 'with-images' : 'without-images'),
        'px-0',
        'overflow-hidden',
        'col-lg-5',
        'col-12'
    )
);
?>

<div class="<?php echo esc_attr(implode(' ', array_map('sanitize_html_class', $wrapper_classes))); ?>"
     data-columns="<?php echo esc_attr($columns); ?>">
    <figure data-aos="zoom-in" data-aos-delay="100" data-aos-duration="500" class="woocommerce-product-gallery__wrapper h-100 col-11 ps-2">
        <?php
        $gallery_image_ids = $product->get_gallery_image_ids();
        // If there are multiple images, initialize Swiper
        ?>
        <div class="swiper product_image_swiper p-3">
            <div class="swiper-wrapper my-0">
                <?php
                // Add your image URL here
                $image_url = get_the_post_thumbnail_url();

                // Output the first slide with the image
                ?>
                <div class="swiper-slide">
                    <img class="img-fluid m-0 shadow w-100 bg-white" height="450" src="<?= $image_url; ?>"
                         alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                    <button class="product__image btn position-absolute bottom-0 end-0 me-lg-3 me-2 mb-2"
                            type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                            data-link="<?php echo esc_url($image_url); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                            <path fill-rule="evenodd"
                                  d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                        </svg>
                    </button>
                </div>

                <?php
                foreach ($gallery_image_ids as $image_id) {
                    $image_url = wp_get_attachment_url($image_id);
                    ?>
                    <div class="swiper-slide" data-image-id="<?php echo esc_attr($image_id); ?>">
                        <img class="img-fluid m-0 shadow bg-white" height="450" src="<?php echo esc_url($image_url); ?>"
                             alt="<?php echo esc_attr__('Product Image', 'woocommerce'); ?>"/>
                        <button class="product__image btn position-absolute bottom-0 end-0 me-lg-3 me-2 mb-2"
                                type="button" data-bs-toggle="modal" data-bs-target="#myModal"
                                data-link="<?php echo esc_url($image_url); ?>">
                            <svg  width="20" height="20" fill="white"
                                 class="bi bi-zoom-in text-white" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                                <path d="M10.344 11.742c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1 6.538 6.538 0 0 1-1.398 1.4z"/>
                                <path fill-rule="evenodd"
                                      d="M6.5 3a.5.5 0 0 1 .5.5V6h2.5a.5.5 0 0 1 0 1H7v2.5a.5.5 0 0 1-1 0V7H3.5a.5.5 0 0 1 0-1H6V3.5a.5.5 0 0 1 .5-.5z"/>
                            </svg>
                        </button>
                    </div>
                <?php } ?>

            </div>
<!--            <div class="swiper-pagination position-static mt-4"></div>-->
        </div>
    </figure>
    <script>
        jQuery(document).ready(function () {
            jQuery('.product__image').each(function () {
                jQuery(this).on('click', function (e) {
                    e.preventDefault();
                    var imageId = jQuery(this).attr('data-link');
                    // Open the Bootstrap modal with the full-size image
                    jQuery('#myModal').modal('show');

                    // Set the modal image source
                    jQuery('#myModal .modal-body img').attr('src', imageId);
                });
            });
        })
    </script>
</div>