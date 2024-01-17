<nav class="d-none d-lg-grid gap-4 justify-content-center" data-aos="fade-right" data-aos-duration="700"
     data-aos-delay="200" id="mobileMenu">
    <a class="navbar-brand m-0 text-center" href="https://macanagency.ir/rokarno">
        <?php
        $logoType = get_field('logo_type', 'option');
        $logoSvg = get_field('site_logo_svg', 'option');
        $logoImg = get_field('site_logo_image', 'option');
        if ($logoType == 'svg') {
            echo $logoSvg;
        }
        if ($logoType == 'img') { ?>
            <img class="img-fluid" width="113" height="156" src="<?= $logoImg['url'] ?>" alt="<?= $logoImg['title'] ?>">
        <?php } ?>
    </a>
    <?php
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
    if ($menu) :
        wp_nav_menu(array(
            'theme_location' => 'headerMenuLocation',
            'menu_class' => 'desktop-menu px-3 row navbar-nav gap-1 align-items-center justify-items-center',
            'container' => false,
            'menu_id' => 'navbarTogglerMenu',
            'item_class' => 'nav-item', // Add 'dropdown' class to top-level menu items
            'link_class' => 'nav-link p-0 pb-1 fs-6', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
            'depth' => 1,
        ));
    endif;
    ?>
</nav>
<nav class="d-lg-none navbar py-0">
    <button class="btn p-0 border-0 text-white" type="button" aria-labelledby="offcanvasRight" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list-nested"
             viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M4.5 11.5A.5.5 0 0 1 5 11h10a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m-2-4A.5.5 0 0 1 1 3h10a.5.5 0 0 1 0 1H1a.5.5 0 0 1-.5-.5"/>
        </svg>
    </button>
    <div class="offcanvas offcanvas-bottom bg-secondary" tabindex="-1" id="offcanvasRight"
         aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title mx-auto ps-4"
                id="offcanvasRightLabel"><?php get_template_part('template-parts/logo_brand'); ?></h5>
            <button type="button" class="btn-close bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-between align-items-center pt-5">
            <?php
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations['headerMenuLocation']);
            if ($menu) :
                wp_nav_menu(array(
                    'theme_location' => 'headerMenuLocation',
                    'menu_class' => 'px-0 navbar-nav gap-2 align-items-center flex-wrap',
                    'container' => false,
                    'menu_id' => 'navbarHomeMenu',
                    'item_class' => 'nav-item ', // Add 'dropdown' class to top-level menu items
                    'link_class' => 'nav-link text-white fs-3', // Add 'nav-link' and 'dropdown-toggle' classes to menu item links
                    'depth' => 2,
                ));
            endif;
            ?>
            <a class="navbar-brand m-0 col-2 text-center" href="/">
                <?php
                $logoType = get_field('logo_type', 'option');
                $logoSvg = get_field('site_logo_svg', 'option');
                $logoImg = get_field('site_logo_image', 'option');
                if ($logoType == 'svg') {
                    echo $logoSvg;
                }
                if ($logoType == 'img') { ?>
                    <img class="img-fluid" width="57" height="78" src="<?= $logoImg['url'] ?>" alt="<?= $logoImg['title'] ?>">
                <?php } ?>
            </a>
        </div>
    </div>
</nav>
