<?php get_header(); ?>
<?php global $cur_lan; ?>
<section class="py-5 px-lg-5 min-vh-100">
    <div class="col-lg-8 col-11 mx-auto py-3" data-aos="fade-bottom" data-aos-delay="5000">
        <form class="search-form d-flex gap-1 align-items-center" method="get"
              action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input id="search-form" type="search" name="s"
                       class="form-control text-primary bg-white bg-opacity-10 py-3 rounded-0"
                       placeholder="<?= esc_html__('Search...', 'rokarno'); ?>" value="<?= get_search_query(); ?>" aria-label="Search">
                <button type="submit" class="btn bg-primary text-white d-flex align-items-center rounded-<?= $cur_lan == 'en' ? 'start' : 'end';?> px-3 z-1"
                        aria-label="Search">
                    <svg  width="20" height="20" fill="currentColor"
                          class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>
    <div class="d-grid col-11 column-gap-3 d-lg-flex align-items-center border-bottom border-2 border-info">
        <p class="text-white mb-0 text-opacity-75"><?= esc_html__('Results for :', 'rokarno'); ?></p>
        <div class="overflow-hidden">
            <h1 class="fw-bold text-primary ms-3 pe-1 border-bottom border-2 border-primary py-3 mb-0"
                data-aos="fade-left" data-aos-duration="600"> <?= get_search_query(); ?> </h1>
        </div>
    </div>
    <?php
    $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    // Create a new WP_Query for the current post type (if filter is applied)
    $args = array(
        'post_type'      => $post_type ? $post_type : array('portfolio', 'services', 'product'),
        's'              => get_search_query(),
        'paged'          => $paged,
        'posts_per_page' => 12, // Number of posts per page
    );
    $post_type_query = new WP_Query($args);

    if ($post_type_query->have_posts()) {
        echo '<div class="container row mx-auto row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 justify-content-lg-start justify-content-center pt-5">';

        while ($post_type_query->have_posts()) {
            $post_type_query->the_post();
            $current_post_type = get_post_type();

            if ($current_post_type == 'post') { ?>
                <div class="mb-3 pe-lg-4">
                    <?php get_template_part('template-parts/blog/archive-card'); ?>
                </div>
            <?php } elseif ($current_post_type == 'product') { ?>
                <article class="px-2 pb-5" data-aos="zoom-in" data-aos-delay="<?= $i; ?>0">
                    <?php get_template_part('template-parts/products/product-card'); ?>
                </article>
            <?php }
        }

        echo '</div>';

        // Display pagination links
        if ($post_type_query->max_num_pages > 1) {
            echo '<div class="pagination mt-4">';
            echo paginate_links(array(
                'total'   => $post_type_query->max_num_pages,
                'current' => max(1, $paged),
            ));
            echo '</div>';
        }
    } else { ?>
        <p class="fs-2 pt-5 text-center"><?= esc_html__('Nothing found!', 'rokarno'); ?></p>
    <?php }

    wp_reset_postdata(); // Reset the post data
    ?>
</section>
<style>
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination a {
        padding: 6px 12px;
        margin: 0 4px;
        border: 1px solid #ddd;
        border-radius: 4px;
        color: #333;
        text-decoration: none;
        background-color: #f5f5f5;
    }

    .pagination a:hover {
        background-color: #e9ecef;
    }

    .pagination .current {
        border-radius: 4px;
        background-color: var(--bs-primary);
        color: #fff;
        border-color: #007bff;
        padding: 6px 12px;
    }
</style>
<?php get_footer(); ?>
