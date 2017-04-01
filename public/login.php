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
showLoginForm();


} elseif ( $requestType == 'POST' ){
    $input = $_POST;
    // Check to see if user exits
    $sql = "select * from users where email ='" .  $input['email'] . "'";
    echo $sql; echo '<br>';
    $result = $db->query($sql);
    if (! $result->size() == 0) {
        $user = $result->fetch();
        // We have a user so let's compare passwords
        // password is = to dog
        if (password_verify($input['password'], $user['password'])){
            echo '<hl> we are logged in</hl>';

            $_SESSION['user'] = $user;
            
        } else {
            echo '<h1> Invalid Password </h1>';
        }

    } else {
        echo '<hl>User not found</hl>';
    }

}

Layout :: PageBottom();

function showLoginForm()
{
    echo <<< showLogin
<form class="form-horizontal" method="post" action="login.php">
<fieldset>

<!-- Form Name -->
<legend>Login</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password">Password</label>
  <div class="col-md-4">
    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="login"></label>
  <div class="col-md-4">
    <button id="login" name="login" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>
showLogin;





}

?>








