<?php
$slide3 = get_field('slide-03');
?>

<div class="swiper-slide bg-secondary">
    <div class="d-flex flex-column justify-items-lg-between justify-content-end h-100 align-items-end">
        <div class="col-lg-6 h-auto h-lg-50">
            <div class="animate-img animate-img-x h-100" style="background: url('<?php echo $slide3['img']['url'] ?? ''; ?>');"></div>
        </div>
<!--        <img class="col-lg-6 object-fit h-auto h-lg-50" src="--><?php //= $slide3['img']['url'] ?? ''; ?><!--"-->
<!--             alt="--><?php //= $slide3['img']['title']; ?><!--" data-aos="fade-down" data-aos-delay="300" data-aos-duration="600">-->
        <div class="row h-50 gap-lg-4 justify-content-lg-start justify-content-start">
            <div class="col-lg-4 px-0 order-last object-fit order-lg-first">
                <div class="animate-img animate-img-y h-100" style="background: url('<?php echo $slide3['img_second']['url'] ?? ''; ?>');"></div>
            </div>
<!--            <img data-aos="fade-up" data-aos-duration="700" data-aos-delay="1000" class="col-lg-4 px-0 order-last object-fit order-lg-first" src="--><?php //= $slide3['img_second']['url'] ?? ''; ?><!--"-->
<!--                 alt="--><?php //= $slide3['img_second']['title'] ?? ''; ?><!--">-->
            <div class="col-lg-4 text-end py-3 px-4" data-aos="fade-right" data-aos-delay="1000">
                <h3 class="display-2 fw-bold text-primary"><?= $slide3['title']; ?></h3>
                <p class="text-dark text-opacity-50 fs-5">
                    <?= $slide3['content']; ?>
                </p>
                <a class="bg-dark bg-opacity-10 btn btn-custom col-6" href="<?= $slide3['btn-link']['url'] ?? ''; ?>"> MORE</a>
            </div>

        </div>
    </div>
</div>
