<?php
// ウィジェットの登録
function theme_slug_widgets_init()
{
  register_sidebar(array(
    'name' => 'サイドバー', //ウィジェットの名前を入力
    'id' => 'sidebar', //ウィジェットに付けるid名を入力
  ));
}
add_action('widgets_init', 'theme_slug_widgets_init');

// メニューのカスタマイズ
function menu_setup()
{
  register_nav_menus(array(
    'global-menu' => 'グローバル・メニュー',
    'sub-menu' => 'サブ・メニュー',
    'site-map' => 'サイト・マップ',
    'hamburger-menu' => 'ハンバーガー・メニュー',
    'about' => '病院案内',
    'consultation' => '受診案内',
    'departments' => '診療科・部門',
  ));
}
add_action('after_setup_theme', 'menu_setup');

// アイキャッチ画像
add_theme_support('post-thumbnails');

// JS読み込み
function my_script() {
  wp_enqueue_script(
    'myscript',
    get_template_directory_uri().'/js/behavior.js',
    array(),
    false,
    true
  );
}
add_action('wp_enqueue_scripts', 'my_script');

// post_has_archive()関数の定義
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true;
    // $args['label'] = 'archive';
    // 任意のスラッグ名を登録←アーカイブページが有効になる。
    $args['has_archive'] = 'archive';
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// body要素へbody_class();タグは必須。
// スラッグでクラス名を付けてくれる。
// js、sassのことを考えたら必須。
add_filter('body_class', 'add_page_slug_class_name');
function add_page_slug_class_name($classes)
{
  if (is_page()) {
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;
  }
  return $classes;
}