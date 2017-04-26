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
    if (isset($_SESSION["users"])){
        $id = $_SESSION["users"];
        $sql = 'select * from users where id = ' . $id['id'];
        $result = $db->query($sql);
        $row = $result->fetch();




        echo <<<postform
				
                    <form id="createPost" action='deleteLogin.php' method="POST" class="form-horizontal">
                        <fieldset>
						<p>Are you sure you want to DELETE this user?</p>
                        <input type="hidden" name="id" value="">
                            <!-- Form Name -->
                            <legend>Delete User</legend>
                            <!-- Button (Double) -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="submit"></label>
                                <div class="col-md-8">
                                    <button id="submit" name="submit" value="Submit" class="editButton">Delete</button>
                                   <a class="deleteButton" href="index.php">Cancel</a>
                                </div>
                            </div>
                        </fieldset>
                    </form>
postform;
    }
    else{
        echo '<p>Not Logged in</p>';
    }
} elseif ( $requestType == 'POST' ) {
    //Validate data
    $id = $_SESSION["users"];
    // Save data
    $sql =  'delete from users where id= ' . $id['id'];
    $result = $db->query($sql);
    unset($_SESSION['username']);
    session_destroy();
    echo 'This user was deleted successfully';
}

// Move them to the home page
header('Location: index.php');