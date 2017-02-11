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

//$db = new Datebase(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Generate HTML for top of the page
Layout::pageTop('CSC206 Project');

/**
 *
 * This implementation mixes html and php code to enter data
 * It's a simple implementation but it works
 *
 */
?>

Layout::article1(Halo,kldjfaosija;lsdkgsaodigjo,Brandon);

Layout::article2(Open world,kaofawefoajopa,Caleb);

Layout::article3(Online, kajioefae, John);

Layout::blogpage(Blogs);

// Generate HTML for bottom of the page
Layout::pagebottom();