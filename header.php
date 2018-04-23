<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php $home = get_template_directory_uri(); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        <?php gerarTitulo(); ?>
    </title>

    <!-- <link rel="stylesheet" type="text/css" href="<?php #bloginfo('stylesheet_url') ?>" /> -->
    
    <link rel="stylesheet" type="text/css" href="<?= $home ?>/assets/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="<?= $home ?>/assets/css/header.css" />
    <link rel="stylesheet" type="text/css" href="<?= $home ?>/assets/css/comum.css" />

    <?php if( is_home() ) { ?>
    <link rel="stylesheet" type="text/css" href="<?= $home ?>/assets/css/index.css" />
    <?php } ?>

    <?php if( is_page() ) { ?>
    <link rel="stylesheet" type="text/css" href="<?= $home ?>/assets/css/page.css" />
    <?php } ?>

    <?php if( is_single() ) { ?>
    <link rel="stylesheet" type="text/css" href="<?= $home ?>/assets/css/single.css" />
    <?php } ?>

    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="container">
            <?php
                $args = array(
                    'theme_location' => 'header-menu'
                );
                wp_nav_menu( $args );
            ?>
        </div>
    </header>