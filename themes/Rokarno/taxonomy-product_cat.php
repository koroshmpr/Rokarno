<?php
/**
 * The template for displaying product category archives.
 *
 * @link https://woocommerce.com/
 *
 * @package WooCommerce
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 * @version 1.0.0
 */

get_header(); ?>
<?php
$categories = get_terms(array(
    'taxonomy' => 'product_cat',
    'orderby' => 'name',
    'parent' => 0, // Get only parent categories
    'hide_empty' => true,
));

$current_category_id = get_queried_object_id(); // Get the current category ID
global $cur_lan;
?>
<?php get_template_part('template-parts/products/archive-hero'); ?>

<section class="py-lg-4">
    <h1 class="text-primary text-opacity-75 pb-lg-3 pt-lg-0 py-3 mb-0 text-center text-lg-<?= $cur_lan == 'en' ? 'end' : 'start'; ?>"><?= get_the_title(); ?></h1>
    <section class="row col-12 mx-auto py-lg-5 align-items-start justify-content-center justify-content-lg-start">
        <div class="col-xxl-9 col-xl-8 row row-cols-md-3 row-cols-xxl-4 row-cols-xxxl-5 row-cols-2 justify-content-lg-start justify-content-center">
            <?php
            // Custom query to retrieve products associated with the current category
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => -1,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $current_category_id,
                    ),
                ),
            );

            $products_query = new WP_Query($args);

            if ($products_query->have_posts()) :
                $i = 0;
                while ($products_query->have_posts()) :
                    $products_query->the_post();
                    ?>
                    <article class="px-2 pb-5" data-aos="zoom-in">
                        <?php get_template_part('template-parts/products/product-card'); ?>
                    </article>
                    <?php
                    $i++;
                endwhile;
                wp_reset_postdata();
            else :
                ?>
                <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-white text-white bg-opacity-10"><?= esc_html__('No Products Found', 'rokarno'); ?></h2>
            <?php endif; ?>
            <?php get_template_part('template-parts/pagination') ?>
        </div>
        <?php
        get_template_part('template-parts/products/current-category-sidebar');
        ?>
        <article
                class="d-xl-none col-11 text-primary text-opacity-75 shadow-sm bg-white bg-opacity-10 p-3 mt-3 small border border-white border-opacity-25">
            <?= get_field('shop_description', 'option'); ?>
        </article>
    </section>
    <?php get_footer(); ?>
