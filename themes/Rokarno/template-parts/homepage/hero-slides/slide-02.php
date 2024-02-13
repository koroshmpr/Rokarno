<?php
$slide2 = get_field('slide-02');
global $cur_lan;
?>
<div class="swiper-slide bg-secondary">
    <div class="position-absolute <?= $cur_lan == 'en' ? 'start-0' : 'end-0';?> d-flex flex-column opacity-lg-25">
        <span data-aos="fade-down" data-aos-delay="1000" data-aos-duration="200">
                <?php
                $args = array(
                    'class' => 'translate-x-100',
                    'fill-color' => '#9CCAAA',
                    'fill-opacity' => '0.6'
                );
                get_template_part('template-parts/svg/tales/tale', null, $args);
                ?>
            </span>
        <span data-aos="fade-left" data-aos-delay="1200" data-aos-duration="200">
            <?php
            $args = array(
                'class' => '',
                'fill-color' => '#0E5A57',
                'fill-opacity' => '0.6'
            );
            get_template_part('template-parts/svg/tales/tale', null, $args);
            ?>
        </span>
    </div>
    <div class="h-100 gap-lg-4 d-flex align-items-center gap-3 <?= $cur_lan == 'en' ? '' : 'flex-lg-row-reverse';?>">
        <div class="col-3 col-lg-2 h-100 overflow-hidden">
            <div class="animate-img animate-img-x h-100" style="background: url('<?php echo $slide2['img']['url'] ?? ''; ?>') center center / cover;"></div>
        </div>
        <div class="col-lg-4 <?= $cur_lan == 'en' ? 'pe-3 text-end' : 'ps-3 text-start';?>" data-aos="fade-up" data-aos-delay="700">
            <h3 class="display-2 fw-bold text-primary"><?= $slide2['title']; ?></h3>
            <p class="text-dark text-opacity-75 fs-5 <?= $cur_lan == 'en' ? '' : 'd-rtl';?>">
                <?= $slide2['content']; ?>
            </p>
            <a class="bg-dark bg-opacity-10 btn btn-custom col-11 col-lg-6"
               href="<?= esc_url($slide2['btn-link']['url'] ?? ''); ?>"
               title="about us page">
                <?=  esc_html__('MORE', 'rokarno');  ?>
            </a>
        </div>
    </div>
</div>
