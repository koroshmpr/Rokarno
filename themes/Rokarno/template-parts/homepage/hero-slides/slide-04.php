<?php
$slide4 = get_field('slide-04');
?>
<div class="swiper-slide bg-secondary">
    <div class="position-absolute start-0 d-flex flex-column opacity-lg-25">
        <span data-aos="fade-down" data-aos-delay="1000" data-aos-duration="800">
            <?php
            $args = array(
                'class' => '',
                'fill-color' => '#9CCAAA',
                'fill-opacity' => '0.8'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
        <span data-aos="zoom-in" data-aos-delay="1300" data-aos-duration="800">
            <?php
            $args = array(
                'class' => 'translate-x-100',
                'fill-color' => '#9CCAAA',
                'fill-opacity' => '0.3'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
        <span data-aos="fade-left" data-aos-delay="1400" data-aos-duration="800">
            <?php
            $args = array(
                'class' => '',
                'fill-color' => '#CEC8C0',
                'fill-opacity' => '0.3'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
    </div>
    <div class="col-lg-10 h-100 d-flex align-items-end flex-wrap">
        <div class="h-lg-75 h-100 col d-flex justify-content-end gap-lg-4">
            <div class="col-3 col-lg-2">
                <div class="animate-img animate-img-x h-100" style="background: url('<?php echo $slide4['img']['url'] ?? ''; ?>');"></div>
            </div>
<!--            <img data-aos="fade-up" class="col-3 col-lg-2 object-fit" src="--><?php //= $slide4['img']['url'] ?? ''; ?><!--"-->
<!--                 alt="--><?php //= $slide4['img']['title']; ?><!--">-->
            <div class="col-lg-8 px-5 px-lg-0 d-flex flex-column gap-5 justify-content-center col justify-content-lg-evenly">
                <h3 class="display-1 text-end fw-bold text-primary" data-aos="fade-right" data-aos-delay="700" data-aos-duration="800">Product</h3>
                <div class="d-lg-flex d-grid gap-lg-3 gap-4" data-aos="fade-right" data-aos-delay="800" data-aos-duration="800">
                    <?php
                    // Get all products
                    $args_all_products = array(
                        'post_type' => 'product',
                        'posts_per_page' => 3, // Get all products
                        'post_status' => 'publish',
                        'ignore_sticky_posts' => true
                    );
                    $all_products = new WP_Query($args_all_products);

                    // Check if there are any products
                    if ($all_products->have_posts()) {
                        // Create an array of product IDs
                        $product_ids = wp_list_pluck($all_products->posts, 'ID');

                        // Shuffle the array of product IDs randomly
                        shuffle($product_ids);

                        // Loop through the first 3 randomly selected product IDs
                        foreach (array_slice($product_ids, 0, 3) as $product_id) :
                            $args = array(
                                'post_type' => 'product',
                                'post_status' => 'publish',
                                'p' => $product_id,
                                'ignore_sticky_posts' => true
                            );
                            $loop = new WP_Query($args);

                            if ($loop->have_posts()) {
                                while ($loop->have_posts()) : $loop->the_post();
                                    get_template_part('template-parts/products/product-card');
                                endwhile;
                                wp_reset_postdata();
                            } else {
                                echo __('محصولی یافت نشد');
                            }
                        endforeach;
                    } else {
                        echo __('هیچ محصولی یافت نشد');
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
