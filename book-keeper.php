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
      "book-list", "Add New", "Add New","manage_options","add-new","add_new_book");

    add_submenu_page(
      "book-list","","", "manage_options","edit-book","edit_book");

    /// my extended submenus
    add_submenu_page("book-list", "Add New Author", "Add New Author", "manage_options", "add-author", "bk_add_author");
    add_submenu_page("book-list", "Manage Author", "Manage Author", "manage_options", "remove-author", "bk_remove_author");
    add_submenu_page("book-list", "Add New Student", "Add New Student", "manage_options", "add-student", "bk_add_student");
    add_submenu_page("book-list", "Manage Student", "Manage Student", "manage_options", "remove-student", "bk_remove_student");
    add_submenu_page("book-list", "Course Tracker", "Course Tracker", "manage_options", "course-tracker", "bk_course_tracker");
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

function book_keeper_create_table(){
  global $wpdb;
  require_once(ABSPATH.'wp-admin/includes/upgrade.php');

  $sql = "CREATE TABLE `". book_keeper_table() ."` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `about` text,
  `book_image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta($sql);

  $sql_author = "CREATE TABLE `". bk_authors_table() ."` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `fb_link` text,
    `about` text,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

  dbDelta($sql_author);

  $sql_students = "CREATE TABLE `". bk_students_table() ."` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `email` varchar(255) DEFAULT NULL,
    `user_login_id` int(11) DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta($sql_students);

  $sql_enrol = "CREATE TABLE `". bk_enrol_table() ."` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `student_id` int(11) NOT NULL
    `book_id` int(11) NOT NULL,
    `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta($sql_enrol);

}

register_activation_hook(__FILE__, "book_keeper_create_table");


function drop_table_db(){
  global $wpdb;
  $wpdb->query("DROP table IF EXISTS " . book_keeper_table());
  // $wpdb->query("DROP table IF EXISTS " . bk_authors_table());
  // $wpdb->query("DROP table IF EXISTS " . bk_students_table());
  // $wpdb->query("DROP table IF EXISTS " . bk_enrol_table());
  //$wpdb->query("DROP TABLE IF EXISTS". book_keeper_table());
}
register_deactivation_hook(__FILE__ , "drop_table_db");


add_action("wp_ajax_bookkeeperlibrary", "book_keeper_ajax_handler");
function book_keeper_ajax_handler(){
  global $wpdb;
  if ($_REQUEST['param']=="save_book"){
    //save data to debug
    $wpdb->insert(book_keeper_table(), array(
      "name"=>$_REQUEST['name'],
      "author"=>$_REQUEST["author"],
      "about"=>$_REQUEST["about"],
      "book_image"=>$_REQUEST["image_name"]
    ));
    echo json_encode(array("status"=>1,"message"=>"Book created successfully"));
  }elseif ($_REQUEST['param']=="edit_book") {
    $wpdb->update(book_keeper_table(), array(
      "name"=>$_REQUEST['name'],
      "author"=>$_REQUEST["author"],
      "about"=>$_REQUEST["about"],
      "book_image"=>$_REQUEST["image_name"]
    ),array(
      "id"=>$_REQUEST['book_id']
    ));
    echo json_encode(array("status"=>1,"message"=>"Book updated successfully"));

  }elseif ($_REQUEST['param']=="delete_book") {
    $wpdb->delete(book_keeper_table(),array(
      "id"=>$_REQUEST['id']
    ));
    echo json_encode(array("status"=>1,"message"=>"Book deleted successfully"));

  }


  wp_die();
}
