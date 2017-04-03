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

if ($requestType == 'GET') {
    $sql = 'select * from users where id = ' . $_GET['id'];
    $result = $db->query($sql);
    $row = $result->fetch();
    $id = $row['id'];
    $firstName=$row['firstName'];
    $lastName=$row['lastName'];
    $password=$row['password'];
    $email=$row['email'];
    Layout::updateUser($id, $email, $firstName, $lastName, $password);
} elseif ($requestType == 'POST') {
    //Validate data
    // Save data
    $id = $_POST['id'];
    $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES);
    $lastName = htmlspecialchars($_POST['lastName'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $sql = "update users set firstname = '$firstName', lastname = '$lastName', password = '$password ', email = '$email' where id = $id;";
    $result = $db->query($sql);
    header('Location: index.php');
}
?>
    </section>
    </div>
    </div>

<?php
Layout::pageBottom();