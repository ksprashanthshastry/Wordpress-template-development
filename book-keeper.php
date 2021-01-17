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
