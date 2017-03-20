<?php

/**
 * Created by PhpStorm.
 * User: Caleb Armentrout
 * Date: 2/9/2017
 * Time: 6:58 PM
 */
class Layout
{

    public static function  pageTop($title)
    {

        echo <<<pagetop
<!DOCTYPE html>
<html lang="en">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <title>Posts</title>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <!--  <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Brand</a>
          </div>-->
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="Deliverable1.html">Home</a></li>
                <li><a href="http://www.ign.com/articles/2016/11/28/final-fantasy-xv-review">IGN page</a></li>
                <li><a href="http://www.destinylfg.net/">Destiny lfg</a></li>
               <!-- <li><a href="BlogPage.html">Blog Page</a></li> -->
                <li><a href="postdata.html">Post Page</a></li>
                <!--  <li class="dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                       <ul class="dropdown-menu">
                           <li><a href="#"></a></li>
                           <li><a href="#"></a></li>
                           <li><a href="#">Something else here</a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="#">Separated link</a></li>
                           <li role="separator" class="divider"></li>
                           <li><a href="#">One more separated link</a></li>
                      </ul>
                  </li>-->

            </ul>
            <!--  <form class="navbar-form navbar-left">
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
              </form>
              <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Link</a></li>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="#">Action</a></li>
                          <li><a href="#">Another action</a></li>
                          <li><a href="#">Something else here</a></li>
                          <li role="separator" class="divider"></li>
                          <li><a href="#">Separated link</a></li>
                      </ul>-->
            </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
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
                <p>Quoted by $author</p>
            </div>
article1;

}
public static  function blogpage($blog)
{
    echo <<<blogpage
<body>
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
        <li><a href="Deliverable1.html">Home</a></li>
        <li><a href="http://www.ign.com/articles/2016/11/28/final-fantasy-xv-review">IGN page</a></li>
        <li><a href="http://www.destinylfg.net/">Destiny lfg</a></li>
        <li><a href="BlogPage.html">Blog Page</a></li>
    </ul>
</div>

<h2>What was your idea of my article page?</h2>
<textarea class="form-control" rows="5"></textarea>
<input class="btn btn-default" type="submit" value="Submit">
</body>
blogpage;

}

public static function pagebottem($footer)
{
    echo <<<pagebottem
<footer>
    <p>Copy Righted by Caleb Armentrout &copy; </p>
</footer>
pagebottem;

}




}