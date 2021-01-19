<?php

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

  $sql_enrol = "CREATE TABLE `".bk_enrol_table()."` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `student_id` int(11) NOT NULL,
            `book_id` int(11) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  dbDelta($sql_enrol);

  //create custom posts using shortcodes
  $my_post = array(
    'post_title' => "Book Page",
    'post_content' => "[book_page]",
    'post_status' => 'publish',
    "post_type" => "page",
    "post_name" => "my_books"
  );
  
  //Insert post into the db
  $book_id = wp_insert_post($my_post);
  add_option("my_book_page_id", $book_id);
  
  //user role registration
  add_role("wp_book_user_role","Book user",array(
    "read"=>true
  ));