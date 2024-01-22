<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if (!empty($product_tabs)) : $index = 0 ?>

    <div class="my-5 mx-auto col-11">
        <div class="row justify-content-center justify-content-lg-start bg-white bg-opacity-25 text-primary border border-white border-opacity-25">
            <ul class="nav col-lg-auto nav-tabs border-0 align-items-center p-3 mb-4 gap-2 tab-product flex-nowrap" id="myTab" role="tablist">
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <li class="nav-item" role="presentation">
                        <button class="tab-shop text-primary border-0 lh-1 fs-6 px-4 py-3 bg-white small-sm-down fw-bold lazy <?= $index == 0 ? 'active' : '' ?>"
                                id="cat-<?php echo esc_attr($key); ?>-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#cat-<?php echo esc_attr($key); ?>"
                                type="button"
                                role="tab"
                                aria-controls="cat-<?php echo esc_attr($key); ?>"
                                aria-selected="true">
                            <?= $product_tab['title'] ?>
                        </button>
                    </li>
                    <?php $index++;
                endforeach; ?>
            </ul>
            <?php $index = 0 ?>

            <div class="tab-content" id="myTabContent">
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <div class="tab-pane px-2 px-lg-4 fade <?= $index == 0 ? 'show active' : '' ?>"
                         id="cat-<?php echo esc_attr($key); ?>"
                         role="tabpanel"
                         aria-labelledby="cat-<?php echo esc_attr($key); ?>-tab">
                        <?php
                        if (isset($product_tab['callback'])) {
                            // Check if the callback is for the description tab
                            if ($product_tab['callback'] === 'woocommerce_product_description_tab') {
                                global $product;

                                // Check if $product is set before accessing its methods
                                if (is_a($product, 'WC_Product')) {
                                    // Output the short description instead of the full description
                                    echo apply_filters('woocommerce_short_description', $product->get_short_description());
                                }
                            } else {
                                // Call the original callback for other tabs
                                call_user_func($product_tab['callback'], $key, $product_tab);
                            }
                        }
                        ?>
                    </div>
                    <?php $index++;
                endforeach; ?>
            </div>
        </div>
    </div>
    <?php do_action( 'woocommerce_product_after_tabs' ); ?>
    </div>

<?php endif; ?>
