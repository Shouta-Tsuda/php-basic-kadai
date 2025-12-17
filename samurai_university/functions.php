<?php

// 登録済みのjQueryを解除して、登録し直す
function remove_default_jquery()
{
    // 管理画面でないなら
    if (!is_admin()) {
        wp_deregister_script('jquery');

        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.2.1.min.js', array(), 3.2, true);
        wp_enqueue_script('popper_js', get_template_directory_uri() . '/styles/bootstrap4/popper.js', array(), 4.0, true);
        wp_enqueue_script('bootstrap4_js', get_template_directory_uri() . '/styles/bootstrap4/bootstrap.min.js', array(), 4.0, true);
    }
}

// テーマのCSSを読み込む
// function my_theme_styles() {
//     wp_enqueue_style('my-style', get_stylesheet_uri());
// }
// add_action('wp_enqueue_scripts', 'my_theme_styles');

// function my_theme_styles(){
//     //  テーマ直下の style.css を読み込む
//     wp_enqueue_style('my_style', get_template_directory_uri() );
//     // wp_enqueue_style('style_css', get_template_directory_uri() . '/style.css');
//     // wp_enqueue_style('bootstrap', get_template_directory_uri() . '/styles/bootstrap4/bootstrap.min.css');
//     // wp_enqueue_style('font_awesome', get_template_directory_uri() . '/plugins/font-awesome-4.7.0/css/font-awesome.min.css');
// }

// add_action('wp_enqueue_scripts', 'remove_default_jquery','my_theme_styles');
