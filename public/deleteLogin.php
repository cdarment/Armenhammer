<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 3/16/2017
 * Time: 6:53 PM
 */
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');

// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');

if ( $requestType == 'GET' ) {
    $id = $_GET['id'];
    // $sql = "delete from posts where id = $id";
    // $db = query($sql);
    $sql = 'select * from users where id = ' . $_GET['id'];
    $result = $db->query($sql);
    $row = $result->fetch();
    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $password = $row['password'];
}

elseif ( $requestType == 'POST' ) {
    //Validate data
    $id = $_POST['id'];
//$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
//$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
// Save data
    $sql = "delete from users where id = $id";
    $result = $db->query($sql);
    echo 'It worked';

}
// Move them to the home page
header('Location: index.php');