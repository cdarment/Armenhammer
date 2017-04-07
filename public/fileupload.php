<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
/**
 * Sample script to upload an image file, verify it and display it on the screen
 */
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>


    <?php
    $request_type = $_SERVER[ 'REQUEST_METHOD' ];
    if ( $request_type == 'GET' ) {
        // Display the file upload form
        showForm();
    } else {
        $input = $_POST;
        echo '<pre>';
        print_r($input);
        echo '</pre><br>';
        echo '<pre>';
        print_r($_FILES);
        echo '</pre><br>';
        // Check for a valid file upload
        $file = $_FILES[ 'imagename' ][ 'tmp_name' ];
        if ( !is_uploaded_file($file) ) {
            echo '<h3>Error</h3><p>File was not uploaded via POST form.</p>';
            exit;
        }
        if ( file_exists($file) ) {
            $imagesizedata = getimagesize($file);
            if ( $imagesizedata === false ) {
                //not image
                echo '<h3>Error</h3><p>Uploaded file is not an image.</p>';
                exit;
            } else {
                //image information
                echo '<h3>Success</h3><p>The image was uploaded</p>';
                echo '<pre>' . print_r($imagesizedata) . '</pre>';
                // Copy image to permanent location
                $permanent_filename = $_SERVER[ 'DOCUMENT_ROOT' ] . '/assets/images/' . $_FILES[ 'imagename' ][ 'name' ];

                // Move file to permanent location
                move_uploaded_file($file, $permanent_filename);
                // Display the image
                showImage($input, $_FILES[ 'imagename' ]);
            }
        } else {
            //not file
            echo '<h3>Error</h3><p>There was an error uploading the file</p>';
            exit;
        }
    }
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    </body>
    </html>


<?php
/**
 * Show the file upload form
 */
function showForm()
{
    echo <<<uploadForm
        <form class="form-horizontal" method="post"  action="fileupload.php" enctype="multipart/form-data">
        <fieldset>
        
        <!-- Form Name -->
        <legend>Image Upload</legend>
        
        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="title">Title</label>  
          <div class="col-md-4">
          <input id="title" name="title" type="text" placeholder="picture title" class="form-control input-md">
            
          </div>
        </div>
        
        <!-- Textarea -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="description">Description</label>
          <div class="col-md-4">                     
            <textarea class="form-control" id="description" name="description"></textarea>
          </div>
        </div>
        
        <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="imagename">Image</label>
          <div class="col-md-4">
            <input id="imagename" name="imagename" class="input-file" type="file">
          </div>
        </div>
        
        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="submit"></label>
          <div class="col-md-4">
            <button id="submit" name="submit" class="btn btn-success">Upload</button>
          </div>
        </div>
        
        </fieldset>
        </form>
uploadForm;
}
/**
 * Show the Image and its information
 *
 * @param $input
 * @param $uploadedFile
 */
function showImage($input, $file)
{
    $title = $input[ 'title' ];
    $description = $input[ 'description' ];
    $image = $file[ 'name' ];
    echo <<<story12
    <div class="top10">
        <h2>$title</h2>
        <img src="/assets/images/$image" width="200">
        <p>$description</p>
    </div>
story12;
}