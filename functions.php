<?php

add_theme_support('post-thumbnails');

function cadastrar_post_type_imoveis() {
    $nomeSingular = 'Imóvel';
    $nomePlural = 'Imóveis';
    $description = 'Imóveis da imobiliária Malura';

    $supports = array(
        'title',
        'editor',
        'thumbnail'
    );

    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'view_item' => 'Ver ' . $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'new_item' => 'Novo ' . $nomeSingular,
        'add_new_item' => 'Adicionar novo ' . $nomeSingular 
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'description' => $description,
        'menu_icon' => 'dashicons-admin-home',
        'supports' => $supports
    );

    register_post_type( 'imovel', $args );
}

add_action( 'init' , 'cadastrar_post_type_imoveis' );

function registrar_menu_navegacao() {
    register_nav_menu('header-menu', 'main-menu');
}

add_action( 'init', 'registrar_menu_navegacao' );

function gerarTitulo() {
    bloginfo('name');
    if (!is_home()) echo ' | ';
    the_title(); 
}

function cadastrar_tanoximia_localizacoes(){
    
    $nomeSingular = 'Localização';
    $nomePlural = 'Localizações';

    $labels = array(
        'name' => $nomePlural,
        'singular_name' => $nomeSingular,
        'edit_item' => 'Editar ' . $nomeSingular,
        'add_new_item'  => 'Adicionar nova ' . $nomeSingular
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => true
    );

    register_taxonomy('localizacoes', 'imovel', $args );
}

add_action('init', 'cadastrar_tanoximia_localizacoes');