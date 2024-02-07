<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="keywords" content="<?= get_bloginfo('name'); ?>">
    <meta name="description" content="<?= get_bloginfo('description'); ?>">
    <meta name="author" content="<?= get_bloginfo('author'); ?>">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>

<body <?php body_class('page-transition'); ?> >
<div id="cursor"></div>
<div id="stalker"></div>
<header id="mainHeader" class="text-white z-2">
<?php get_template_part('template-parts/Layout/header');

if (!is_shop() && !is_category() && !is_product_category() && !is_singular(array('product', 'post'))) {
    get_template_part('template-parts/preload/preload-fa');
}
?>

</header>
<main class="min-vh-100 bg-secondary">




