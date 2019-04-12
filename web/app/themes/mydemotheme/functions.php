<?php

//echo WP_ENV; die();
$books = new custom_post_type\cpt('books');
//require_once('register_style_script.php');

// create a genre taxonomy
$books->register_taxonomy('genre');
// define the columns to appear on the admin edit screen
$books->columns(array(
    'cb' => '<input type="checkbox" />',
    'title' => __('Title'),
    'genre' => __('Genres'),
    'price' => __('Price'),
    'rating' => __('Rating'),
    'date' => __('Date')
));
// use "pages" icon for post type
$books->menu_icon("dashicons-book-alt");

require_once get_template_directory() . '/inc/template-functions.php';

require_once get_template_directory() . '/inc/register_style_script.php';

