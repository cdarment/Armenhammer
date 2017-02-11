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
<link rel="stylesheet" href="assets/Deliverable.css">
<head>
    <meta charset="UTF-8">
    <title>My Hobbies</title>

</head>

<body>
<header>Game Review</header>
<!-- <nav>
    <ul>
        <li><a href="Deliverable1.html"></a>Home</li>
        <li><a href="http://www.ign.com/articles/2016/11/28/final-fantasy-xv-review"></a>IGN page</li>
        <li><a href="http://www.destinylfg.net/"></a>Destiny lfg</li>
    </ul>
</nav>-->

pagetop;

    }
public static function article1($title,$article,$author)
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
public static function article2($title,$article,$author)
{
    echo <<<article2

    <div class="top10">
                <h2>$title</h2>
                <p>$article</p>
                <p>Quoted by $author</p>
            </div>
article2;

}
public static function article3($title,$article,$author)
{
    echo <<<article3
    <div class="top10">
                <h2>$title</h2>
                <p>$article</p>
                <p>Quoted by $author</p>
            </div>
article3;


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