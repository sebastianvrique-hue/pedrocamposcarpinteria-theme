<?php
function pedrocampos_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'pedrocampos_setup' );

function pedrocampos_scripts() {
    wp_enqueue_style(
        'pedrocampos-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;1,600&family=Work+Sans:wght@400;500;600&display=swap',
        array(),
        null
    );
    wp_enqueue_style( 'pedrocampos-style', get_stylesheet_uri(), array( 'pedrocampos-fonts' ), '2.0' );
    wp_enqueue_script( 'pedrocampos-main', get_template_directory_uri() . '/js/main.js', array(), '2.0', true );
}
add_action( 'wp_enqueue_scripts', 'pedrocampos_scripts' );
