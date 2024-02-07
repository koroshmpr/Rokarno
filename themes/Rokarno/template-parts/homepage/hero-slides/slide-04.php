<?php
$slide4 = get_field('slide-04');
global $cur_lan;
?>
<div class="swiper-slide bg-secondary">
    <div class="position-absolute <?= $cur_lan == 'en' ? 'start-0' : 'end-0';?> d-flex flex-column opacity-lg-25">
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
    <div class="h-100 d-flex align-items-end flex-wrap">
        <div class="h-lg-75 h-100 col d-flex gap-lg-4">
            <div class="col-3 col-lg-2">
                <div class="animate-img animate-img-x h-100" style="background: url('<?php echo $slide4['img']['url'] ?? ''; ?>');"></div>
            </div>
            <div class="col-lg-8 px-5 px-lg-0 d-flex flex-column gap-5 justify-content-center col justify-content-lg-evenly">
                <h3 class="display-1 <?= $cur_lan == 'en' ? 'text-end' : '';?> fw-bold text-primary" data-aos="fade-right" data-aos-delay="700" data-aos-duration="800">
                    <?= $slide4['title'];?>
                </h3>
                <div class="d-lg-flex d-grid gap-lg-3 gap-4" data-aos="fade-right" data-aos-delay="800" data-aos-duration="800">
                    <?php
                    $categories = get_terms(array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'rand', // Order categories randomly
                        'number' => 3, // Limit to 3 categories
                        'parent' => 0, // Get only parent categories
                        'hide_empty' => true,
                    ));

                    if ($categories) {
                        foreach ($categories as $category) {
                            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                            $category_image = wp_get_attachment_url($thumbnail_id);
                            ?>
                            <div class="product_card d-flex flex-column justify-content-center gap-lg-2 gap-1 h-auto bg-dark bg-opacity-10 p-1 p-lg-3">
                                <img src="<?= $category_image ?? ''; ?>" alt="<?= esc_html($category->name); ?>"
                                     class="mx-auto object-fit col-7 mt-lg-n5 mt-n3 ratio-1" width="100">
                                <div class="d-flex flex-column justify-content-between align-items-center">
                                    <p class="card-title text-white fs-5 mt-3">
                                        <?= esc_html($category->name); ?>
                                    </p>
                                    <a href="<?= esc_url(get_term_link($category)); ?>"
                                       class="stretched-link btn btn-custom col-11 text-white fs-6 fw-bold">
                                        <?=  esc_html__('MORE', 'rokarno');  ?>
                                        </a>
                                </div>
                            </div>
                        <?php }
                    } else {
                        echo __('محصولی یافت نشد', 'your-text-domain');
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
