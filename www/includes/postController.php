<?php

include("connectPDO.php");

$uri =$_SERVER['REQUEST_URI'];
$explode = explode('/',$uri);
$slug = $explode[2];

//$id = (INT)$_GET['id'];

/*if ($slug < 1) {
    header("location: index.php");
}*/

//$sql = "Select * FROM posts WHERE slug like '%'.'$slug'.'%'  ";
$sql = "Select * FROM posts WHERE slug = '$slug'";

$stmt = $conn->query($sql);
$row = $stmt->fetch();

if (isset($_POST['like_button'])) {
    $hitsql = "UPDATE posts SET hits = hits +1 WHERE slug ='$slug'";
    $stmt = $conn->query($hitsql);
}


$id = $row['id'];
$title = $row['title'];
$des = $row['description'];
$by = $row['posted_by'];
$hits = $row['hits'];
$image_url = $row['image_url'];
$time = $row['date'];
$slug = $row['slug'];
$category = $row['post_cat'];

//Page input
$page_title = $title;
$page_heading = $title;
$page_subheading = "by " . $by;

