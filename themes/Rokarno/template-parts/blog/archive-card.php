<article class="border border-white border-opacity-25 row px-0 justify-content-between align-items-stretch">
    <img class="col-lg-3 px-0 object-fit img-fluid ratio-1" height="250" src="<?php echo the_post_thumbnail_url(); ?>"
         alt="<?php echo get_the_title(); ?>">
    <div class="col-lg-9 d-flex text-white flex-column justify-content-between p-4">
        <h5><?= get_the_title(); ?></h5>
        <div class="text-justify">
            <?= wp_trim_words(get_the_content(), 25); ?>
        </div>
        <div class="d-flex justify-content-end pt-3 pt-lg-0">
            <div class="col-auto align-items-center d-flex justify-content-between gap-3">
                <a class="btn btn-custom rounded-circle" href="<?php the_permalink(); ?>">
                    <?=  esc_html__('See more', 'rokarno');  ?>
                </a>
            </div>
        </div>
    </div>
</article>