<?php
/* Collection of Walker classes */

  class Walker_Nav_Mobile extends Walker_Nav_menu {

    var $db_fields = array(
        'parent' => 'menu_item_parent',
        'id'     => 'db_id'
    );

    function start_lvl(&$output, $depth=0, $args=array()) {
        $output .= "<div class='mdc-list' role='menu' aria-hidden='true' aria-orientation='vertical'>";
    }

    function end_lvl(&$output, $depth=0, $args=array()) {
        $output .= "</div>\n";
    }

    function start_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "<a href=" . $item->url . " class='mdc-list-item' role='menuitem'>" . $item->title;
    }

    function end_el(&$output, $item, $depth=0, $args=array()) {
        $output .= "</a>\n";
    }
  }
?>
