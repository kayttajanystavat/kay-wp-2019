<?php
/* Collection of Walker classes */

  class Walker_Nav_Primary extends Walker_Nav_menu {

    function start_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "<a href=" . $item->url . " class='mdc-button'>" . $item->title;
    }

    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</a>\n";
    }
  }
?>
