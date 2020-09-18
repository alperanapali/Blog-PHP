<?php
session_start();
include("header.php");
include("connect.php");
include("security.php");

echo '<div class="w3-container w3-teal">
<h2>New  Post</h2></div>';

if (isset($_POST['submit'])) {
    $title = mysqli_real_escape_string($dbcon, $_POST['title']);
    $description = mysqli_real_escape_string($dbcon, $_POST ['description']);
    $date = date('Y-m-d H:i');
    $posted_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

    $sql2 = "INSERT INTO `posts`(`id`, `title`, `post_cat`, `description`, `hits`, `posted_by`, `date`) VALUES (NULL, '$title', NULL, '$description', NULL, '$posted_by', '$date')";

    mysqli_query($dbcon, $sql2) or die("failed to post" . mysqli_connect_error());

    printf("Posted successfully. <meta http-equiv='refresh' content='2; url=postController.php?id=%d'/>",
        mysqli_insert_id($dbcon));


} else {

    echo '
<form class="w3-container" method="POST">
<label>Title</label>

<input type="text" class="w3-input w3-border" name="title" required>
<br>

<label>Description</label>
<textarea id = "description" row="30" cols="50" class="w3-input w3-border" name="description" required/></textarea>
<br>

<input type="submit" class="w3-btn w3-teal w3-round" name="submit" value="Post">
</form>
';

}

include("footer.php");   
