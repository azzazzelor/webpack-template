<?php
/**
 * Функции шаблона (function.php)
 */

add_theme_support('title-tag'); // теперь тайтл управляется самим вп

register_nav_menus(array( // Регистрируем 2 меню
	'top' => 'Верхнее', // Верхнее
	'bottom' => 'Внизу' // Внизу
));

add_theme_support('post-thumbnails'); // включаем поддержку миниатюр
set_post_thumbnail_size(250, 150); // задаем размер миниатюрам 250x150
add_image_size('big-thumb', 400, 400, true); // добавляем еще один размер картинкам 400x400 с обрезкой


add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_scripts() { // добавление скриптов
	    if(is_admin()) return false; // если мы в админке - ничего не делаем

	    wp_enqueue_script( 'wp-api' );//включить веб апи
	    
	    wp_enqueue_script('bundle', get_template_directory_uri().'/js/bundle.js','','',true); // и скрипты шаблона
	}
}

add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
	function add_styles() { // добавление стилей
	    if(is_admin()) return false; // если мы в админке - ничего не делаем
	    
		wp_enqueue_style( 'default', get_template_directory_uri().'/style.css' ); // основные стили шаблона
		//wp_enqueue_style( 'debundlefault', get_template_directory_uri().'/css/bundle.css' ); // основные стили шаблона
	}
}

//прячем отображение меню на лицевой стороне сайта
add_filter('show_admin_bar', '__return_false');