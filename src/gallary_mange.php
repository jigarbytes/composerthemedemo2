<?php  

namespace wp_demo_gallary_manage;
class wp_gallary {
	
	public function __construct( ) {
		 add_shortcode( 'gallery_manage', array($this,'wp_demo_gallary_manage_fun'));
	}
	 
	public function wp_demo_gallary_manage_fun(){
		$data = array();
		return $this->get_template_html('gallery_add',$data);
	}
	
	
	private function get_template_html( $template_name, $attributes = null ) {
		if ( ! $attributes ) {
			$attributes = array();
		}
		ob_start();
		//do_action( 'finale_inventory_before_' . $template_name );
		require( __DIR__  . '/templates/' . $template_name . '.php');
		//do_action( 'finale_inventory_after_' . $template_name );
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}
	 
}

?>