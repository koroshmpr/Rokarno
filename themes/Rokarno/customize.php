<?php
/** Template Name: tile form */
get_header();
global $cur_lan;
?>
<section class="bg-secondary overflow-hidden position-relative">
    <?php get_template_part('template-parts/loop/tile-object') ?>
    <div class="py-5 px-xl-5" id="tileTemplate">
        <h1 class="text-center fw-bold col-lg-10 text-primary display-3 py-lg-2 py-4"
            data-aos="fade-down"><?= get_the_title(); ?></h1>
        <div class="row justify-content-center justify-content-lg-start mb-3">
            <article class="col-lg-10 px-4 py-2 py-lg-0 text-dark text-opacity-75 hideprint">
                <?php the_content(); ?>
            </article>
        </div>
        <div class="row mx-auto mx-lg-0 align-items-center col-12 col-xl-10 justify-content-center gap-3 p-lg-4 py-2 py-lg-0 px-2"
             data-aos="fade-up">
            <div id="form" class="col-md-10 col-lg-12 col-xxl-7 row gap-3 justify-content-lg-between">
                <!--            colors-->
                <article class="d-flex col-xl-5 flex-wrap flex-lg-nowrap gap-2 align-items-lg-center hideprint">
                    <h5 class="mb-0 col-auto text-primary fw-bold fs-4"><?= esc_html__('strapping', 'rokarno'); ?>
                        :</h5>
                    <ul class="list-unstyled px-0 d-flex gap-2 align-items-center mb-0 lh-2 color-list">
                        <li data-color="bg-white" class="bg-white"></li>
                        <li data-color="bg-info" class="bg-info"></li>
                        <li data-color="bg-dark" class="bg-dark"></li>
                        <li data-color="bg-success" class="bg-success"></li>
                        <li data-color="bg-danger" class="bg-danger"></li>
                        <li data-color="bg-primary" class="bg-primary"></li>
                        <li data-color="bg-warning" class="bg-warning"></li>
                        <li data-color="bg-transparent"
                            class="d-flex justify-content-center bg-transparent border border-white border-opacity-75">
                            <div style="transform:rotate(45deg)" class="border border-danger border-opacity-75"></div>
                        </li>
                    </ul>
                </article>
                <article class="d-flex flex-wrap flex-lg-nowrap gap-lg-4 gap-2 align-items-lg-center">
                    <h5 class="mb-0 fs-4 text-primary fw-bold lh-lg text-start col-3 col-lg-auto"><?= esc_html__('Design', 'rokarno'); ?>
                        :</h5>
                    <div class="row row-cols-2 row-cols-xl-4 align-content-center">

                        <?php
                        $chooseTileNumber = get_field('choose-tile-number');

                        for ($i = 1; $i <= $chooseTileNumber; $i++) {
                            ?>

                            <div class="choose-tile__container bg-opacity-25 gap-4">
                                <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal"
                                        data-slot="<?= $i; ?>"
                                        data-design="<?= esc_html__('Color', 'rokarno'); ?> <?= $i; ?>"
                                        class="choose-tile btn text-primary fw-bold bg-transparent">
                                    <?= esc_html__('Color', 'rokarno'); ?> <?= $i; ?>
                                </button>
                                <input type="number" class="percentage-input" placeholder="%" min="0" max="100">
                            </div>

                        <?php } ?>
                    </div>
                </article>
                <!--            submit form -->
                <article class="d-flex flex-lg-nowrap gap-1 align-items-center hideprint">
                    <button type="button" id="populateTileButton"
                            class="btn btn-primary p-2 col-4 col-lg-2"><?= esc_html__('Generate', 'rokarno'); ?></button>
                    <button id="wallCreator"
                            class="btn btn-primary p-2 col-4 col-lg-3"><?= esc_html__('Generate wall', 'rokarno'); ?></button>
                    <button type="button" id="resetButton" class="btn text-primary">
                        <svg width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                        </svg>
                    </button>
                    <button class="btn text-primary" onclick="window.print();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
                            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1"/>
                        </svg>
                    </button>
                </article>
            </div>
            <!--        preview-->
            <div class="tileContainer col-xl-5 row justify-content-center align-items-center">
                <div id="tile"></div
            </div>
        </div>
    </div>
</section>
<section class="col-lg-10 text-center pb-5 mb-5 hideprint">
    <div id="wall"
         class="wall col-lg-6 col-12 justify-content-center row row-cols-5 mx-auto" <?= $cur_lan == 'en' ? '' : 'style="direction:ltr;"'; ?>></div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-0 p-0">
            <div class="modal-header">
                <button type="button" class="btn-close <?= $cur_lan == 'en' ? '' : 'ms-0'; ?>" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                <h5 class="modal-title fs-5" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
                <div id="tileGallery">
                    <?php
                    $tiles = get_field('tiles');
                    if ($tiles) : ?>
                        <ul class="nav nav-tabs p-0 flex-wrap" role="tablist">
                            <?php foreach ($tiles as $i => $tile) : ?>
                                <li class="text-center nav-item" role="presentation">
                                    <a class="nav-link<?= $i == 0 ? ' active' : ''; ?>" id="<?= str_replace(' ', '-', $tile['name']); ?>-tab"
                                       data-bs-toggle="tab"
                                       href="#<?= str_replace(' ', '-', $tile['name']); ?>-content" role="tab"
                                       aria-controls="<?= str_replace(' ', '-', $tile['name']); ?>"
                                       aria-selected="true"><?= $tile['name']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <?php
                            foreach ($tiles as $i => $tile) : ?>
                                <div class="tab-pane fade<?= $i == 0 ? ' show active' : ''; ?>" id="<?= str_replace(' ', '-', $tile['name']); ?>-content" role="tabpanel"
                                     aria-labelledby="<?= str_replace(' ', '-', $tile['name']); ?>-tab">
                                    <div class="d-flex gap-2 flex-wrap justify-content-center">
                                        <?php
                                        $images = $tile['gallery'];
                                        if ($images) :
                                            foreach ($images as $image) : ?>
                                                <img src="<?= esc_url($image['url']); ?>" width="50"
                                                     alt="<?= esc_attr($image['title']); ?>"
                                                     data-bs-dismiss="modal" aria-label="Close"
                                                     tile-type="<?= $tile['type']; ?>"
                                                     class="design-img">
                                            <?php endforeach;
                                        endif; ?>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>
