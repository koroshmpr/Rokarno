<aside class="row justify-content-center col-lg-3 col-11 px-lg-4 px-2 order-first order-lg-last mb-5 mb-lg-0">
    <div class="row p-2 pb-1 border border-white border-opacity-25 mt-3 mt-lg-0 justify-content-end" id="category-dropdown">
        <?php
        $categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'parent' => 0, // Get only parent categories
            'hide_empty' => true,
        ));

        $current_category_id = get_queried_object_id(); // Get the current category ID

        if ($categories) {
            foreach ($categories as $category) {
                $category_class = ($category->term_id === $current_category_id) ? 'border-end border-5 border-primary border-opacity-75 bg-opacity-75' : 'bg-opacity-25'; // Add class for the current category

                // Determine if the current category is the current one
                $is_current_category = ($category->term_id === $current_category_id);

                echo ($is_current_category) ? '<div' : '<a';
                echo ($is_current_category) ? '' : ' href="' . esc_url(get_term_link($category, $category->taxonomy)) . '"';
                echo ' class="my-1 ' . $category_class . ' bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
                echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $category->name . '</h6>';
                echo ($is_current_category) ? '</div>' : '</a>';

                // Get child categories
                $children = get_terms(array(
                    'taxonomy' => 'product_cat',
                    'orderby' => 'name',
                    'parent' => $category->term_id, // Get child categories for the current parent
                    'hide_empty' => false,
                ));

                if ($children) {
                    foreach ($children as $subcat) {
                        $subcat_class = ($subcat->term_id === $current_category_id) ? 'border-end border-5 border-primary border-opacity-75 bg-opacity-75' : 'bg-opacity-25'; // Add class for the current subcategory

                        // Determine if the current subcategory is the current one
                        $is_current_subcategory = ($subcat->term_id === $current_category_id);

                        echo ($is_current_subcategory) ? '<div' : '<a';
                        echo ($is_current_subcategory) ? '' : ' href="' . esc_url(get_term_link($subcat, $subcat->taxonomy)) . '"';
                        echo ' class="my-1 col-11 ' . $subcat_class . ' bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
                        echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $subcat->name . '</h6>';
                        echo ($is_current_subcategory) ? '</div>' : '</a>';

                        wp_reset_postdata(); // Reset Query for child categories
                    }
                }
            }
        }
        ?>
    </div>
    <article class="text-primary text-opacity-75 shadow-sm bg-white bg-opacity-10 p-3 mt-3 small border border-white border-opacity-25">
        <?= get_field('shop_description' , 'option'); ?>
    </article>
</aside>
