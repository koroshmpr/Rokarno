<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

?>
<?php get_template_part('template-parts/products/archive-hero'); ?>

<?php
if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');

//    woocommerce_product_loop_start();
    // Setup product query
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1, // -1 to show all products, adjust as needed
    );

    $products = new WC_Product_Query($args);
    $products = $products->get_products();

    if ($products) {
        $i = 0;
        ?>
        <section>
            <div class="row col-lg-11 py-5 align-items-start justify-content-center justify-content-lg-start">
                <div class="col-lg-9 row row-cols-lg-5 row-cols-2 justify-content-lg-start justify-content-center">
                    <?php foreach ($products as $product) :
                        setup_postdata($product->get_id()); ?>
                        <article class="px-2 pb-5" data-aos="zoom-in" data-aos-delay="<?= $i; ?>0">
                            <?php get_template_part('template-parts/products/product-card'); ?>
                        </article>
                        <?php
                        $i++;
                    endforeach;
                    wp_reset_postdata();
                    // woocommerce_product_loop_end();

                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action('woocommerce_after_shop_loop'); ?>
                </div>
                <?php get_template_part('template-parts/products/archive-sidebar') ?>
            </div>
        </section>
        <?php
    }
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
//    do_action('woocommerce_no_products_found');
    ?>
    <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-white text-white bg-opacity-10">
        <?= esc_html__('No Products Found', 'rokarno'); ?>
        </h2>
<?php }

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action('woocommerce_sidebar');

get_footer('shop');