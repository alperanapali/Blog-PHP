<?php

include("connect.php");


$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: index.php");
}

if (isset($_POST['like_button'])) {
    $hitsql = "UPDATE posts SET hits = hits +1 WHERE id = '$id'";
    mysqli_query($dbcon, $hitsql);
}

$row = mysqli_fetch_assoc($result);

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

//Comments


?>







<?php
//if (isset($_SESSION['username'])) {
//    ?>
<!--    <br>-->
<!--    <div class="w3-text-green"><a href="edit.php?id=--><?php //echo $row['id']; ?><!--">[Edit]</a></div>-->
<!--    <div class="w3-text-red">-->
<!--        <a href="del.php?id=--><?php //echo $row['id']; ?><!--"-->
<!--           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>-->
<!--    --><?php
//}
//echo '</div></div>';