<?php
/** Template Name: download */
get_header(); ?>
<section class="container py-5 min-vh-100">
    <div class="row gap-lg-5 align-items-center">
        <div class="col-lg-5 text-primary"><?php the_content(); ?></div>
        <div class="col-lg-4 text-center">
            <div class="download-btn">
                <label>
                    <input class="check" type="checkbox">
                    <div class="dl-btn card card-body">
                        <span class="me" href="<?= get_field('catalogue_file')['url'] ?? ''; ?>">
                              <svg width="100" height="100" fill="currentColor" class="bi bi-download col-12" viewBox="0 0 16 16">
                                  <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                                  <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
                              </svg>
                            Click to Download
                        </span>
                        <a href="<?= get_field('catalogue_file')['url'] ?? ''; ?>" download class="mo stretched-link">Preparing File ...</a>
                    </div>
                </label>
            </div>
<!--            <a class="text-primary shadow p-4 border border-2 border-primary border-opacity-50 text-center" href="--><?php //= get_field('catalogue_file')['url'] ?? ''; ?><!--" download>-->
<!--                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">-->
<!--                    <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>-->
<!--                    <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>-->
<!--                </svg>-->
<!--            </a>-->
        </div>
    </div>

</section>
<?php get_footer(); ?>
