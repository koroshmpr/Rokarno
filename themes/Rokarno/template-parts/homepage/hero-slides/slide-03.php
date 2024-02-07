<?php
$slide3 = get_field('slide-03');
global $cur_lan;
?>

<div class="swiper-slide bg-secondary">
    <div class="d-flex flex-column justify-items-lg-between justify-content-end h-100 align-items-end">
        <div class="col-lg-6 d-none d-lg-inline h-50">
            <div class="animate-img animate-img-x h-100" style="background: url('<?php echo $slide3['img']['url'] ?? ''; ?>');"></div>
        </div>
        <div class="row w-100 mx-0 h-lg-50 h-100 gap-lg-4 justify-content-start">
            <div class="col-lg-4 px-0 h-35 order-last object-fit order-lg-first">
                <div class="animate-img animate-img-y h-100" style="background: url('<?php echo $slide3['img_second']['url'] ?? ''; ?>') center center / cover;"></div>
            </div>
            <div class="col-lg-6 row align-content-center gap-0 h-65 <?= $cur_lan == 'en' ? 'text-end' : '';?> p-4" data-aos="fade-right" data-aos-delay="500">
                <h3 class="display-2 fw-bold text-primary"><?= $slide3['title']; ?></h3>
                <p class="text-dark text-opacity-75 fs-5">
                    <?= $slide3['content']; ?>
                </p>
                <a title="shop page" class="bg-dark bg-opacity-10 btn btn-custom col-4" href="<?= $slide3['btn-link']['url'] ?? ''; ?>">
                    <?=  esc_html__('MORE', 'rokarno');  ?>
                </a>
            </div>

        </div>
    </div>
</div>
