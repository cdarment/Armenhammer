<?php

/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/9/2017
 * Time: 6:58 PM
 */
class Layout
{

    public static function pageTop($title)
    {
        // This builds the web path to the app.css file and is embedded in the header below
        $appcss = WS_CSS . 'app.css';
        echo <<<pagetop
    <!doctype html>
    <html>
    <div class="page">
   
    <head>
        <meta charset="utf-8">
        <title>$title</title>
        <!-- Bootstrap Core CSS -->
        <link href="styles.css" rel="stylesheet">
        
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="author" content="Caleb Armentrout">
        <meta name="description" content="Everything you wanted to know about web programming">
        <meta name="keywords" content="xampp, php, mysql, html, web programming">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lte IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        
        <!-- Embed fonts for the page -->
        <link href='https://fonts.googleapis.com/css?family=Miriam+Libre:400,700|Source+Sans+Pro:200,400,700,600,400italic,700italic' rel='stylesheet' type='text/css'>
        
        <!-- Latest compiled and minified CSS - get from getbootstrap.com-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
        <link rel="stylesheet" href="$appcss">
    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="home language-php">
        
        <header class="navbar navbar-default navbar-fixed-top topnav" role="banner">
            <div class="container topnav">
                <nav role="navigation">
                    <div class="container-fluid">
                      <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                                <a class="navbar-brand topnav" href="/">CSC206 Project</a>
                        </div>
        
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse-1">						  
                            <ul class="nav navbar-nav  navbar-right">
                                
                                <li><a href="/about.php">About</a></li>  
                                <li><a href="/createPost.php">Create Post</a></li>                        
                                <li><a href="/events.php">Events</a></li>
                                <li><a href="/getPost.php">Editing posts</a></li>
                                <li><a href="/createLogin.php">Create Login</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Posts<span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">                                        
                                        <li><a href="/getPosts.php">List</a></li>
                                        <li><a href="/createPost.php">New</a></li>
                                        <
                                    </ul>
                                </li>
                                <li><a href="/login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>	                       
                            </ul>						
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>		
        </header>
            <div class="intro-header">
	   	<h2>Web Development</h2>
	</div>
pagetop;
    }
public static function article($title,$article,$author)
{
    echo <<<article1
<div class="container">
    <div class="col-md-6">
        <section class="content">
            <div class="top10">
                <h2>$title</h2>
                <p>$article</p>
                <p>$author</p>
                
            </div>
article1;

}
/**public static  function blogpage($blog)
{
    echo <<<blogpage
<body>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="http://www.ign.com/articles/2016/11/28/final-fantasy-xv-review">IGN page</a></li>
        <li><a href="http://www.destinylfg.net/">Destiny lfg</a></li>
        <li><a href="createPost.php">Post page</a></li>
    </ul>
</div>

<h2>What was your idea of my article page?</h2>
<textarea class="form-control" rows="5"></textarea>
<input class="btn btn-default" type="submit" value="Submit">
</body>
blogpage;

}**/

public static function pageBottom()
{
    echo <<<pageBottem
<footer>
    <p>Copy Righted by Caleb Armentrout &copy; </p>
</footer>
</div>
pageBottem;



}
    public static function buildTable($data)
    {
        // Start building the table
        $table = '<table class="table table-hover">';
        // Create the table header row
        $header = '<tr>';
        foreach ( $data[ 0 ] as $key => $cell ) {
            $header .= '<th>' . $key . '</th>';
        }
        $header .= '</tr>';
        // Add the header to the table
        $table .= $header;
        // Build the table rows
        $rowHTML = '';
        // Loop through each row of data and build a row
        foreach ( $data as $row ) {
            $rowHTML .= '<tr>';
            // Loop through each cell and create the cells
            foreach ( $row as $cell ) {
                $rowHTML .= '<td>' . $cell . '</td>';
            }
            $rowHTML .= '</tr>';
        }
        // Add the rows to the table
        $table .= $rowHTML;
        // Close out the table
        $table .= '</table>';
        return $table;
    }

    Public static function signUp($email, $password, $firstName, $lastName){
        echo <<< signUpForm
        
             <form id="signUpForm" action='signUp.php' method="POST" class="form-horizontal">
                <fieldset>
                
                    <!-- Form Name -->
                    <legend>Sign Up!</legend>
                    
                      <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="email">Email :</label>  
                      <div class="col-md-5">
                      <input id="email" name="email" type="text" placeholder="someone@email.com" value="$email" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstName">First Name :</label>  
                      <div class="col-md-5">
                      <input id="firstName" name="firstName" type="text" placeholder="Enter your first name." value="$firstName"  class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastName">Last Name :</label>  
                      <div class="col-md-5">
                      <input id="lastName" name="lastName" type="text" placeholder="Enter your first name." value="$lastName"  class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password">Password :</label>  
                      <div class="col-md-5">
                      <input id="password" name="password" type="password" placeholder="Enter your password. 6 to 16 characters." value="$password" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                   
                    <!-- Button (Double) -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit"></label>
                      <div class="col-md-8">
                        <button id="submit" name="submit" value="Submit" class="btn btn-success">Sign Up</button>
                        <a href = "index.php" button id="cancel" name="cancel" value="Cancel" class="btn btn-danger">Cancel</a></button>
                      </div>
                    </div>
                
                </fieldset>
            </form>
signUpForm;
    }

    public static function updateUser($id, $email, $firstName, $lastName, $password){
        echo <<< updateUserForm
        
             <form id="updateUsersForm" action='updateUsers.php' method="POST" class="form-horizontal">
                <fieldset>
                
                    <!-- Form Name -->
                    <legend>Update User Information!</legend>
                    <input type="hidden" name="id" value=$id>
                      <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="email">Email</label>  
                      <div class="col-md-5">
                      <input id="email" name="email" type="text" placeholder="someone@email.com" value="$email" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="firstName">First Name</label>  
                      <div class="col-md-5">
                      <input id="firstName" name="firstName" type="text" placeholder="Enter your first name." value="$firstName"  class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="lastName">Last Name</label>  
                      <div class="col-md-5">
                      <input id="lastName" name="lastName" type="text" placeholder="Enter your first name." value="$lastName"  class="form-control input-md" required="">
                        
                      </div>
                    </div>
                    
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="password">Password</label>  
                      <div class="col-md-5">
                      <input id="password" name="password" type="text" placeholder="Enter your password. 6 to 16 characters." value="$password" class="form-control input-md" required="">
                        
                      </div>
                    </div>
                   
                    <!-- Button (Double) -->
                    <div class="form-group">
                      <label class="col-md-4 control-label" for="submit"></label>
                      <div class="col-md-8">
                        <button id="submit" name="submit" value="Submit" class="btn btn-success">Update</button>
                        <a href = "index.php" button id="cancel" name="cancel" value="Cancel" class="btn btn-danger">Cancel</a></button>
                      </div>
                    </div>
                
                </fieldset>
            </form>
updateUserForm;
    }
    public static function viewForm($id, $title, $content, $startDate, $endDate){
        echo <<<viewform
            
    <form id="createPostForm" action='updatePosts.php' method="POST" class="form-horizontal">
        <fieldset>
            <input type="hidden" name="id" value=$id">
            <input type="hidden" name="title" value=$title">
            <input type="hidden" name="content" value=$content">
            <input type="hidden" name="startDate" value=$startDate">
            <input type="hidden" name="endDate" value=$endDate">
    
            <!-- Form Name -->
            <legend>View your post below!</legend>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="title">Title</label>
                <div class="col-md-8">
                    <input id="title" name="title" type="text" placeholder="post title" value="$title" class="form-control input-md" readonly required="">                    
                </div>
            </div>
    
            <!-- Textarea -->
            <div class="form-group">
                <label class="col-md-3 control-label" for="content">Content</label>
                <div class="col-md-8">
                    <textarea class="form-control" id="content" name="content" readonly>$content</textarea>
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="startDate">Effective Date</label>
                <div class="col-md-8">
                    <input id="startDate" name="startDate" type="text" placeholder="effective date" value="$startDate" class="form-control input-md" readonly required="">
                </div>
            </div>
    
            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-3 control-label" for="endDate">End Date</label>
                <div class="col-md-8">
                    <input id="endDate" name="endDate" type="text" placeholder="end date" value="$endDate" class="form-control input-md" readonly>
                </div>
            </div>
        </fieldset>
    </form>
viewform;
    }



}