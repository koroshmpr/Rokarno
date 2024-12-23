<?php
/** Template Name: Contact us */

get_header(); ?>
<section class="bg-secondary">
    <div class="row gap-4 position-relative">
        <img class="contact-hero col-lg-12 px-0 img-fluid object-fit-cover" data-aos="fade-down"
             src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>">
<!--        <div class="position-absolute top-lg-25 top-50 translate-middle-y start-0 p-0 end-0 row justify-content-lg-start justify-content-center">-->
<!--            <h1 data-aos="fade-down" data-aos-duration="2000" data-aos-delay="1000"-->
<!--                class="col-lg-6 p-0 m-0 px-lg-4 display-1 text-center text-lg-start text-white fw-bold"> --><?php //= get_the_title(); ?><!--</h1>-->
<!--        </div>-->
    </div>
    <div class="py-3 px-lg-5">
        <div class="row justify-content-center">
            <div class="row-cols-lg-2 row justify-content-center">
                <div class="p-3 py-lg-0 row gap-3 justify-content-center">
                    <h2 class="text-primary fw-bold display-3 text-center" data-aos="fade-up" data-aos-duration="1000">
                        <?= esc_html__('Headquarter', 'rokarno'); ?>
                    </h2>
                    <address class="display-6 text-dark text-opacity-75 mb-0 text-center" data-aos="fade-up"
                             data-aos-duration="1000">
                        <?= get_field('address', 'option'); ?>
                    </address>
                    <a class="bg-dark bg-opacity-10 col-auto bg-opacity-10 p-3 text-dark text-opacity-75 d-flex justify-content-center align-items-center gap-1"
                       href="tel:<?= get_field('phone', 'option'); ?>" data-aos="zoom-in">
                        <?= esc_html__('Call Us!', 'rokarno'); ?>
                        <span><?= get_field('phone', 'option'); ?></span>
                    </a>
                    <a class="bg-dark bg-opacity-10 col-auto bg-opacity-10 p-3 text-dark text-opacity-75 d-flex justify-content-center align-items-center gap-1"
                       href="tel:<?= get_field('phone', 'option'); ?>" data-aos="zoom-in">
                        <span><?= get_field('mobile', 'option'); ?></span>
                    </a>
                </div>
                <div class="p-4 py-lg-0 row gap-3 justify-content-center">
                    <h2 class="text-primary fw-bold display-3 text-center" data-aos="fade-up" data-aos-duration="1000">
                        <?= esc_html__('Factory Address', 'rokarno'); ?>
                    </h2>
                    <address class="display-6 text-dark text-opacity-75 mb-0 text-center" data-aos="fade-up"
                             data-aos-duration="1000">
                        <?= get_field('address_factory', 'option'); ?>
                    </address>
                    <a class="bg-dark bg-opacity-10 col-auto bg-opacity-10 p-3 text-dark text-opacity-75 d-flex justify-content-center align-items-center gap-1"
                       href="tel:<?= get_field('phone_factory', 'option'); ?>" data-aos="zoom-in">
                        <?= esc_html__('Call Us!', 'rokarno'); ?>
                        <span><?= get_field('phone_factory', 'option'); ?> </span>
                    </a>
                    <a class="bg-dark bg-opacity-10 col-auto bg-opacity-10 p-3 text-dark text-opacity-75 d-flex justify-content-center align-items-center gap-1"
                       href="tel:<?= get_field('phone_factory', 'option'); ?>" data-aos="zoom-in">
                        <span><?= get_field('mobile_factory', 'option'); ?> </span>
                    </a>
                </div>
            </div>
            <div class="w-100 d-flex align-items-center justify-content-center gap-4 py-3">
                <?php
                if (have_rows('social', 'option')):
                    // Loop through rows.
                    while (have_rows('social', 'option')) : the_row(); ?>
                        <a target="_blank" class="text-primary" aria-label="<?= get_sub_field('name', 'option'); ?>"
                           href="<?= get_sub_field('link', 'option')['url']; ?>">
                            <?= get_sub_field('icon', 'option'); ?>
                        </a>
                    <?php endwhile;
                endif; ?>
            </div>
            <a class="bg-dark bg-opacity-10 col-auto p-2 text-primary d-flex align-items-center gap-3"
               href="mailto:<?= get_field('email', 'option'); ?>">
                <svg width="25" height="25" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16">
                    <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.314l6.709 3.932L8 8.928l1.291.718L16 5.714V5.4a2 2 0 0 0-1.059-1.765zM16 6.873l-5.693 3.337L16 13.372v-6.5Zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516M0 13.373l5.693-3.163L0 6.873z"/>
                </svg>
                <?= get_field('email', 'option'); ?>
            </a>

        </div>
    </div>
</section>


<?php get_footer(); ?>
