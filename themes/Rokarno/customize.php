<?php
/** Template Name: tile form */
get_header();
global $cur_lan;
?>
<section class="bg-secondary overflow-hidden position-relative">
    <?php get_template_part('template-parts/loop/tile-object') ?>
    <div class="py-5 px-xl-5" id="tileTemplate">
        <h1 class="text-center fw-bold col-lg-10 text-primary display-3 py-lg-2 py-4" data-aos="fade-down"><?= get_the_title(); ?></h1>
        <div class="row justify-content-center justify-content-lg-start mb-3">
            <article class="col-lg-10 px-4 py-2 py-lg-0 text-dark text-opacity-75">
                <?php the_content(); ?>
            </article>
        </div>
        <div class="row mx-auto mx-lg-0 align-items-center col-12 col-xl-10 justify-content-center gap-3 p-lg-4 py-2 py-lg-0 px-2"
             data-aos="fade-up">
            <div id="form" class="col-md-10 col-lg-12 col-xxl-7 row gap-3 justify-content-lg-between">
                <!--            colors-->
                <article class="d-flex col-xl-5 flex-wrap flex-lg-nowrap gap-2 align-items-lg-center">
                    <h5 class="mb-0 col-auto text-primary fw-bold fs-4"><?=  esc_html__('Background', 'rokarno');  ?> :</h5>
                    <ul class="list-unstyled px-0 d-flex gap-2 align-items-center mb-0 lh-2 color-list">
                        <li data-color="bg-white" class="bg-white"></li>
                        <li data-color="bg-info" class="bg-info"></li>
                        <li data-color="bg-dark" class="bg-dark"></li>
                        <li data-color="bg-success" class="bg-success"></li>
                        <li data-color="bg-danger" class="bg-danger"></li>
                        <li data-color="bg-primary" class="bg-primary"></li>
                        <li data-color="bg-warning" class="bg-warning"></li>
                        <li data-color="bg-transparent" class="d-flex justify-content-center bg-transparent border border-white border-opacity-75">
                            <div style="transform:rotate(45deg)" class="border border-danger border-opacity-75"></div>
                        </li>
                    </ul>
                </article>
                <!--            shape-->
<!--                <article class="d-flex col-xl-5 flex-wrap flex-lg-nowrap gap-2 align-items-lg-center">-->
<!--                    <h5 class="mb-0 text-primary col-auto fw-bold fs-4">--><?php //=  esc_html__('Shape', 'rokarno');  ?><!-- :</h5>-->
<!--                    <ul class="list-unstyled d-flex gap-2 align-content-center mb-0 lh-2 tile-shape">-->
<!--                        <li data-size="square-tile" data-length="144" class="active">-->
<!--                            <svg width="16" height="16" fill="currentColor"-->
<!--                                 class="bi bi-square" viewBox="0 0 16 16">-->
<!--                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>-->
<!--                            </svg>-->
<!--                        </li>-->
<!--                        <li data-size="Rectangle-tile" data-length="50">-->
<!--                            <svg width="16" height="16" fill="currentColor" class="bi bi-stop-btn" viewBox="0 0 16 16">-->
<!--                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1z"/>-->
<!--                            </svg>-->
<!--                        </li>-->
<!--                        <li data-size="hexagon-tile">-->
<!--                            <svg width="16" height="16" fill="currentColor" class="bi bi-hexagon" viewBox="0 0 16 16">-->
<!--                                <path d="M14 4.577v6.846L8 15l-6-3.577V4.577L8 1zM8.5.134a1 1 0 0 0-1 0l-6 3.577a1 1 0 0 0-.5.866v6.846a1 1 0 0 0 .5.866l6 3.577a1 1 0 0 0 1 0l6-3.577a1 1 0 0 0 .5-.866V4.577a1 1 0 0 0-.5-.866z"/>-->
<!--                            </svg>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </article>-->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-lg-4 gap-2 align-items-lg-center">
                    <h5 class="mb-0 fs-4 text-primary fw-bold lh-lg text-center text-lg-start col-auto"><?=  esc_html__('Design', 'rokarno');  ?> :</h5>
                    <div class="row row-cols-2 row-cols-xl-4 align-content-center">

                        <?php
                        $chooseTileNumber = get_field('choose-tile-number');

                        for ($i = 1; $i <= $chooseTileNumber; $i++) {
                            ?>

                            <div class="choose-tile__container bg-opacity-25 gap-4">
                                <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal" data-slot="<?= $i; ?>"
                                        data-design="<?=  esc_html__('Color', 'rokarno'); ?> <?= $i; ?>" class="choose-tile btn text-primary fw-bold bg-transparent">
                                    <?=  esc_html__('Color', 'rokarno'); ?> <?= $i; ?>
                                </button>
                                <input type="number" class="percentage-input" placeholder="%" min="0" max="100">
                            </div>

                        <?php } ?>
                    </div>
                </article>
                <!--            submit form -->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-1 align-items-center">
                    <button type="button" id="populateTileButton" class="btn btn-primary p-2 col-5 col-lg-2"><?=  esc_html__('Generate', 'rokarno'); ?></button>
                    <button id="wallCreator" class="btn btn-primary p-2 col-5 col-lg-3"><?=  esc_html__('Generate wall', 'rokarno'); ?></button>
                    <button type="button" id="resetButton" class="btn text-primary">
                        <svg width="25" height="25" fill="currentColor" class="bi bi-arrow-clockwise"
                             viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
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
<section class="col-lg-10 text-center pb-5 mb-5">
    <div id="wall" class="wall col-lg-6 col-12 justify-content-center row row-cols-5 mx-auto" <?= $cur_lan == 'en' ? '' : 'style="direction:ltr;"';?>></div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 p-3 pt-0">
            <div class="modal-header">
                <button type="button" class="btn-close <?= $cur_lan == 'en' ? '' : 'ms-0';?>" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title fs-5" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
                <?php
                $tilesSquere = get_field('tilelist-squere');
                $tilesSquereFull = get_field('tilelist-squere_full');
                $tilesRectangle = get_field('tilelist-rectangle');
                $tilesRectangleFull = get_field('tilelist-rectangle_full');
                $tilesHexagon = get_field('tilelist-hexagon');
                $tilesHexagonFull = get_field('tilelist-hexagon_full');
                ?>
                <div id="tileGallery">
                    <article id="square-tile" class="">
                        <ul class="nav nav-tabs p-0 flex-nowrap" role="tablist">
                            <li class="text-center nav-item" role="presentation">
                                <a class="nav-link active" id="crystal-tab-squere" data-bs-toggle="tab"
                                   href="#crystal-squere" role="tab"
                                   aria-controls="crystal-squere" aria-selected="true">Crystal Glass Mosaic</a>
                            </li>
                            <li class="text-center nav-item" role="presentation">
                                <a class="nav-link" id="full-body-tab-squere" data-bs-toggle="tab"
                                   href="#full-body-squere" role="tab"
                                   aria-controls="full-body-squere" aria-selected="false">Full Body Glass Mosaic</a>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade show active" id="crystal-squere" role="tabpanel"
                                 aria-labelledby="crystal-tab-squere">
                                <div class="d-flex gap-lg-4 gap-3 flex-wrap justify-content-center">
                                    <?php foreach ($tilesSquere as $tile): ?>
                                        <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?>"
                                             data-bs-dismiss="modal" aria-label="Close"
                                             class="design-img">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="full-body-squere" role="tabpanel"
                                 aria-labelledby="full-body-tab-squere">
                                <div class="d-flex gap-lg-4 gap-3 flex-wrap justify-content-center">
                                    <?php foreach ($tilesSquereFull as $tile): ?>
                                        <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?>"
                                             data-bs-dismiss="modal" aria-label="Close"
                                             class="design-img">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </article>

                    <article id="Rectangle-tile" class="d-none">
                        <ul class="nav nav-tabs p-0 flex-nowrap" role="tablist">
                            <li class="text-center nav-item" role="presentation">
                                <a class="nav-link active" id="crystal-tab-Rectangle" data-bs-toggle="tab"
                                   href="#crystal-Rectangle" role="tab"
                                   aria-controls="crystal-Rectangle" aria-selected="true">Crystal Glass Mosaic</a>
                            </li>
                            <li class="text-center nav-item" role="presentation">
                                <a class="nav-link" id="full-body-tab-Rectangle" data-bs-toggle="tab"
                                   href="#full-body-Rectangle" role="tab"
                                   aria-controls="full-body-Rectangle" aria-selected="false">Full Body Glass Mosaic</a>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade show active" id="crystal-Rectangle" role="tabpanel"
                                 aria-labelledby="crystal-tab-Rectangle">
                                <div class="d-flex gap-lg-4 gap-3 flex-wrap justify-content-center">
                                    <?php foreach ($tilesRectangle as $tile): ?>
                                        <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?>"
                                             data-bs-dismiss="modal" aria-label="Close"
                                             class="design-img">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="full-body-Rectangle" role="tabpanel"
                                 aria-labelledby="full-body-tab-Rectangle">
                                <div class="d-flex gap-lg-4 gap-3 flex-wrap justify-content-center">
                                    <?php foreach ($tilesRectangleFull as $tile): ?>
                                        <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?>"
                                             data-bs-dismiss="modal" aria-label="Close"
                                             class="design-img">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                    <article id="hexagon-tile" class="d-none">
                        <ul class="nav nav-tabs p-0 flex-nowrap" role="tablist">
                            <li class="text-center nav-item" role="presentation">
                                <a class="nav-link active" id="crystal-tab-diamond" data-bs-toggle="tab"
                                   href="#crystal-diamond" role="tab"
                                   aria-controls="crystal-diamond" aria-selected="true">Crystal Glass Mosaic</a>
                            </li>
                            <li class="text-center nav-item" role="presentation">
                                <a class="nav-link" id="full-body-tab-diamond" data-bs-toggle="tab"
                                   href="#full-body-diamond" role="tab"
                                   aria-controls="full-body-diamond" aria-selected="false">Full Body Glass Mosaic</a>
                            </li>
                        </ul>
                        <div class="tab-content border border-top-0 p-4">
                            <div class="tab-pane fade show active" id="crystal-diamond" role="tabpanel"
                                 aria-labelledby="crystal-tab-diamond">
                                <div class="d-flex gap-lg-4 gap-3 flex-wrap justify-content-center">
                                    <?php foreach ($tilesHexagon as $tile): ?>
                                        <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?>"
                                             data-bs-dismiss="modal" aria-label="Close"
                                             class="design-img">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="full-body-diamond" role="tabpanel"
                                 aria-labelledby="full-body-tab-diamond">
                                <div class="d-flex gap-lg-4 gap-3 flex-wrap justify-content-center">
                                    <?php foreach ($tilesHexagonFull as $tile): ?>
                                        <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?>"
                                             data-bs-dismiss="modal" aria-label="Close"
                                             class="design-img">
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
