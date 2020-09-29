<?php
session_start();
$page_heading = "New Post";
include 'includes/header.php';
include 'includes/connectPDO.php';
include 'includes/slugify.php';

if (isset($_POST['submit'])) {
    $title = htmlentities($_POST['title']);
    $postcat = $_POST['select'];
    $description = $_POST ['description'];
    $date = date('Y-m-d H:i');
    $posted_by = $_SESSION['username'];
    $img_url = $_POST['image_url'];
    $slug = slugify($title);

    //$sql2 = "INSERT INTO `posts`(`id`, `title`, `post_cat`, `description`, `hits`, `posted_by`, `date`, `image_url`, `slug`) VALUES (NULL, '$title', '$postcat', '$description', '0', '$posted_by', '$date', '$img_url', '$slug')";
    $sql = "INSERT INTO `posts`(`id`, `title`, `post_cat`, `description`, `hits`, `posted_by`, `date`, `image_url`, `slug`) VALUES (?, ?, ? ,?, ?, ?, ?, ? ,?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([NULL, $title, $postcat, $description, 0, $posted_by, $date, $img_url, $slug]);

    printf("Posted successfully. <meta http-equiv='refresh' content='2; url=post/%s'/>",
        $slug);


} else {
    echo '
    <div class="container" >
    <form class="container" method="POST" >
        <label for="title">Title</label>
                <br>
        <input type="text" class="post-title" name="title" required>
        <br>
        <label for="exampleFormControlSelect1">Select Category</label>
        <select class="form-control" name="select" id="select">
        ';

    include 'includes/category_select.php';

    echo '         
        </select>
        <br>
        <label for="image_url">Image URL</label>
                <br>
        <input type="text" class="input" name="image_url" required>
        <br>
        <label for="description">Description</label>
        <textarea id = "description" name="description" required/>Your Post Here</textarea>
        <br>

        <input type="submit" class="btn btn-primary" name="submit" value="Post">
    </form>
    <br>
    <br>
</div>
';
}

include("includes/footer.php");




















