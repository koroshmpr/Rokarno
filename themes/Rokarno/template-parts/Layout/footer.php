<div class="container">
    <div class="row justify-content-lg-between justify-content-center align-items-stretch py-lg-4 pb-4 gap-4 gap-lg-0">
        <div class="col-lg-7 row gy-4 mt-0">
            <div class="d-flex flex-column justify-content-start align-items-lg-start align-content-center">
                <a class="pb-3 text-lg-start text-center" aria-label="logo-footer" href="/">
                    <?php
                    $logoType = get_field('footer_logo_type', 'option');
                    $logoSvg = get_field('footer_logo_svg', 'option');
                    $logoImg = get_field('footer_logo_image', 'option');
                    if ($logoType == 'svg') {
                        echo $logoSvg;
                    }
                    if ($logoType == 'img') { ?>
                        <img height="70" src="<?= $logoImg['url'] ?>" alt="<?= $logoImg['title'] ?>">
                    <?php } ?>
                </a>
                <address class="text-primary text-center text-lg-start text-opacity-75 fs-6">
                    <?= get_field('address', 'option'); ?>
                </address>
                <address class="text-primary text-center text-lg-start text-opacity-75 fs-6">
                    <?= get_field('address_1', 'option'); ?>
                </address>
                <div class="w-100 d-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                    <a class="fs-6" href="mailto:<?= get_field('email', 'option'); ?>">
                        <?= get_field('email', 'option'); ?>
                    </a>
                    <a class="fw-bold fs-5" href="tel:<?= get_field('phone', 'option'); ?>">
                        021-<?= get_field('phone_show', 'option'); ?>
                    </a>
                </div>
                <?php
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations['footerLocationOne']);
                if ($menu) :
                    wp_nav_menu(array(
                        'theme_location' => 'footerLocationOne',
                        'menu_class' => 'list-unstyled d-flex gap-3 justify-content-center justify-content-lg-start align-items-start flex-wrap mt-lg-3',
                        'container' => false,
                        'menu_id' => 'navbarTogglerMenu',
                        'item_class' => 'nav-item ', // Add 'dropdown' class to top-level menu items
                        'link_class' => 'nav-link text-primary px-0', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                        'depth' => 1,
                    ));
                endif;
                ?>
            </div>
            <?php get_template_part('template-parts/social-media'); ?>
        </div>
        <div class="col-lg-4">
            <p class="text-primary text-lg-start text-center py-3">اگه به مشاوره نیاز دارید ما با شما تماس میگیریم</p>
            <div class="bg-white p-4 p-lg-5 shadow-sm">
                <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
            </div>
        </div>

    </div>
</div>