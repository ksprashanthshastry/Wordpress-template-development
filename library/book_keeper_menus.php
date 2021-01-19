<?php

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
  /// my extended submenus
  add_submenu_page("book-list", "Add New Author", "Add New Author", "manage_options", "add-author", "bk_add_author");
  add_submenu_page("book-list", "Manage Author", "Manage Author", "manage_options", "remove-author", "bk_manage_author");
  add_submenu_page("book-list", "Add New Student", "Add New Student", "manage_options", "add-student", "bk_add_student");
  add_submenu_page("book-list", "Manage Student", "Manage Student", "manage_options", "remove-student", "bk_manage_student");
  add_submenu_page("book-list", "Course Tracker", "Course Tracker", "manage_options", "course-tracker", "bk_course_tracker");
  add_submenu_page("book-list","","", "manage_options","edit-book","edit_book");