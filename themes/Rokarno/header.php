<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    $focus_keyword = get_post_meta(get_the_ID(), 'rank_math_focus_keyword', true);
    ?>
    <meta name="keywords" content="<?= $focus_keyword ??  get_bloginfo('name'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-000GSZCEHJ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-000GSZCEHJ');
    </script>
</head>

<body <?php body_class('page-transition'); ?> >
<div id="cursor"></div>
<div id="stalker"></div>
<header id="mainHeader" class="text-white z-2">
<?php get_template_part('template-parts/Layout/header');

if (!is_404() && !is_search() && !is_shop() && !is_category() && !is_product_category() && !is_singular(array('product', 'post'))) {
    get_template_part('template-parts/preload/preload-fa');
}
?>
<?php get_template_part('template-parts/search-form'); ?>
</header>
<main class="min-vh-100 bg-secondary">




