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
  include_once BOOK_KEEPER_DIR_PATH."/library/book_keeper_style_scripts.php";
}
add_action("init", "book_keeper_include_assets");

function book_keeper_menus(){
  include_once BOOK_KEEPER_DIR_PATH."/library/book_keeper_menus.php";
}
add_action("admin_menu", "book_keeper_menus");


//Directory for each menu page
function books_list(){
  include_once BOOK_KEEPER_DIR_PATH."/views/book-list.php";
}
function add_new_book(){
  include_once BOOK_KEEPER_DIR_PATH."/views/add-new-book.php";
}
function edit_book(){
  include_once BOOK_KEEPER_DIR_PATH."/views/edit-book.php";
}

function bk_add_author(){
  include_once BOOK_KEEPER_DIR_PATH."/views/bk_add_author.php";
}

function bk_remove_author(){
  include_once BOOK_KEEPER_DIR_PATH."/views/bk_manage_author.php";
}

function bk_add_student(){
  include_once BOOK_KEEPER_DIR_PATH."/views/bk_add_student.php";
}

function bk_remove_student(){
  include_once BOOK_KEEPER_DIR_PATH."/views/bk_remove_student.php";
}

function bk_course_tracker(){
  include_once BOOK_KEEPER_DIR_PATH."/views/bk_course_tracker.php";
}

//prefixes for db tables
function book_keeper_table(){
  global $wpdb;
  return $wpdb->prefix."book_keeper";
}

function bk_authors_table(){
  global $wpdb;
  return $wpdb->prefix."bk_authors_table";
}

function bk_students_table(){
  global $wpdb;
  return $wpdb->prefix."bk_students_table";
}

function bk_enrol_table(){
  global $wpdb;
  return $wpdb->prefix."bk_enrol_table";
}

//creates tables in db upon activation
function book_keeper_create_table(){
  global $wpdb;
  include_once BOOK_KEEPER_DIR_PATH."/library/book_keeper_create_tables.php";
}
register_activation_hook(__FILE__, "book_keeper_create_table");

//drops/deletes tables in db upon deactivation
function drop_table_db(){
  global $wpdb;
  include_once BOOK_KEEPER_DIR_PATH."/library/book_keeper_drop_tables.php";
}
register_deactivation_hook(__FILE__ , "drop_table_db");

add_action("wp_ajax_bookkeeperlibrary", "book_keeper_ajax_handler");

//calls data form db in the forms to display it on the frontend
function book_keeper_ajax_handler(){
  global $wpdb;
  include_once BOOK_KEEPER_DIR_PATH."/library/book_keeper_library_ajax.php";
  wp_die();
}
