<?php
/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/9/2017
 * Time: 8:23 PM
 */
//load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT'] . '/../includes/application_includes.php');
// Include the HTML layout class
require_once (FS_TEMPLATES. 'Layout.php');
require_once(FS_TEMPLATES . 'News.php');


// Connect to the database
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
// Get the stories for column 1 from the database
$sql = 'select * from posts';
$posts = $db->query($sql);
// Run a simple query that will be rendered in column 2 below
$sql = 'select id, name, description from pages';
$res = $db->query($sql);

//$db = new Datebase(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Generate HTML for top of the page
Layout::pageTop('');

Layout::article('','','');

Layout::article('', '','','');

Layout::article('', '', '');


/**
 *
 * This implementation mixes html and php code to enter data
 * It's a simple implementation but it works
 *
 */
// Generate HTML for bottom of the page
?>

    <div class="container top25">
        <div class="col-md-6">
            <section class="content">
                <?php
                // Loop through the posts and display them
                while ($post = $posts->fetch()) {
                   // print_r($post);
                    // Call the method to create the layout for a post
                    News::story($post);


                }
                ?>
            </section>
        </div>
        <?php
        /**
         *
         * This implementation abstracts out the table creation
         *
         * The implementation is a bit more complicated but notice how simple it is
         * to render the table on your page.  This is the preferred way to do it.
         *
         */
        ?>
        <div class="col-md-6">
            <section class="content">

                <h1>Hello <?php echo $_SESSION['user']['firstName']; ?></h1>

                <h1>Post Table</h1>
                <?php
                $table = Layout::buildTable($posts->fetchAll());
                echo $table;
                ?>
            </section>
        </div>
    </div>
<?php
Layout::pageBottom();
?>