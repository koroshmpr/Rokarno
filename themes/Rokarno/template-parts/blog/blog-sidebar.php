<div class="col-lg-3 px-4 ps-lg-3 pe-lg-0 pt-4 pt-lg-0">
    <!--    search form-->
    <?php get_template_part('template-parts/blog/blog-search-form'); ?>
    <!--    archive posts by date-->
    <div class="py-4">
        <h4 class="py-3 text-primary"><a href="<?= esc_url(get_post_type_archive_link('post')); ?>">
                <?=  esc_html__('Archive', 'rokarno'); ?>
            </a></h4>
        <?php
        global $post;

        $posts = get_posts(array(
            'post_type' => 'post',
            'nopaging' => true,
            'orderby' => 'date',
            'order' => 'DESC',
        ));

        $_year_mon = '';   // previous year-month value
        $_has_grp = false; // TRUE if a group was opened
        echo '<div class="year row">';
        $current_page_date = get_the_date('F , Y'); // Get the current page date

        foreach ($posts as $post) {
            setup_postdata($post);

            $time = strtotime($post->post_date);
            $showDate = get_the_date('F , Y');
            $year = date('Y', $time);
            $mon = date('F', $time);
            $year_mon = "$year-$mon";

            // Open a new group.
            if ($year_mon !== $_year_mon) {
                // Close previous group, if any.
                $_has_grp = true;

                // Check if the current date matches the loop date
                $link_class = ($current_page_date === $showDate) ? 'text-dark text-opacity-75 border-bottom border-info py-2 date-category active' : 'text-dark text-opacity-75 border-bottom border-info py-2 date-category';
                echo '<a class="' . $link_class . '" href="' . get_month_link($year, date('m', $time)) . '">';
                echo "$showDate";
                echo '</a>';
            }
            $_year_mon = $year_mon;
        }

        // Close the last group, if any.
        if ($_has_grp) {
            echo '</div>';
        }
        wp_reset_postdata();
        ?>
    </div>
    <!--    most visited post -->
    <div class="row gap-2 mt-3 justify-content-center">
        <h4 class="fw-bold">
            <?=  esc_html__('News', 'rokarno'); ?>
        </h4>
        <div class="row justify-content-center gap-3">
            <?php
            $args2 = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'order' => 'DESC',
                'posts_per_page' => '2',
                'ignore_sticky_posts' => true
            );
            $loop2 = new WP_Query($args2);
            if ($loop2->have_posts()) :
                $i = 0;
                /* Start the Loop */
                ?>
                <?php while ($loop2->have_posts()) :
                $loop2->the_post(); ?>
                <article class="border border-white border-opacity-25 row px-0 justify-content-between align-items-stretch">
                    <img class="col-3 px-0 object-fit img-fluid ratio-1" height="250"
                         src="<?php echo the_post_thumbnail_url(); ?>"
                         alt="<?php echo get_the_title(); ?>">
                    <div class="col-9 d-flex flex-column justify-content-center p-2">
                        <div class="d-flex justify-content-between align-items-center pt-3 pt-lg-0">
                            <div class="text-primary fw-bold small text-center">
                                <?= get_the_title(); ?>
                            </div>
                            <div>
                                <a class="btn btn-custom rounded-circle" href="<?php the_permalink(); ?>">
                                    <?=  esc_html__('See More', 'rokarno');  ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php
            endwhile;
            endif;
            wp_reset_postdata(); ?>
        </div>
    </div>
    <!--    social media-->
    <div>
        <h6 class="py-4 text-center text-primary">
            <?=  esc_html__('Follow us on social Networks', 'rokarno'); ?>
        </h6>
        <div class="w-100 d-flex align-items-center justify-content-center gap-3 pb-5 pb-lg-0">
            <?php
            if (have_rows('social', 'option')):
                // Loop through rows.
                while (have_rows('social', 'option')) : the_row(); ?>
                    <a class="social-icon" aria-label="<?= get_sub_field('name', 'option'); ?>"
                       href="<?= get_sub_field('link', 'option')['url']; ?>">
                        <?= get_sub_field('icon', 'option'); ?>
                    </a>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
</div>
