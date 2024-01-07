<div class="w-100 d-flex align-items-center justify-content-center gap-4 <?= $args['padding'] ?? 'pb-5 pb-lg-0'; ?>">
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