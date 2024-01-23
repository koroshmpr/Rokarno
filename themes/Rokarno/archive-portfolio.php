<?php
/** Template Name: portfolio archive */

get_header(); ?>
    <div class="container py-5">

        <?php
        $args = array(
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'order' => 'DESC',
            'posts_per_page' => '-1',
            'ignore_sticky_posts' => true
        );
        $loop = new WP_Query($args);
        if ($loop->have_posts()) :
        $i = 0;
        /* Start the Loop */
        ?>
        <div class="row row-cols-md-2 row-cols-1 gy-3 py-5 overflow-hidden">
            <?php while ($loop->have_posts()) :
                $loop->the_post(); ?>
                <div data-aos="fade-<?= $i % 2 == 0 ? 'right' : 'left'; ?>">
                    <img class="object-fit img-fluid ratio-1x1" height="250" src="<?php echo esc_url(the_post_thumbnail_url()); ?>"
                         alt="<?php echo get_the_title(); ?>">
                    <h5 class="p-3 bg-white fw-bold bg-opacity-25 text-primary d-flex align-items-center gap-2">
                        <svg  width="17" height="17" fill="currentColor" class="bi bi-square-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2z"/>
                        </svg>
                        <?= get_the_title(); ?></h5>
                </div>
                <?php
                $i++;
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
<?php get_footer(); ?>