<?php
session_start();

include 'includes/postController.php';
include 'includes/header.php';

?>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto ">
                <div>
                    <img style='height: 100%; width: 100%; object-fit:contain ' src="<?php echo $image_url; ?>" alt="">
                </div>
                <span class="badge badge-primary"><?php echo $category; ?></span>
                <p class="post-meta"><b>Posted by </b><?php echo $by; ?></p>

                <p class="post-meta"><b>On </b><?php echo $time; ?></p>

                <p class="post-meta"><b>Likes: </b><?php echo $hits; ?>

                </p>
                <p>
                    <?php echo $des; ?>
                </p>
            </div>
        </div>
    </div>
</article>

    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-4 mx-auto ">
                <form method="POST">
                    <button name="like_button" value="like_button" type="submit" class="btn-primary"> <span><i class="fa fa-heart"></i></span></button>

                    <label style="color: #0c5460" for="comment_area"><b>Post your comment!</b></label>
                    <textarea id="comment_area" name="comment_area"></textarea>
                    <br>
                    <button name="comment_button" type="submit" value="comment_button"  class="btn-primary"> Post</button>
                </form>
                <br>
                <br>
            </div>
        </div>
    </div>



    <!-- Comments -->
<?php

$csql = "Select * FROM comments WHERE post_id = '$id' AND verified = '1'  ";
$stmt = $conn->query($csql);

while ($comment = $stmt->fetch()) {

    $text = $comment['text'];
    $comment_date = $comment['date'];
    $poster = $comment['user'];
    $poster_image = $comment['profile_pic'];
    $verified = $comment['verified'];


    $html_comment = <<<EOD
        <div class="container">
        <div class="row">
            <div class="col-lg-7 col-4 mx-auto ">
                <div class="card" align="center">
                        <img style='height: 10%; width: 10%; ' src="https://www.pngitem.com/pimgs/m/146-1468479_my-profile-icon-blank-profile-picture-circle-hd.png" alt="">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0" style="font-size: medium"><b>User Name:</b> $poster </h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12" style="font-size:small "> <b>Date:</b> $comment_date</span>
                    
                    <p style="font-size: medium">$text</p>           
                </div>
                </div>
                </div>
   
EOD;
    echo $html_comment;

}
include 'includes/footer.php';






