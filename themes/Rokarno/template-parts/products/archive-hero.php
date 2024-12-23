<div class="row">
    <div class="col-lg-12 mx-0 swiper product_image_swiper px-0">
        <div class="swiper-wrapper">
            <?php
            $category = get_queried_object();
            $category_id = $category->term_id;
            $categoryImages = get_field('images', 'product_cat_' . $category_id);
            if ($categoryImages) {
                $images = get_field('images', 'product_cat_' . $category_id);
            }
            if (!$categoryImages) {
                $images = get_field('images', 'options');
            }
            foreach ($images as $image): ?>
                <div class="swiper-slide">
                    <?php $image = $image['image']; ?>
                    <?php $imageMobile = $image['image_mobile']; ?>
                    <img class="w-100 object-fit-cover <?= $imageMobile ? 'd-none d-lg-block' : ''; ?>"
                         src="<?= $image['url']; ?>" alt="<?= $image['title']; ?>" style="height: 600px"/>
                    <?php if ($imageMobile) { ?>
                        <img class="w-100 object-fit-cover h-auto d-lg-none" src="<?= $imageMobile['url']; ?>"
                             alt="<?= $imageMobile['title']; ?>"/>
                    <?php } ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination text-white"></div>
    </div>
</div>