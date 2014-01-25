<?php

/**
 * Plugin Name: country-state-dropdown-plugin
 * Plugin URI: http://www.noksa.net
 * Version: 0.1
 * Description: A barebone WordPress Plugin to Populate state/country automatically for Registration form or whatever! 
 * Author: Arafat Zahan
 * Author URI: http://www.arafatzahan.com
 * License: GPLv3
 **/
 
/**
 * How to use
  * Download/fork the plugin.
  * Edit the plugin according to your element id's. 
  * install it. 
 **/
 
 // Functions

  // Required JavaScript files and other stuffs that goes inside <head> 
  
  function acsd_head_coodes() {
    // The Country/States "Database" file
    ?>
     <script type="text/javascript" src="<?php echo plugins_url( 'inc/js/country3.js' , __FILE__ )?>" ></script>
    <?php
  }

  // Footer code for automatic Country population. 
  
  function acsd_footer_codes() {
    ?>
     <script type="text/javascript">print_country("country");</script>
     <script type="text/javascript">
     // This will add required attributes to State/Country <select> elements. 
     // Only useful when you can not directly edit html. 
     function addOnchangeAttr()
      {
       var id=document.getElementsById("country");
       var att=document.createAttribute("onchange");
       att.value="print_state('state',this.selectedIndex);";
       id.setAttributeNode(att);
      }
     addOnchangeAttr();
     </script>
    <?php
  }

 // Hooks
  
  // include in header
  add_action('wp_head', 'acsd_head_coodes');
  
  // inclyde in footer
  add_action('wp_footer', 'acsd_footer_codes');
 //
// END
