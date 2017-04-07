<?php
// Load all application files and configurations
require($_SERVER['DOCUMENT_ROOT'] . '/../includes/application_includes.php');
require_once(FS_TEMPLATES . 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');

//require_once(FS_TEMPLATES . 'index.php');
// Connect to the database
//$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Initialize variables
if (! isset($_SESSION['user'])) {
    //header('location: createLogin.php');
}
else {
// Initialize variables
    $requestType = $_SERVER['REQUEST_METHOD'];
// Generate the HTML for the top of the page
    Layout::pageTop('CSC206 Project');
// Page content goes here

    if ($requestType == 'GET') {
// Display the form
        showForm();
    } elseif ($requestType == 'POST') {

        echo '<h1> Welcome new user</h1>';
        $input = $_POST;
        $email = $_POST['email'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "insert into users (email, password, firstName, lastName,  role_ID) values ('" . $input['email'] . "', '" . $password . "','" . $input['firstName'] . "', '" . $input['lastName'] . "', 2 );";
        $db->query($sql);
        echo '<h1>Welcome</h1>';

    } else {

        echo 'bad stuff';
    }
    /**
     * Functions that support the createLogin page
     */
    $fields = [
        'password' => ['required', 'varchar(255)'],
        'firstName' => ['required', 'varchar(50)'],
        'lastName' => ['required', 'varchar(50)'],
        'email' => ['required', 'varchar(32)']
    ];


}


    function showForm($data = null)
    {
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];
        $password = $data['password'];
        $email = $data['email'];

        //function createLoginForm($_Post)
        //{
           echo <<<Fred
<form id="createLoginForm" action='createLogin.php' method="POST" class="form-horizontal">
    <fieldset>

        <!-- Form Name -->
        <legend>Sign up page</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="firstName">First Name</label>
            <div class="col-md-4">
                <input id="firstName" name="firstName" type="text" placeholder="" value="$firstName" class="form-control input-md">

            </div>
        </div>
             <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="lastName">Last Name</label>
            <div class="col-md-4">
                <input id="lastName" name="lastName" type="text" placeholder="" value="$lastName" class="form-control input-md">

            </div>
        </div>
        <!-- Text input-->
        <div class="form-group">
           <label class="col-md-4 control-label" for="email">Email</label>  
           <div class="col-md-4">
               <input id="email" name="email" type="text" placeholder="" value="$email" class="form-control input-md" required="">
           </div> 
        </div>
        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="password">Create Password</label>
            <div class="col-md-4">
                <input id="password" name="password" type="password" placeholder="" value="$password" class="form-control input-md">

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

Fred;

      //  }
    }




