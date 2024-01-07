<?php
/** Template Name: tile form */

get_header(); ?>
<section class="bg-secondary">
    <div class="container min-vh-100 py-5" id="tileTemplate">
        <h1 class="text-center fw-bold text-white display-3 py-4" data-aos="fade-down"><?= get_the_title(); ?></h1>
        <div class="mx-auto row align-items-center col-11 justify-content-center gap-3 border bg-white border-info border-opacity-10 p-lg-4 py-4 px-2 rounded-2" data-aos="fade-up">
            <div id="form" class="col-md-10 col-xl-7 d-flex flex-column gap-4">
                <!--            colors-->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-4">
                    <h5 class="mb-0 fs-5"> Background : </h5>
                    <ul class="list-unstyled px-0 d-flex gap-2 align-content-center mb-0 lh-2 color-list">
                        <li data-color="bg-primary" class="rounded-circle bg-primary"></li>
                        <li data-color="bg-secondary" class="rounded-circle bg-secondary"></li>
                        <li data-color="bg-info" class="rounded-circle bg-info"></li>
                        <li data-color="bg-danger" class="rounded-circle bg-danger"></li>
                        <li data-color="bg-success" class="rounded-circle bg-success"></li>
                        <li data-color="bg-dark" class="rounded-circle bg-dark"></li>
                        <li data-color="bg-white" class="rounded-circle bg-white border border-info"></li>
                    </ul>
                </article>
                <!--            shape-->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-4">
                    <h5 class="mb-0 fs-5">Shape :</h5>
                    <ul class="list-unstyled d-flex gap-2 align-content-center mb-0 lh-2 tile-shape">
                        <li data-size="square-tile" class="active">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            </svg>
                        </li>
                        <li data-size="circle-tile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            </svg>
                        </li>
                        <li data-size="diamond-tile">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-diamond" viewBox="0 0 16 16">
                                <path d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.482 1.482 0 0 1 0-2.098L6.95.435zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z"/>
                            </svg>
                        </li>
                    </ul>
                </article>
                <!--            sizes-->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-4">
                    <h5 class="mb-0 fs-5">Size :</h5>
                    <ul class="list-unstyled d-flex gap-2 align-content-center mb-0 lh-2 tile-size">
                        <li data-size="10">1x1</li>
                        <li data-size="20" class="active">2x2</li>
                        <li data-size="30">3x3</li>
                    </ul>
                </article>
                <!--            designs-->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-4">
                    <h5 class="mb-0 fs-5 lh-lg text-center text-lg-start col-auto">Design :</h5>
                    <div class="row row-cols-2 row-cols-lg-3 align-content-center w-100">

                        <?php
                        $chooseTileNumber = get_field('choose-tile-number');

                        for ($i = 1; $i <= $chooseTileNumber; $i++) {
                            ?>

                            <div class="choose-tile__container">
                                <button type="button" data-bs-target="#exampleModal" data-bs-toggle="modal"
                                        data-design="Design-<?= $i; ?>" class="choose-tile btn bg-transparent">
                                    select
                                </button>
                                <input type="number" class="percentage-input" placeholder="%" min="0" max="100">
                            </div>

                        <?php } ?>
                    </div>
                </article>
                <!--            submit form -->
                <article class="d-flex flex-wrap flex-lg-nowrap gap-4">
                    <button type="button" id="populateTileButton" class="btn btn-primary p-2 col-lg-3">Generate</button>
                    <button type="button" id="resetButton" class="btn bg-dark rounded-circle text-white w-auto py-2 px-3">R</button>
                </article>
            </div>
            <!--        preview-->
            <div class="col-xl-5 row justify-content-center align-items-center">
                <div id="tile"></div>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 p-3">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="modal-title fs-5" id="exampleModalLabel"></h5>
            </div>
            <div class="modal-body">
                <?php
                $tilesSquere = get_field('tilelist-squere');
                $tilesCircle = get_field('tilelist-circle');
                $tilesDimond = get_field('tilelist-dimond');
                ?>
                <div id="tileGallery">
                    <div id="square-tile" class="d-flex gap-4 flex-wrap justify-content-center">
                        <?php foreach ($tilesSquere as $tile): ?>
                            <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?> "
                                 data-bs-dismiss="modal" aria-label="Close"
                                 class="design-img">
                        <?php endforeach; ?>
                    </div>
                    <div id="circle-tile" class="d-flex gap-4 flex-wrap justify-content-center d-none">
                        <?php foreach ($tilesCircle as $tile): ?>
                            <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?> "
                                 data-bs-dismiss="modal" aria-label="Close"
                                 class="design-img">
                        <?php endforeach; ?>
                    </div>
                    <div id="diamond-tile" class="d-flex gap-4 flex-wrap justify-content-center d-none">
                        <?php foreach ($tilesDimond as $tile): ?>
                            <img src="<?= esc_url($tile['url']); ?>" alt="<?= esc_attr($tile['title']); ?> "
                                 data-bs-dismiss="modal" aria-label="Close"
                                 class="design-img">
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
