<?php
$slide1 = get_field('slide-01');
?>
<div class="swiper-slide d-flex flex-column align-items-xxl-start align-items-center">
    <div class="position-absolute start-0 top-0 col-2 h-auto d-none d-lg-inline">
        <div class="w-100 animate-img animate-img-x vh-65 object-fit z-2" style="background: url('<?php echo $slide1['img']['url'] ?? ''; ?>');"></div>
        <!--        <img class="w-100 vh-65 object-fit z-2" data-aos="fade-left"-->
<!--             data-aos-delay="400" data-aos-duration="600" src="--><?php //= $slide1['img']['url'] ?? ''; ?><!--"-->
<!--             alt="--><?php //= $slide1['img']['title']; ?><!--">-->
            <div class="position-absolute top-75 d-flex flex-column opacity-lg-25">
                <span data-aos="zoom-in" data-aos-delay="800" data-aos-duration="600">
            <?php
            $args = array(
                'class' => 'translate-x-100',
                'fill-color' => '#9CCAAA',
                'fill-opacity' => '0.8'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
                <span data-aos="zoom-in" data-aos-delay="900" data-aos-duration="600">
                    <?php
                    $args = array(
                        'class' => '',
                        'fill-color' => '#9CCAAA',
                        'fill-opacity' => '0.3'
                    );
                    get_template_part('template-parts/svg/tales/tale', null, $args);
                    ?>
                 </span>
                <span data-aos="zoom-in" data-aos-delay="1000" data-aos-duration="600">
                        <?php
                        $args = array(
                            'class' => 'translate-x-100',
                            'fill-color' => '#CEC8C0',
                            'fill-opacity' => '0.3'
                        );
                        get_template_part('template-parts/svg/tales/tale', null, $args);
                        ?>
                </span>
            </div>
    </div>
    <div class="col-md-10 d-flex h-65 flex-column align-items-center justify-content-end" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="500">
        <h2 class="display-lg col-lg-8 fw-bolder text-primary lh-0 mb-0 d-flex flex-wrap">
            Living in <p class="text-white" data-aos="fade-right" data-aos-delay="1200" data-aos-duration="700">Dream</p>

        </h2>
            <p class="text-primary col-12 col-lg-8 px-2 px-lg-3 fs-4">2012</p>
    </div>
    <video controls class="col-lg-7 h-lg-35 ms-auto object-fit" data-aos="fade-up" data-aos-duration="1000"
           poster="<?= $slide1['video_cover']['url'] ?? '' ; ?>"
           src="<?= $slide1['video']['url'] ?? '' ; ?>"></video>
</div>