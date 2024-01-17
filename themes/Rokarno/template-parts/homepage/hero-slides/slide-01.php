<?php
$slide1 = get_field('slide-01');
?>
<div class="swiper-slide d-flex flex-column align-items-xxl-start align-items-center">
    <div class="position-absolute start-0 top-0 col-2 h-auto d-none d-lg-inline">
        <div class="w-100 animate-img animate-img-x vh-65 object-fit z-2" style="background: url('<?php echo $slide1['img']['url'] ?? ''; ?>');"></div>
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
    <figure class="col-lg-7 h-lg-35 h-35 ms-auto" data-aos="fade-up" data-aos-duration="1000">
        <video id="homeVideo" class="object-fit h-100" poster="<?= $slide1['video_cover']['url'] ?? ''; ?>" width="100%" height="auto">
            <source src="<?= $slide1['video']['url'] ?? ''; ?>" type="video/mp4">
            <track kind="captions" label="English" src="<?= $slide1['captions']['url'] ?? ''; ?>" srclang="en" default>
        </video>
        <button id="playButton" type="button" aria-labelledby="homeVideo" aria-label="Play Video" class="position-absolute top-50 ratio-1x1 start-50 translate-middle btn bg-dark bg-opacity-50 rounded-circle p-3">
            <svg id="playButtonSvg" width="70" height="70" fill="white" class="bi bi-play-fill" viewBox="0 0 16 16">
                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
            </svg>
        </button>
    </figure>

</div>