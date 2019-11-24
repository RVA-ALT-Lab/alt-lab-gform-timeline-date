<?php 
/*
Plugin Name: Gravity form timeline post back dater
Plugin URI:  https://github.com/
Description: sets post date to the form date field assuming form ID = 1 and Date field = form field 1
Version:     1.0
Author:      ALT Lab
Author URI:  http://altlab.vcu.edu
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: my-toolset

*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


function gf_special_timeline_update($entry, $form){
    $time = rgar($entry, '1');//assumes the gform date field is field 1 if not change it
    $post = get_post( $entry['post_id'] );
    $post->post_date = $time;
    $post->post_date_gmt = get_gmt_from_date( $time );
    wp_update_post($post);
}
 
add_action( 'gform_after_submission_1', 'gf_special_timeline_update', 10, 2 );//set to run off form 5 if not 





//LOGGER -- like frogger but more useful

if ( ! function_exists('write_log')) {
   function write_log ( $log )  {
      if ( is_array( $log ) || is_object( $log ) ) {
         error_log( print_r( $log, true ) );
      } else {
         error_log( $log );
      }
   }
}