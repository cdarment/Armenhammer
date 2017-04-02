<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 3/18/2017
 * Time: 2:52 PM
 */

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
    $sql = 'select * from posts where id = ' . $_GET['id'];
    $result = $db->query($sql);
    $row = $result->fetch();
    $id = $row['id'];
    $title= $row['title'];
    $content= $row['content'];
    $startDate= $row['startDate'];
    $endDate= $row['endDate'];

    echo <<<postform
                         <form id="createPostForm" action='deletePost.php' method="POST" class="form-horizontal">
                        <fieldset>
						<p>Are you sure you want to DELETE this post?</p>
                        <input type="hidden" name="id" value="$id">
                            <!-- Form Name -->
                            <legend>Delete Post</legend>
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="submit"></label>
                                <div class="col-md-8">
                                    <button id="submit" name="submit" value="Submit" class="editButton">Delete</button>
                                   <a class="deleteButton" href="tablePage.php">Cancel</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
postform;

}
 elseif ( $requestType == 'POST' ) {
    //Validate data
$id = $_POST['id'];
//$title = htmlspecialchars($_POST['title'], ENT_QUOTES);
//$content = htmlspecialchars($_POST['content'], ENT_QUOTES);
// Save data
$sql = "delete from post where id = $id";
$result = $db->query($sql);
echo 'It worked';
}

//header(Location: index.php);



?>