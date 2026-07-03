<?php
function pedrocampos_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'pedrocampos_setup' );

function pedrocampos_scripts() {
    wp_enqueue_style( 'pedrocampos-style', get_stylesheet_uri(), array(), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'pedrocampos_scripts' );
