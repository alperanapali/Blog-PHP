<?php
session_start();

include 'includes/header.php';
include 'includes/connectPDO.php';

$uri = $_SERVER['REQUEST_URI'];
$explode = explode('/',$uri);

$re = '/\?.+/m';
preg_replace($re, '', $explode[1]);


if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($dbcon, $_GET['q']);

// COUNT
    $sql = "SELECT COUNT(*) FROM posts WHERE title LIKE '%{$q}%' OR description LIKE '%{$q}%'";
    $result = mysqli_query($dbcon, $sql);
    $r = mysqli_fetch_row($result);
    $numrows = $r[0];

    echo '<div class="container"><i>';
    echo $numrows ." results found" ;
    echo "</i></div>";

    $rowsperpage = 5;
    $totalpages = ceil($numrows / $rowsperpage);

    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $page = (int)$_GET['page'];
    }

    if ($page > $totalpages) {
        $page = $totalpages;
    }

    if ($page < 1) {
        $page = 1;
    }
    $offset = ($page - 1) * $rowsperpage;

    $sql = "SELECT * FROM posts WHERE title LIKE '%$q%' OR description LIKE '%$q%' ORDER BY id DESC LIMIT $offset, $rowsperpage";
    $result = mysqli_query($dbcon, $sql);


    while ($row = mysqli_fetch_assoc($result)) {

        $id = htmlentities($row['id']);
        $title = htmlentities($row['title']);
        //$des = htmlentities($row['description']);
        $des = $row['description'];
        $posted_by = htmlentities($row['posted_by']);
        $hits = htmlentities($row['hits']);
        $image_url = htmlentities($row['image_url']);
        $time = htmlentities($row['date']);

        echo sprintf('
<div class="container">
    <div class="row mt-lg-5">
        <div class="col-md-7">
          <a href="post.php?id=%s">
            <img class="img-fluid align-content-md-center rounded" src=%s alt="" width="400" height="300">
          </a>
          <hr>
        </div>
        <div class="col-md-5">
          <h3><a href="post.php?id=%s">%s</a></h3>
          <p>%s</p>
          <p class="post-meta"><b>Posted by</b></p> 
          <a href="#"  >%s</a>
          <p><b>on</b> %s</p>
          <a class="btn btn-primary" href="post.php?id=%s">Read More</a>
            <hr>
          </div>
            </div>  
      
      ',
            $id, $image_url, $id, $title, substr($des, 0, 100), $posted_by, $time, $id);

    }

    echo "<div class='w3-bar w3-center'>";
    if ($page > 1) {
        echo "<a href='?page=1'>&laquo;</a>";
        $prevpage = $page - 1;
        echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
    }
    $range = 5;
    for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
        if (($x > 0) && ($x <= $totalpages)) {
            if ($x == $page) {
                echo "<div class='btn btn-primary'>$x</div>";
            } else {
                echo "<a href='?page=$x' class='btn btn-primary'>$x</a>";
            }
        }
    }
}
























