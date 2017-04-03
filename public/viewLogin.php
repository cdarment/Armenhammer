<?php
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
    $sql = 'select * from users where id = ' . $_GET['id'];
    //$db = query($sql);
    $result = $db->query($sql);
    $row = $result->fetch();
    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $password = $row['password'];

    //Layout::viewForm($id, $firstName, $lastName, $email, $password);
    Layout::pageBottom();


}
?>