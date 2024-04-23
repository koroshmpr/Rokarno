<?php
function register_new_search()
{
    register_rest_route('search/v1', 'search', array(
        'methods' => WP_REST_Server::READABLE,
        'callback' => 'GoldSearchResults'
    ));
}
function GoldSearchResults($data)
{
    $term = sanitize_text_field($data['term']);

    // Main query for searching in post title and content
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'project', 'product'),
        's' => $term,
    ));

    // Results array
    $mainResults = array(
        'post' => array(),
        'project' => array(),
        'product' => array(),
    );

    while ($mainQuery->have_posts()) {
        $mainQuery->the_post();
//        if (get_post_type() == 'post') {
//            array_push($mainResults['blog'], array(
//                'title' => get_the_title(),
//                'url' => get_the_permalink(),
//                'img' => get_the_post_thumbnail_url(),
//            ));
//        }
        global $product;
        if (get_post_type() == 'product') {
            array_push($mainResults['product'], array(
                'title' => get_the_title(),
                'url' => get_the_permalink(),
                'img' => get_the_post_thumbnail_url(0, ''),
                'content' => get_the_content(),
                'price' => $product->get_regular_price()

            ));
        }

    }
    // Reset post data
    wp_reset_postdata();

    // Return main results
    return $mainResults;
}
add_action('rest_api_init', 'register_new_search');