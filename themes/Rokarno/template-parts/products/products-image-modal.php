<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal">
    Launch demo modal
</button>
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="productTab" role="tablist">
                    <?php
                    $uncategorized_category = get_term_by('slug', 'uncategorized', 'product_cat');
                    $excluded_category_id = $uncategorized_category ? $uncategorized_category->term_id : null;
                    $parent_categories = get_categories(array(
                        'taxonomy' => 'product_cat',
                        'orderby' => 'name',
                        'pad_counts' => false,
                        'hierarchical' => 1,
                        'hide_empty' => false,
                        'exclude' => $excluded_category_id,
                        'parent' => 0
                    ));

                    if ($parent_categories) {
                        foreach ($parent_categories as $key => $parent_cat) {
                            $category_icon = get_term_meta($parent_cat->term_id, 'category-icon', true);
                            ?>
                            <li class="nav-pills text-center" role="presentation">
                                <button class="nav-link <?= $key == 0 ? 'active' : ''; ?>" id="tab-<?= $key; ?>"
                                        data-bs-toggle="tab"
                                        data-bs-target="#tab-pane-<?= $key; ?>" type="button" role="tab"
                                        aria-controls="tab-pane-<?= $key; ?>"
                                        aria-selected="<?= $key == 0 ? 'true' : 'false'; ?>">
                                    <?= $parent_cat->name; ?>
                                </button>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content" id="productTabContent">
                    <?php
                    if ($parent_categories) {
                        foreach ($parent_categories as $key => $parent_cat) {
                            ?>
                            <div class="tab-pane fade <?= $key == 0 ? 'show active' : ''; ?>"
                                 id="tab-pane-<?= $key; ?>" role="tabpanel" aria-labelledby="tab-<?= $key; ?>"
                                 tabindex="0">
                                <div class="container">
                                    <div class="d-flex p-3 justify-content-start">
                                        <?php
                                        // Display products of the current category
                                        $products = new WP_Query(array(
                                            'post_type' => 'product',
                                            'posts_per_page' => -1,
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'product_cat',
                                                    'field' => 'term_id',
                                                    'terms' => $parent_cat->term_id,
                                                ),
                                            ),
                                        ));
                                        global $product;
                                        if ($products->have_posts()) {
                                            while ($products->have_posts()) {
                                                $products->the_post();
                                                $gallery_image_ids = $product->get_gallery_image_ids();
                                                if (!empty($gallery_image_ids)) {
                                                    $first_gallery_image_id = $gallery_image_ids[0];
                                                    $first_gallery_image_url = wp_get_attachment_url($first_gallery_image_id);
                                                    ?>
                                                    <img width="100" src="<?php echo $first_gallery_image_url; ?>"
                                                         alt="<?php the_title(); ?>" class="img-thumbnail">
                                                    <?php
                                                }
                                            }
                                            wp_reset_postdata();
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>