<?php
/* Collection of Walker classes */

  class Walker_Nav_Mobile extends Walker_Nav_menu {

    function start_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "<a href=" . $item->url . " class='mdc-list-item' role='menuitem'>" . $item->title;
    }

    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</a>\n";
    }
  }
?>
