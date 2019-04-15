<?php

//echo WP_ENV; die();
$gallery = new custom_post_type\cpt('gallery');
$gallery->capability_type =  array('psp_project',$gallery->post_type_name);
$gallery->map_meta_cap =  true;
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

function psp_add_project_management_role() {
 add_role('psp_project_manager',
            'Gallery Manager',
            array(
                'read' => true,
                'edit_posts' => false,
                'delete_posts' => false,
                'publish_posts' => false,
                'upload_files' => true,
            )
        );
   }
add_action('admin_init','psp_add_project_management_role',998);
add_action('admin_init','psp_add_role_caps',999);
function psp_add_role_caps() {
		// Add the roles you'd like to administer the custom post types
		$roles = array('psp_project_manager','administrator');
		// Loop through each role and assign capabilities
		foreach($roles as $the_role) { 
			 global $role;
				$role = get_role($the_role);
	             $role->add_cap( 'read' );
	             $role->add_cap( 'read_gallery');
	             $role->add_cap( 'read_private_gallery' );
	             $role->add_cap( 'edit_gallery' );
	             $role->add_cap( 'edit_gallery' );
	             $role->add_cap( 'edit_gallery' );
	             $role->add_cap( 'edit_published_gallery' );
	             $role->add_cap( 'publish_gallery' );
	             $role->add_cap( 'delete_others_gallery' );
	             $role->add_cap( 'delete_private_gallery' );
	             $role->add_cap( 'delete_published_gallery' );
		}
}

function posts_for_current_author($query) {
    global $pagenow;
    if( 'edit.php' != $pagenow || !$query->is_admin )
    return $query;

  global $user_ID;
  $user = get_user_by('ID',$user_ID);
 
  if( isset($_REQUEST['post_type']) && $_REQUEST['post_type'] == 'gallery' &&  in_array("psp_project_manager",$user->roles) ) {

        $query->set('author', $user_ID );
    }
    return $query;
}
add_filter('pre_get_posts', 'posts_for_current_author');