<?php
$slug = '';
$pages_includes = array("book-list","add-new","add-author", "remove-author", "add-student","remove-student","course-tracker" );

$currentPage = $_GET['page'];
if(in_array($currentPage,$pages_includes)){

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
