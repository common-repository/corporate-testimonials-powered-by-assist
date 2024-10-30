<?php
/*
Plugin Name: Corporate Portfolio powered by ASSIST
Plugin URI: https://assist-software.net/
Description: Plugin for displaying Testimonials and Team
Author: Assist
Version: 1.0
Author URI: https://assist-software.net/
*/

if(!defined('capwp_plugin_dir')) {
  define('capwp_plugin_dir', plugin_dir_path( __FILE__ ));
}

if(!defined('capwp_plugin_url')) {
  define('capwp_plugin_url', plugin_dir_url( __FILE__ ));
}

include( capwp_plugin_dir . 'register_custom_portfolio.php');
include( capwp_plugin_dir . 'register_shortcode_info.php');


function capwp_portfolio_style_declaration(){
	wp_enqueue_style('style-assist', capwp_plugin_url . 'css/style.css');
	wp_enqueue_style('bootstrap-assist', capwp_plugin_url . 'css/bootstrap.min.css');
	wp_enqueue_style('prettyPhoto-assist', capwp_plugin_url . 'css/prettyPhoto.css');
}
add_action('wp_enqueue_scripts', 'capwp_portfolio_style_declaration');


function capwp_portfolio_js_declaration(){
	wp_register_script('bootstrap-assist', capwp_plugin_url . 'js/bootstrap.min.js',array('jquery'));
	wp_enqueue_script('bootstrap-assist');

	wp_register_script('portfolio-assist', capwp_plugin_url . 'js/portfolio.js');
	wp_enqueue_script('portfolio-assist');

	wp_register_script('prettyPhoto-assist', capwp_plugin_url . 'js/prettyPhoto.js',array('jquery'));
	wp_enqueue_script('prettyPhoto-assist');

	wp_register_script('mixitup-assist', capwp_plugin_url . 'js/jquery.mixitup.js',array('jquery'));
	wp_enqueue_script('mixitup-assist');

	wp_enqueue_script('jquery');

};
add_action('wp_enqueue_scripts', 'capwp_portfolio_js_declaration');


function capwp_portfolio_remove_ver($src) {
  if( strpos( $src, '?vers=' ) )
      $src = remove_query_arg( 'vers', $src );
  return $src;
}
add_filter('style_loader_src', 'capwp_portfolio_remove_ver', 10, 2);
add_filter('script_loader_src', 'capwp_portfolio_remove_ver', 10, 2);


function capwp_portfolio_addJquery()
{
?>
	<script>
(function($){
    $('#grid').mixitup({
      transitionSpeed : 800
    });

    $('ul#portfolioFilter li').click(function(){
      $('ul#portfolioFilter li').removeClass('active-filter');
      $(this).addClass('active-filter');
    });
})(jQuery);
		
	</script>
<?php
}
add_action('wp_footer', 'capwp_portfolio_addJquery');
