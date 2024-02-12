<?php
/** Template Name: about us */
global $cur_lan;
get_header(); ?>
<section class="d-flex">
    <img class="img-fluid contact-hero object-fit-cover col-lg-12" src="<?= get_field('image')['url'] ?? '' ?>" alt="rokarno about">
</section>
<section class="h-100">
    <div class="row justify-content-center bg-secondary my-3">
        <h1 data-aos="fade-down" data-aos-duration="1000"  class="text-center <?= $cur_lan == 'en' ? 'text-lg-end mb-0' : 'text-lg-start' ?> display-2 text-primary fw-bold">
            <!--            --><?php //= get_field('title'); ?>
            <?= get_the_title(); ?>
        </h1>
        <div class="col">
            <article class="p-4 py-lg-3 px-lg-0 col-lg-11 text-dark text-justify fs-6">
                <?= get_field('about_desctiption'); ?>
            </article>
        </div>
    </div>
</section>
<?php
$personnelSwitch = get_field('personnels-switch');
if ($personnelSwitch) {
    ?>
    <section class="py-3 px-0" data-aos="fade-up">
        <div class="swiper card-slide">
            <div class="swiper-wrapper">
                <?php
                $personnels = get_field('personnels');
                if ($personnels) {
                    foreach ($personnels as $personnel) :
                        ?>
                        <div class="swiper-slide bg-primary bg-opacity-75">
                            <div class="row gap-5 justify-content-center p-5">
                                <img class="col-lg-8 rounded-circle px-0 ratio-1 object-fit-cover" src="<?= $personnel['image']['url'] ?? '' ?>"
                                     alt="<?= $personnel['image']['title'] ?? '' ?>">
                                <h3 class="text-secondary text-center"><?= $personnel['name'] ?></h3>
                            </div>
                        </div>
                    <?php
                    endforeach;
                }
                ?>
            </div>

        </div>
    </section>
    <?php } ?>
<?php get_footer(); ?>
