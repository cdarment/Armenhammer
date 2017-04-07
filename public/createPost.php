<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/22/2017
 * Time: 1:51 PM
 */// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
//require_once(FS_TEMPLATES . 'index.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// Page content goes here

?>

    <div class="container top25">
        <div class="col-md-8">
            <section class="content">

                <?php
                if ( $requestType == 'GET' ) {
                    // Display the form
                    showForm();
                } elseif ( $requestType == 'POST' ) {
                    // Process data that was submitted
                    echo '<h2>This is the data that was entered</h2>';
                    echo '<pre>';
                    print_r($_POST);
                    echo '</pre>';


                    $title = $_POST['title'];
                    $startDate = $_POST['startDate'];
                    $startDate = date('Y-m-d h:i:s', strtotime($startDate));
                    $endDate = $_POST['endDate'];
                    $endDate = date('Y-m-d h:i:s', strtotime($endDate));
                    $content = $_POST['content'];

                    // Process the uploaded file
                    // 1. Upload successful
                    // 2. get Image size to verify it's an image
                    // 3. move the image to a perm, location
                    // 4. store the image location

                    $image = 'destinypic.jpg';

                    $sql = "insert into posts (title, content, startDate, endDate, userID, image) values ('" . $title . "', '" . $content . "', '" . $startDate . "', '" . $endDate . "', 1, '" . $image . "');";
                    $db->query($sql);

                    // connect to index.php page
                    //$con = mssql_connect('localhost', 'cdarment', 'Pokemon1!') or die('Could not connect');
                    //msql_select_db("csc206", $con) or die('Could not connect');
                    //$query = "SELECT localhost"; FROM csc206 ORDER BY Date;
                    //$result = msql_query($query) or die('Could not connect');
                }
                ?>


            </section>
        </div>

        <div class="col-md-4">
            <section class="content">
                <h1>Posts List</h1>
                <p>Current and active posts.</p>

            </section>
        </div>
    </div>

<?php

/**
 * Functions that support the createPost page
 */
$fields = [
    'title'     => ['required', 'string'],
    'content'   => ['required', 'string'],
    'startDate' => ['required', 'date'],
    'endDate'   => ['required', 'date'],
    'image'     => ['date']
];
/**
 * Show the form
 */
function showForm($data = null)
{
    $title = $data['title'];
    $content = $data['content'];
    $startDate = $data['startDate'];
    $endDate = $data['endDate'];
    //$image = $data['image'];
    echo <<<postdata
    <form id="createPostForm" action='createPost.php' method="POST" class="form-horizontal" enctype= multipart/form-data>
        <fieldset>
    
            <!-- Form Name -->
            <legend>Create Post</legend>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="title">Title</label>
                <div class="col-md-8">
                    <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" required="">                    
                </div>
            </div>
    
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="content">Content</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="content" name="content">$content</textarea>
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="startDate">Effective Date</label>
                <div class="col-md-8">
                    <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" required="">
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="endDate">End Date</label>
                <div class="col-md-8">
                    <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md">
                </div>
            </div>
    
        <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="imagename">Image</label>
          <div class="col-md-4">
            <input id="imagename" name="imagename" class="input-file" type="file">
          </div>
        </div>
    
            <!-- Button (Double) -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="submit"></label>
                <div class="col-md-8">
                    <button id="submit" name="submit" value="Submit" class="btn btn-success">Submit</button>
                    <button id="cancel" name="cancel" value="Cancel" class="btn btn-info">Cancel</button>
                </div>
            </div>
    
        </fieldset>
    </form>
postform;
}
postdata;
    {
    }
}