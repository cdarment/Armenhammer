<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/9/2017
 * Time: 8:23 PM
 */
//load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT'] . '/includes/application_includes.php');
// Include the HTML layout class
require_once (FS_TEMPLATES. 'Layout.php');


// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);

//$db = new Datebase(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Generate HTML for top of the page
Layout::pageTop('CSC206 Project');

Layout::article('Halo','','Brandon');

Layout::article('Open world', '','kaofawefoajopa','Caleb');

Layout::article('Online', 'kajioefae', 'John');

Layout::blogpage('Blogs');
/**
 *
 * This implementation mixes html and php code to enter data
 * It's a simple implementation but it works
 *
 */
// Generate HTML for bottom of the page

?>

Layout::pageBottom();