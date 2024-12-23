<?php global $cur_lan; ?>
<section id="heroSlide" class="swiper hero_slider bg-secondary">
    <div class="swiper-wrapper" <?= $cur_lan == 'en' ? '' : 'style="direction:ltr;"' ?>>
        <?php
        get_template_part('template-parts/homepage/hero-slides/slide-01');
        get_template_part('template-parts/homepage/hero-slides/slide-02');
        get_template_part('template-parts/homepage/hero-slides/slide-04');
        get_template_part('template-parts/homepage/hero-slides/slide-03');
        get_template_part('template-parts/homepage/hero-slides/slide-05');
        ?>
    </div>
</section>