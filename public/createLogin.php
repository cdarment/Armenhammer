<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');

//require_once(FS_TEMPLATES . 'index.php');
// Connect to the database
//$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
$requestType = $_SERVER[ 'REQUEST_METHOD' ];
// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// Page content goes here

if ( $requestType == 'GET' ) {
// Display the form
    createLoginForm();


}  elseif ( $requestType == 'POST' ) {
    if (validateInput($_POST)) {
        echo '<h1> Welcome new user</h1>';
        $input = $_POST;
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "insert into users (email, password, firstName, lastName, role_ID) values ('" . $input['email'] . "', '" . $password . "','" . $input['firstName'] . "', '" . $input['lastName'] . "', 2 );";
        $db->query($sql);
        echo '<h1>Welcome</h1>';
    } else {
        // This is an error so show the form again
        echo '<h1>Try again</h1>';
        createLoginForm($_POST);

    }

    /**
     * Functions that support the createPost page
     */
    $fields = [
        'password'   => ['required', 'varchar(255)'],
        'firstName' => ['required', 'varchar(50)'],
        'lastName' => ['required', 'varchar(50)'],
        'email' => ['required', 'varchar(32)']
    ];

    function validateInput($formData)
    {
        // use the global $fields list
        global $fields;
        $message = '';
        // Assume everything will be valid
        $validData = true;
        // Loop through the whitelist to ensure required data is provided and the data
        // is of the correct type
//    foreach ($fields as $name => $field){
//        $isRequired = ($field[0] == 'required') ? true : false;
//
//        $inArray = array_key_exists($name, $formData);
//
//
//
//        // Check for proper type of data
//        // if ()
//
//
//    }
        return true;
    }


    function createLoginForm($data = null)
    {
        echo <<< createLogin
<form class="form-horizontal" method="post" action="createLogin.php">
    <fieldset>

        <!-- Form Name -->
        <legend>Sign up page</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="firstName">Create username</label>
            <div class="col-md-4">
                <input id="firstName" name="firstName" type="text" placeholder="" class="form-control input-md">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label" for="email">Email</label>  
           <div class="col-md-4">
               <input id="email" name="email" type="text" placeholder="" class="form-control input-md" required="">
           </div> 
        </div>
        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Create Password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="" class="form-control input-md">

            </div>
        </div>
        
        
        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="createbutton">Create login</label>
            <div class="col-md-4">
                <button id="createbutton" name="createbutton" class="btn btn-primary">Go</button>
            </div>
        </div>

    </fieldset>
</form>

createLogin;

    }
}



