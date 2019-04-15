<?php
$options = array('supports'=> array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'));

$gallery = new custom_post_type\cpt('gallery',$options);

//require_once('register_style_script.php');
$gallery->capability_type =  array('psp_project',$gallery->post_type_name);
$gallery->map_meta_cap =  true;

// create a genre taxonomy
$gallery->register_taxonomy('gallery-category');
// define the columns to appear on the admin edit screen
$gallery->columns(array(
    'cb' => '<input type="checkbox" />',
    'title' => __('Title'),
    'date' => __('Date')
));
// use "pages" icon for post type
$gallery->menu_icon("dashicons-book-alt");

require_once get_template_directory() . '/inc/template-functions.php';

require_once get_template_directory() . '/inc/register_style_script.php';

require_once get_template_directory() . '/inc/gallery-metabox.php';
require_once get_template_directory() . '/inc/barebones-config.php';

