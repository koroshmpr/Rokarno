<?php /* Template Name: Home */
get_header(); ?>

<?php if (have_posts()) {
    the_post(); ?>

    <?php
    get_template_part('template-parts/homepage/hero_slider');
}
get_footer();
