<aside class="row justify-content-center col-lg-3 col-11 px-lg-4 px-2 order-first order-lg-last mb-5 mb-lg-0">
    <div class="row p-2 pb-1 border border-white border-opacity-25 mt-3 mt-lg-0 justify-content-end" id="category-dropdown">
        <?php
        $current_category_id = get_queried_object_id(); // Get the current category ID

        // Get the current category
        $current_category = get_term($current_category_id, 'product_cat');

        // Get all the ancestors of the current category
        $ancestors = get_ancestors($current_category_id, 'product_cat');

        // Display parent categories
        foreach (array_reverse($ancestors) as $ancestor_id) {
            $ancestor = get_term($ancestor_id, 'product_cat');
            echo '<div class="my-1 col-12 border-end border-5 border-primary border-opacity-75 bg-opacity-75 bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
            echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $ancestor->name . '</h6>';
            echo '</div>';
        }

        // Display the current category
        echo '<div class="my-1 col-11 border-end border-5 border-primary border-opacity-75 bg-opacity-75 bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
        echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $current_category->name . '</h6>';
        echo '</div>';

        // If the current category is a child category, get all sibling categories
        if ($current_category->parent !== 0) {
            $parent_category_id = $current_category->parent;
        } else {
            $parent_category_id = $current_category_id;
        }

        // Get child categories of the parent category
        $child_categories = get_terms(array(
            'taxonomy' => 'product_cat',
            'orderby' => 'name',
            'parent' => $parent_category_id,
            'exclude' => $current_category_id, // Exclude the current category from the list
            'hide_empty' => true,
        ));

        if ($child_categories) {
            foreach ($child_categories as $child_category) {
                echo '<a href="' . esc_url(get_term_link($child_category, $child_category->taxonomy)) . '" class="my-1 col-11 bg-opacity-25 bg-white text-primary d-flex justify-content-between align-items-center p-3 overflow-hidden">';
                echo '<h6 class="category-title fw-bold mb-0 fs-6">' . $child_category->name . '</h6>';
                echo '</a>';
            }
        }
        ?>
    </div>
    <article class="text-primary text-opacity-75 shadow-sm bg-white bg-opacity-10 p-3 mt-3 small border border-white border-opacity-25">
        <?= get_field('shop_description', 'option'); ?>
    </article>
</aside>
