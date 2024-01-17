<?php
$slide3 = get_field('slide-03');
?>

<div class="swiper-slide bg-secondary">
    <div class="d-flex flex-column justify-items-lg-between justify-content-end h-100 align-items-end">
        <div class="col-lg-6 col-12 h-50">
            <div class="animate-img animate-img-x h-100" style="background: url('<?php echo $slide3['img']['url'] ?? ''; ?>');"></div>
        </div>
        <div class="row h-50 gap-lg-4 justify-content-lg-start justify-content-start">
            <div class="col-lg-4 px-0 order-last object-fit order-lg-first">
                <div class="animate-img animate-img-y h-100" style="background: url('<?php echo $slide3['img_second']['url'] ?? ''; ?>');"></div>
            </div>
            <div class="col-lg-4 text-end py-3 px-4" data-aos="fade-right" data-aos-delay="1000">
                <h3 class="display-2 fw-bold text-primary"><?= $slide3['title']; ?></h3>
                <p class="text-dark text-opacity-50 fs-5">
                    <?= $slide3['content']; ?>
                </p>
                <a title="shop page" class="bg-dark bg-opacity-10 btn btn-custom col-6" href="<?= $slide3['btn-link']['url'] ?? ''; ?>"> MORE</a>
            </div>

        </div>
    </div>
</div>
