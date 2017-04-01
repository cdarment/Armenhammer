
<?php
// Load all application files and configurations
require($_SERVER[ 'DOCUMENT_ROOT' ] . '/../includes/application_includes.php');
require_once(FS_TEMPLATES . 'News.php');
require_once(FS_TEMPLATES . 'Layout.php');

// Generate the HTML for the top of the page
Layout::pageTop('CSC206 Project');
// Get the posts for this page from the database
$sql = 'select posts.id, title, content, startdate, enddate  from posts ';
$result = $db->query($sql);
$posts = $result->fetchAll();
// echo '<pre>'; print_r($posts); echo '</pre>'; die();
// Page content goes here
?>

<div class="container top25">
    <div class="col-md-12">
        <section class="content">
            <?php
            // Create the table Header
            echo News::buildTableHeader($posts);
            // Fill data table
            if (is_array($posts)) {
                foreach ($posts as $post) {
                    $post['content'] = substr($post['content'], 0, 35) . '...';
                    echo News::buildTableRow($post);
                }
            }
            // Close the table
            echo News::closeTable();
            ?>
        </section>
    </div>
</div>

<?php
// Generate the page footer
Layout::pageBottom();
