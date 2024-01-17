<?php
global $product;

// Ensure $product is valid
if (!$product || !is_a($product, 'WC_Product')) {
    return;
}
$image = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'single-post-thumbnail');
?>
<div class="product_card d-flex flex-column justify-content-center gap-lg-2 gap-1 h-auto bg-dark bg-opacity-10 p-1 p-lg-3">
    <img src="<?= $image ? $image[0] : ''; ?>" alt="<?= $product->get_title(); ?>"
         class="mx-auto object-fit col-8 mt-lg-n5 mt-n3 ratio-1x1" width="100" height="100">
    <div class="d-flex flex-column justify-content-between align-items-center">
        <p class="card-title text-white fs-5 mt-3">
            <?= esc_html($product->get_title()); ?>
        </p>
<!--            <a href="--><?php //= esc_url($product->get_permalink()); ?><!--"-->
<!--               class="stretched-link btn btn-custom text-white fs-6 fw-bold">MORE</a>    -->
<!--        <button class="stretched-link btn btn-custom text-white fs-6 fw-bold">MORE</button>-->

    </div>
</div>