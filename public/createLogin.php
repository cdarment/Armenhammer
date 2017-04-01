<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');


//require_once(FS_TEMPLATES . 'index.php');
// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// Page content goes here

if ( $requestType == 'GET' ) {
// Display the form
    createLoginForm();

}  elseif ( $requestType == 'POST' ){

}



function createLoginForm(){
    echo <<< createLogin
<form class="form-horizontal" method="post" action="createLogin.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Sign up page</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">Create username</label>
            <div class="col-md-4">
                <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label" for="Email">Email</label>  
           <div class="col-md-4">
               <input id="Email" name="Email" type="text" placeholder="" class="form-control input-md" required="">
           </div> 
        </div>
        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="passwordinput">Create Password</label>
            <div class="col-md-4">
                <input id="passwordinput" name="passwordinput" type="password" placeholder="" class="form-control input-md">

            </div>
        </div>
        
        
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="singlebutton">Create login</label>
            <div class="col-md-4">
                <button id="singlebutton" name="singlebutton" class="btn btn-primary">Go</button>
            </div>
        </div>

    </fieldset>
</form>

createLogin;

}
?>


