<?php
/** Template Name: about us */

get_header(); ?>
<section class="position-relative">
    <div class="position-absolute top-lg-25 top-50 translate-middle-y start-0 end-0 row justify-content-center">
        <h1 data-aos="fade-down" data-aos-duration="2000" data-aos-delay="3000"
            class="col-lg-8 col-11 display-1 text-white fw-bold"> <?= get_field('title'); ?></h1>
    </div>
    <img class="img-fluid vw-100 about-hero" src="<?= get_field('image')['url'] ?? '' ?>" alt="rokarno about">
</section>
<section class="container h-100 px-0 col-10">
    <div class="row justify-content-center bg-secondary translate-n200 shadow">
        <img class="col-lg-7 px-0" src="<?= get_field('about_desctiption_img')['url'] ?? '' ?>" alt="rokarno about">
        <div class="col-lg-5 px-0">
            <article class="p-4 p-lg-5 text-white text-justify fs-6">
                <?= get_field('about_desctiption'); ?>
            </article>
        </div>
    </div>
</section>
<?php
$personnelSwitch = get_field('personnels-switch');
if ($personnelSwitch) {
    ?>
    <section class="container-fluid py-5 px-0" data-aos="fade-up">
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
