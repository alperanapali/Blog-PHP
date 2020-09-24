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
            <form method="POST">
                <button name="like_button" value="like_button" type="submit" class="btn-primary"> <span><i class="fa fa-heart"></i></span></button>
            </form>
          <p>
              <?php echo $des; ?>
          </p>
        </div>
      </div>
    </div>
  </article>

<!-- Comments -->
<?php

$csql = "Select * FROM comments WHERE post_id = '$id'";
$cresult = mysqli_query($dbcon, $csql);

while ($comment = mysqli_fetch_assoc($cresult)) {

$text = $comment['text'];
$comment_date = $comment['date'];
$poster = $comment['user'];
$poster_image = $comment['profile_pic'];


$html_comment = <<<EOD
<div class="container" >
    <div class="row">
        <div class="col-md-8" style="width:10px; margin:0 auto;">
            <div class="media g-mb-30 media-comment">
                <img class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15" width="40" height="40" src=$poster_image alt="Image Description">
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30" >
                    <div class="g-mb-15">
                        <h5 class="h5 g-color-gray-dark-v1 mb-0" style="font-size: medium"> $poster </h5>
                        <span class="g-color-gray-dark-v4 g-font-size-12" style="font-size:small ">$comment_date</span>
                    </div>
                    <p style="font-size: small">$text</p>           
                </div>
            </div>
        </div>
EOD;
echo $html_comment;

}
include 'includes/footer.php';


?>





