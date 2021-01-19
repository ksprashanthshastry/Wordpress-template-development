<?php

$wpdb->query("DROP table IF EXISTS " . book_keeper_table());
$wpdb->query("DROP table IF EXISTS " . bk_authors_table());
$wpdb->query("DROP table IF EXISTS " . bk_students_table());
$wpdb->query("DROP table IF EXISTS " . bk_enrol_table());

//remove user roles on deactivate
if(get_role("wp_book_user_role")){
  remove_role("wp_book_user_role");
}

//remove posts page on deactivate

if (!empty(get_option("my_book_page_id"))) {
  $page_id = get_option("my_book_page_id");
  wp_delete_post($page_id,true);
  delete_option("my_book_page_id");
}

