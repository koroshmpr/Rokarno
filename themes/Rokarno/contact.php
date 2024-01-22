<?php
/** Template Name: Contact us */

get_header(); ?>
<section class="bg-secondary">
        <div class="row justify-content-end gap-4">
            <img class="contact-hero col-lg-10 px-0 img-fluid object-fit-cover" data-aos="fade-down"
                 src="<?= get_the_post_thumbnail_url(); ?>" alt="<?= get_the_title(); ?>">
        </div>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6 row gap-3 justify-content-center">
                <h1 class="text-primary fw-bold display-2 text-center" data-aos="fade-up" data-aos-duration="1000">Address</h1>
                <address class="display-3 text-dark text-opacity-75 mb-0 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <?= get_field('address', 'option'); ?>
                </address>

                <h2 class="text-primary fw-bold display-2 text-center" data-aos="fade-up" data-aos-duration="1000">Factory Address</h2>
                <address class="display-3 text-dark text-opacity-75 mb-0 text-center" data-aos="fade-up" data-aos-duration="1000">
                    <?= get_field('address_factory', 'option'); ?>
                </address>
                <a class="bg-dark bg-opacity-10 col-auto bg-opacity-10 p-3 rounded-2 text-dark text-opacity-75 d-flex align-items-center gap-3" href="tel:<?= get_field('phone', 'option'); ?>">
                    Call Us!
                </a>
                <div class="w-100 d-flex align-items-center justify-content-center gap-4 py-4">
                    <?php
                    if (have_rows('social', 'option')):
                        // Loop through rows.
                        while (have_rows('social', 'option')) : the_row(); ?>
                            <a class="text-primary" aria-label="<?= get_sub_field('name', 'option'); ?>"
                               href="<?= get_sub_field('link', 'option')['url']; ?>">
                                <?= get_sub_field('icon', 'option'); ?>
                            </a>
                        <?php endwhile;
                    endif; ?>
                </div>
<!--                <a class="bg-white bg-opacity-10 p-3 rounded-2 text-white d-flex align-items-center gap-3" href="mailto:--><?php //= get_field('email', 'option'); ?><!--">-->
<!--                    <svg width="35" height="35" fill="currentColor" class="bi bi-envelope-open-fill" viewBox="0 0 16 16">-->
<!--                        <path d="M8.941.435a2 2 0 0 0-1.882 0l-6 3.2A2 2 0 0 0 0 5.4v.314l6.709 3.932L8 8.928l1.291.718L16 5.714V5.4a2 2 0 0 0-1.059-1.765zM16 6.873l-5.693 3.337L16 13.372v-6.5Zm-.059 7.611L8 10.072.059 14.484A2 2 0 0 0 2 16h12a2 2 0 0 0 1.941-1.516M0 13.373l5.693-3.163L0 6.873z"/>-->
<!--                    </svg>-->
<!--                    --><?php //= get_field('email', 'option'); ?>
<!--                </a>-->
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>
