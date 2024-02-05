<?php
/*
  Plugin Name: Simple menu
  Version: 1.0
  Description: Simple menu
  Plugin URI: http://www.johndoe.com
  Author: John Doe
  Author URI: http://www.johndoe.com/
 */

    $plugin_dir = plugin_basename(__FILE__);
    function getNavMenu($menuName,$dropDown = "true")
    {
        $menu = $menuName; //Nav menu name
        $items = wp_get_nav_menu_items($menu); // Get nav menu items list
        $level = 0;
        $last_title = "";
        $last_url = "";
        $objectID_stack = array();
        $objectIDStackTop = 0;
        $output = "";
		$active = False;
		global $post;
		$pare="false";
        $lenght= count($items);
  if($dropDown) {
    for($i=0; $i<$lenght; $i++){
         if($items[$i]->menu_item_parent == 0 && $pare == "false"){
          /*echo "<pre>",print_r ($items),"</pre>";*/
  	       	if(isset($items[$i+1]) && $items[$i+1]->menu_item_parent != 0){
  	       		$output = $output."<li class='dropdown'><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a><ul class='dropdown-menu blue-background'>";
  	       		$pare ="true";
  	       	}else{
  	        	$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a></li>";
  	        	$pare ="false";
  	       	}
         }else if($items[$i]->menu_item_parent != 0 && $pare == "true"){
         		$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a></li>";
         		$pare ="true";

         }else if($items[$i]->menu_item_parent == 0 && $pare == "true"){
         	$output = $output."</ul><div class='dropdown-triangle'></div><div class='dropdown-bar'></div></li>";
  	       	if($items[$i+1]->menu_item_parent != 0){
  		       	$output = $output."<li  class='dropdown'><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a><ul class='dropdown-menu blue-background'>";
  		       	$pare ="true";
  	       	}else{
  	       		$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a></li>";
  	       		$pare ="false";
  	       	}
         }
      }

      if($items[$lenght-1]->menu_item_parent != 0){
      	$output = $output."</ul></li>";
      }
  } else {
    for($i=0; $i<$lenght; $i++){

         if($items[$i]->menu_item_parent == 0 && $pare == "false"){
  	       	if(isset($items[$i+1]) && $items[$i+1]->menu_item_parent != 0){
  	       		$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a><ul>";
  	       		$pare ="true";
  	       	}else{
  	        	$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a></li>";
  	        	$pare ="false";
  	       	}
         }else if($items[$i]->menu_item_parent != 0 && $pare == "true"){
         		$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a></li>";
         		$pare ="true";

         }else if($items[$i]->menu_item_parent == 0 && $pare == "true"){
         	$output = $output."</ul></li>";
  	       	if($items[$i+1]->menu_item_parent != 0){
  		       	$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a><ul>";
  		       	$pare ="true";
  	       	}else{
  	       		$output = $output."<li><a ". ($items[$i]->url == "#"?"class='noselect cursorDefault'":"href=".$items[$i]->url) .">".$items[$i]->title."</a></li>";
  	       		$pare ="false";
  	       	}
         }
      }

      if($items[$lenght-1]->menu_item_parent != 0){
      	$output = $output."</ul></li>";
      }
  }



        return $output;
    }
