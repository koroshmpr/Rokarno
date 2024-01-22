<?php
// portfolio
function portfolio_post_types()
{
    register_post_type('portfolio',
        array('supports' =>
            array('title', 'editor', 'comments', 'excerpt', 'custom-fields', 'thumbnail'),
            'rewrite' => array('slug' => 'portfolios'),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'نمونه کار',
                'add_new' => 'افزودن نمونه کار جدید',
                'add_new_item' => 'افزودن نمونه کار جدید',
                'edit_item' => 'ویرایش نمونه کار',
                'all_items' => 'همه ی نمونه کارها',
                'singular_name' => 'نمونه کار'),
            'menu_icon' => 'dashicons-portfolio'
        ));
    register_taxonomy(
        'portfolio_categories',
        'portfolio',
        array('hierarchical' => true,
            'label' => 'دسته بندی نمونه کار',
            'query_var' => true,
        )
    );
    $labels = array('name' => _x('Tags', 'taxonomy general name'),
        'singular_name' => _x('Tag', 'taxonomy singular name'),
        'search_items' => __('Search Tags'),
        'popular_items' => __('Popular Tags'),
        'all_items' => __('All Tags'),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __('Edit Tag'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag Name'),
        'separate_items_with_commas' => __('Separate tags with commas'),
        'add_or_remove_items' => __('Add or remove tags'),
        'choose_from_most_used' => __('Choose from the most used tags'),
        'menu_name' => __('برچسب نمونه کار'),);
    register_taxonomy('portfolio_tag', 'portfolio',
        array('hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'update_count_callback' =>
                '_update_post_term_count',
            'query_var' => true,
            'rewrite' => array('slug' => 'tag-portfolio'),
        ));
}

add_action('init', 'portfolio_post_types');