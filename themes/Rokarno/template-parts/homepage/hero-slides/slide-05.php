<?php
// News
$slide5 = get_field('slide-05');
global $cur_lan;
$selected_cat = $slide5['selected_cat'];

// Get category object
$category_object = get_term($selected_cat, 'category'); // Change 'your_taxonomy' to your actual taxonomy name

if ($category_object && !is_wp_error($category_object)) {
    $category_name = $category_object->name;
    $category_link = get_term_link($category_object, 'category'); // Change 'your_taxonomy' to your actual taxonomy name
} else {
    $category_name = '';
    $category_link = '';
}
?>
<div class="swiper-slide bg-secondary">
    <div class="position-absolute bottom-0 <?= $cur_lan == 'en' ? 'start-0' : 'end-0';?> d-flex flex-column opacity-lg-25">
        <span data-aos="fade-<?= $cur_lan == 'en' ? 'left' : 'right';?>" data-aos-delay="1000" data-aos-duration="800">
            <?php
            $args = array(
                'class' => '',
                'fill-color' => $slide5['tileColor-1'] ?? '#9CCAAA',
                'fill-opacity' => $slide5['tileColor-1'] ? '' : '0.8'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
        <span data-aos="zoom-down" data-aos-delay="1300" data-aos-duration="800">
            <?php
            $args = array(
                'class' => 'translate-x-100',
                'fill-color' => $slide5['tileColor-2'] ?? '#9CCAAA',
                'fill-opacity' => $slide5['tileColor-1'] ? '' : '0.3'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
    </div>
    <div class="h-100 d-flex align-items-end flex-wrap <?= $cur_lan == 'en' ? '' : 'justify-content-lg-end';?>">
        <div class="h-lg-75 h-100 col-lg-11 col-12">
            <div class="h-100 d-flex flex-column gap-4 justify-content-center col justify-content-lg-start align-items-<?= $cur_lan == 'en' ? 'start' : 'end';?>">
                <h3 class="px-5 display-1 <?= $cur_lan == 'en' ? 'text-end' : 'text-start';?> fw-bold text-primary" data-aos="fade-<?= $cur_lan == 'en' ? 'right' : 'left';?>" data-aos-delay="700" data-aos-duration="800">
                    <?= $slide5['title'];?>
                </h3>
                <div class="col-11 swiper post_swiper" data-aos="fade-<?= $cur_lan == 'en' ? 'right' : 'left';?>" data-aos-delay="500" data-aos-duration="700">
                    <div class="swiper-wrapper <?= $cur_lan == 'en' ? '' : 'justify-content-lg-end';?>">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'orderby' => 'rand',
                        'number' => 3,
                        'order' => 'DESC',
                        'ignore_sticky_posts' => true,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $selected_cat,
                            ),
                        ),
                    );

                    $loop = new WP_Query($args);

                    if ($loop->have_posts()) :
                        while ($loop->have_posts()) :
                            $loop->the_post();?>
                            <article class="swiper-slide border border-white border-opacity-25 row px-0 justify-content-between align-items-stretch">
                                <img class="px-0 object-fit w-100 ratio-1" height="200" src="<?php echo the_post_thumbnail_url(); ?>"
                                     alt="<?php echo get_the_title(); ?>">
                                <div class="d-flex text-white flex-column justify-content-between p-4">
                                    <h4 class="<?= $cur_lan == 'en' ? '' : 'd-rtl';?>"><?= get_the_title(); ?></h4>
                                    <div class="text-justify <?= $cur_lan == 'en' ? '' : 'd-rtl';?>">
                                        <?= wp_trim_words(get_the_content(), 15); ?>
                                    </div>
                                    <div class="d-flex justify-content-end pt-3 pt-lg-0">
                                        <div class="col-auto align-items-center d-flex justify-content-between gap-3">
                                            <a class="btn btn-custom rounded-circle" href="<?php the_permalink(); ?>">
                                                <?=  esc_html__('See more', 'rokarno');  ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                       <?php  endwhile;
                    else :
                        echo '<p class="text-center fs-4 text-white">' . esc_html__('No posts found', 'rokarno') . '</p>';
                    endif;

                    wp_reset_postdata();
                    ?>
                    </div>
                </div>
                    <div class="post-pagination col-12 gap-2 z-2 d-flex justify-content-center align-items-center d-lg-none"></div>
            </div>
        </div>
    </div>
</div>
