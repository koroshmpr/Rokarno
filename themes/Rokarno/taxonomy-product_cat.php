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

?>
        <?php get_template_part('template-parts/products/archive-hero'); ?>

    <section class="container py-5">
        <section class="row py-5 align-items-start justify-content-center justify-content-lg-start">
            <div class="col-lg-9 row row-cols-lg-5 row-cols-2 justify-content-lg-start justify-content-center">
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
                        <article class="px-2 pb-5" data-aos="zoom-in" data-aos-delay="<?= $i; ?>0">
                            <?php get_template_part('template-parts/products/product-card'); ?>
                        </article>
                        <?php
                        $i++;
                    endwhile;
                    wp_reset_postdata();
                else :
                    ?>
                    <h2 class="fs-4 text-center w-100 border border-info p-4 my-0 bg-primary bg-opacity-10">هیچ محصولی
                        یافت نشد</h2>
                <?php endif; ?>
                <?php get_template_part('template-parts/pagination') ?>
            </div>
            <?php
            get_template_part('template-parts/products/archive-sidebar')
            ?>
</div>
</section>
<?php get_footer(); ?>
