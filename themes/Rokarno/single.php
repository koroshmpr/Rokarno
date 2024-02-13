<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package baloochy
 */

// Check if it's a single post and not a product
if (is_single() && !is_product()) {
    get_header();

    while (have_posts()) :
        the_post();
        ?>
        <div class="text-white pt-3 pt-lg-0 px-lg-5" id="blog">
            <section class="row py-0 py-lg-5 row-gap-4 justify-content-lg-between justify-content-center">
                <div class="col-lg-6 col-12 order-last order-lg-start row align-content-center">
                    <h1 class="fs-3 fw-bold text-dark text-center text-lg-start">
                        <?php the_title(); ?>
                    </h1>
                    <div class="d-inline-flex w-100 justify-content-center justify-content-lg-start">
                        <span class="text-semi-light small fw-lighter">
                            Date:
                         <?php echo get_the_date('d  F , Y'); ?>
                        </span>
                    </div>
                </div>
                <div class="col-lg-6 col-12 text-center text-lg-end">
                    <?php if (get_the_post_thumbnail_url()) { ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>"
                             class="w-100 object-fit p-2" height="400"
                             alt="<?php the_title(); ?>">
                    <?php } ?>
                </div>
            </section>
            <section class="row py-5 px-4 px-lg-0">
                <article class="text-justify border border-opacity-25 border-white py-3 bg-dark bg-opacity-10 text-link">
                    <?php the_content();
                    wp_reset_postdata();
                    ?>
                </article>
                <div class="col-12 py-lg-5 py-3">
                    <h6 class="pb-3 text-primary text-center fs-3 fw-bold">
                        <?= esc_html__('Latest News', 'rokarno'); ?>
                    </h6>
                    <div class="row row-cols-lg-3 row-cols-1 gap-5 gap-lg-0 px-4 px-lg-0">
                        <?php
                        $args = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => '3',
                            'ignore_sticky_posts' => true
                        );
                        $loop = new WP_Query($args);
                        if ($loop->have_posts()) : $i = 0;
                            /* Start the Loop */
                            while ($loop->have_posts()) :
                                $loop->the_post(); ?>
                                <?php get_template_part('template-parts/blog/single-card'); ?>
                            <?php
                            endwhile;
                        endif;
                        wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        </div>
    <?php endwhile;
    wp_reset_query();
    get_footer();
} // Check if it's a single product
elseif (is_product()) {
    wc_get_template_part('single-product');
}
?>
