<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/22/2017
 * Time: 1:51 PM
 */// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
//require_once(FS_TEMPLATES . 'index.php');
// Connect to the database
$db = new Datebase(DB_HOST, DB_USER, DB_PASS, DB_NAME);
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
    $image = $data['image'];
    echo <<<postdata
    <form id="createPostForm" action='createPost.php' method="POST" class="form-horizontal">
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
                <label class="col-md-3 control-label" for="image">Image Upload</label>
                <div class="col-md-8">
                    <input id="image" name="image" class="input-file" value="$image" type="file">
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
