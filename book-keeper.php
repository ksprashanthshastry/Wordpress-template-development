<?php

/**
 * Plugin Name:       Book Keeper
 * Plugin URI:        https://github.com/ksprashanthshastry/book-keeper
 * Description:       Book Keeper allows you to add new books to the list of books, edit the book information and delete the book entry if its no more needed.
 * Version:           1.0.0
 * Author:            Prashanth Shastry
 * Author URI:        https://github.com/ksprashanthshastry
 */

if (!defined("ABSPATH"))
  exit;

if(!defined("BOOK_KEEPER_DIR_PATH"))
  define ("BOOK_KEEPER_DIR_PATH", plugin_dir_path(__FILE__));

if (!defined("BOOK_KEEPER_PLUGIN_URL"))
  define("BOOK_KEEPER_PLUGIN_URL", plugins_url()."/book-keeper");

function book_keeper_include_assets(){
  //enqueue style sheets
  wp_enqueue_style("bootstrap", BOOK_KEEPER_PLUGIN_URL."/assets/css/bootstrap.min.css", '');
  wp_enqueue_style("datatable", BOOK_KEEPER_PLUGIN_URL."/assets/css/jquery.dataTables.min.css", '');
  wp_enqueue_style("notifybar", BOOK_KEEPER_PLUGIN_URL."/assets/css/jquery.notifyBar.css", '');
  wp_enqueue_style("stylesheet", BOOK_KEEPER_PLUGIN_URL."/assets/css/style.css", '');

  //enqueue javascript files
  wp_enqueue_script("jquery");
  wp_enqueue_script("bootstrap.bundle.min.js", BOOK_KEEPER_PLUGIN_URL."/assets/js/bootstrap.bundle.min.js", "", true);
  wp_enqueue_script("jquery.dataTables.min.js", BOOK_KEEPER_PLUGIN_URL."/assets/js/jquery.dataTables.min.js", "", true);
  wp_enqueue_script("jquery.notifyBar.js", BOOK_KEEPER_PLUGIN_URL."/assets/js/jquery.notifyBar.js", "", true);
  wp_enqueue_script("script.js", BOOK_KEEPER_PLUGIN_URL."/assets/js/script.js", "", true);
  wp_enqueue_script("validate.min.js", BOOK_KEEPER_PLUGIN_URL."/assets/js/validate.min.js", "", true);
  wp_localize_script("script.js", "bookkeeperajaxurl", admin_url("admin-ajax.php"));
}

add_action("init", "book_keeper_include_assets");


function book_keeper_menus(){
  add_menu_page(
  "Book Keeper", //page title
  "Book Keeper", //menu title
  "manage_options", //admin access
  "book-list", //page slug
  "books_list", //callback function
  "dashicons-book-alt", //menu icon
  26);  //menu position

  add_submenu_page(
    "book-list", // parent slug
    "Book List", // page title
    "Book List", // menu title
    "manage_options", // capability or access
    "book-list", // menu slug, naming it the same as parent slug to remove the additional menu item that comes as custom plugin
    "books_list"); //call back function

    add_submenu_page(
      "book-list", // parent slug
      "Add New", // page title
      "Add New", // menu title
      "manage_options", // capability or access
      "add-new", // menu slug
      "add_new_book"); //call back function

    add_submenu_page(
      "book-list", // parent slug
      "", // page title page=edit-book
      "", // menu title
      "manage_options", // capability or access
      "edit-book", // menu slug
      "edit_book"); //call back function

}

add_action("admin_menu", "book_keeper_menus");


function books_list(){
  include_once BOOK_KEEPER_DIR_PATH."/views/book-list.php";
}
function add_new_book(){
  include_once BOOK_KEEPER_DIR_PATH."/views/add-new-book.php";
}
function edit_book(){
  include_once BOOK_KEEPER_DIR_PATH."/views/edit-book.php";
}



function book_keeper_table(){
  global $wpdb;
  return $wpdb->prefix."book_keeper";
}

function book_keeper_create_table(){
  global $wpdb;
  require_once(ABSPATH.'wp-admin/includes/upgrade.php');

  $sql = "CREATE TABLE `". book_keeper_table() ."` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `about` text,
  `book_image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta($sql);
}

register_activation_hook(__FILE__, "book_keeper_create_table");

function drop_table_db(){
  global $wpdb;
  $wpdb->query("DROP table IF EXISTS " . book_keeper_table());
  //$wpdb->query("DROP TABLE IF EXISTS". book_keeper_table());
}
register_deactivation_hook(__FILE__ , "drop_table_db");
