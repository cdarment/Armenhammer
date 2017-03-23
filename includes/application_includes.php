<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/9/2017
 * Time: 7:16 PM
 */

// Include the basic configuration elements
require_once('config.php');
// Include the database connection and query class
require_once('Database.php');
// Include the HTML layout class

// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];

