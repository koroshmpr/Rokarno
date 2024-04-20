<?php
$slide1 = get_field('slide-01');
global $cur_lan;
?>
<div class="swiper-slide d-flex flex-column align-items-xxl-<?= $cur_lan == 'en' ? 'start' : 'end';?> align-items-center">
    <div class="position-absolute <?= $cur_lan == 'en' ? 'start-0' : 'end-0';?> top-0 col-2 h-auto d-none d-lg-inline">
        <div class="w-100 animate-img animate-img-x vh-65 object-fit z-2" style="background: url('<?php echo esc_url($slide1['img']['url'] ?? ''); ?>');"></div>
           <div class="position-relative">
               <div class="position-absolute <?= $cur_lan == 'en' ? 'end-0' : 'start-0';?> d-flex flex-column opacity-lg-25" style="top:-150px;">
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
    </div>
    <div class="d-flex h-lg-65 h-50 flex-column justify-content-end <?= $cur_lan == 'en' ? '' : 'align-items-end';?>"
         data-aos="fade-up" data-aos-delay="1000" data-aos-duration="500">
        <h2 class="display-lg col-lg-8 px-2 fw-bolder text-white lh-0 mb-0 d-flex flex-wrap <?= $cur_lan == 'en' ? '' : 'justify-content-end';?>">
        <?= $slide1['big_title']; ?>
            <p class="text-primary" data-aos="fade-right" data-aos-delay="1200" data-aos-duration="700">
                <?= $slide1['big_title_colored']; ?>
            </p>
        </h2>
        <p class="text-primary col-12 <?= $cur_lan == 'en' ? 'col-lg-8' : 'col-lg-4 ms-auto';?> px-2 px-lg-3 fs-4">2012</p>
    </div>
    <figure class="col-lg-7 mb-0 h-lg-35 h-50 <?= $cur_lan == 'en' ? 'ms-auto' : 'me-auto';?>" data-aos="fade-up" data-aos-duration="1000">
        <video id="homeVideo" class="object-fit h-100" poster="<?= esc_url($slide1['video_cover']['url'] ?? ''); ?>" width="100%" height="auto" preload="none">
            <source src="<?= esc_url($slide1['video']['url'] ?? ''); ?>" type="video/mp4">
            <track kind="captions" label="English" src="<?= esc_url($slide1['captions']['url'] ?? ''); ?>" srclang="en" default>
        </video>
        <button id="playButton" type="button" aria-labelledby="homeVideo" aria-label="Play Video" class="position-absolute top-50 ratio-1x1 start-50 translate-middle btn bg-dark bg-opacity-50 rounded-circle p-3">
            <svg id="playButtonSvg" width="70" height="70" fill="white" class="bi bi-play-fill" viewBox="0 0 16 16">
                <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393"/>
            </svg>
        </button>
    </figure>

</div>