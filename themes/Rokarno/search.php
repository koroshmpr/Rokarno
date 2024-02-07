<?php get_header(); ?>

<section class="py-5 px-lg-5 min-vh-100">
    <div class="col-lg-8 mx-auto py-3" data-aos="fade-bottom" data-aos-delay="5000">
        <form class="search-form d-flex gap-1 align-items-center" method="get"
              action="<?php echo esc_url(home_url('/')); ?>">
            <div class="input-group">
                <input id="search-form" type="search" name="s"
                       class="form-control text-primary bg-white bg-opacity-10 py-3 rounded-0"
                       placeholder="Search..." value="<?= the_search_query(); ?>" aria-label="Search">
                <button type="submit" class="btn bg-primary text-white d-flex align-items-center rounded-start px-3 z-1"
                        aria-label="Search">
                    <svg  width="20" height="20" fill="currentColor"
                          class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </form>
    </div>

    <div class="d-grid column-gap-3 d-lg-flex align-items-center border-bottom border-2 border-info">
        Results for :
        <div class="overflow-hidden">
            <h1 class="fw-bold text-whie ms-3 pe-1 border-bottom border-2 border-primary py-3 mb-0"
                data-aos="fade-left" data-aos-duration="600"> <?= the_search_query(); ?> </h1>
        </div>
    </div>
    <?php
    $post_type = isset($_GET['post_type']) ? sanitize_text_field($_GET['post_type']) : '';
    // Create a new WP_Query for the current post type (if filter is applied)
    $args = array(
        'post_type' => $post_type ? $post_type : array('post', 'portfolio', 'services'),
        's' => get_search_query(),
    );
    $post_type_query = new WP_Query($args);

    if ($post_type_query->have_posts()) {
        echo '<div class="row m-0 row-cols-lg-2 justify-content-lg-between justify-content-center row-cols-1 pt-4">';

        while ($post_type_query->have_posts()) {
            $post_type_query->the_post();
            $current_post_type = get_post_type();

            if ($current_post_type == 'post') { ?>
                <div class="mb-3 pe-lg-4">
                    <?php get_template_part('template-parts/blog/archive-card'); ?>
                </div>
                <?php
            } elseif ($current_post_type == 'product') {
                get_template_part('template-parts/products/product-card');
            }
        }

        echo '</div>';
    } else {
        echo '<p class="fs-2 pt-5 text-center">Nothing found !</p>';
    }

    wp_reset_postdata(); // Reset the post data
    ?>
</section>

<?php get_footer(); ?>