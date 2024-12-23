<?php
/** Template Name: download */
get_header(); ?>
<section class="py-5 px-lg-5 min-vh-100">
    <div class="row pt-5 row-cols-lg-3 pt-lg-0 gap-lg-5 align-items-center">
        <?php
        $catalogues = get_field('catalogues');
        if ($catalogues):
            foreach ($catalogues as $catalogue):
                ?>
                <div class="row gap-3 justify-content-center">
                    <div class="text-center">
                        <img height="500" src="<?= $catalogue['image']['url'] ?? '' ; ?>" alt="<?= $catalogue['image']['title'] ?? '' ; ?>">
                    </div>
                    <div class="download-btn">
                        <label>
                            <input class="check" type="checkbox">
                            <div class="dl-btn card card-body">
                        <span class="me" href="<?= $catalogue['catalogue_file']['url'] ?? ''; ?>">
                              <svg width="70" height="70" fill="currentColor" class="bi bi-download col-12"
                                   viewBox="0 0 16 16">
                                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                              </svg>
                            <?= $catalogue['btn-title']; ?>
                        </span>
                                <a href="<?= $catalogue['catalogue_file']['url'] ?? ''; ?>" download class="mo stretched-link">
                                    <?= $catalogue['link-title']; ?>
                                </a>
                            </div>
                        </label>
                    </div>
                </div>
            <?php
            endforeach;
        endif; ?>
<!--        <div class="col-lg-4 text-primary">--><?php //the_content(); ?><!--</div>-->
<!--        <div class="col-lg-4 text-center">-->
<!--            <div class="download-btn">-->
<!--                <label>-->
<!--                    <input class="check" type="checkbox">-->
<!--                    <div class="dl-btn card card-body">-->
<!--                        <span class="me" href="--><?php //= get_field('catalogue_file')['url'] ?? ''; ?><!--">-->
<!--                              <svg width="100" height="100" fill="currentColor" class="bi bi-download col-12"-->
<!--                                   viewBox="0 0 16 16">-->
<!--                                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>-->
<!--                                  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>-->
<!--                              </svg>-->
<!--                            --><?php //= get_field('btn-title'); ?>
<!--                        </span>-->
<!--                        <a href="--><?php //= get_field('catalogue_file')['url'] ?? ''; ?><!--" download class="mo stretched-link">-->
<!--                            --><?php //= get_field('link-title'); ?>
<!--                        </a>-->
<!--                    </div>-->
<!--                </label>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</section>
<?php get_footer(); ?>
