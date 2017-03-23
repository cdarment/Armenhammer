<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 3/18/2017
 * Time: 2:52 PM
 */

// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');

// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
if ( $requestType == 'GET' ) {
    $id = $_GET['id'];
    $sql = 'select * from posts where id = ' . $_GET['id'];
    $db = query($sql);
}


?>