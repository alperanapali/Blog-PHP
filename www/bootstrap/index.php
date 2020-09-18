<?php
session_start();
ob_start();
$page_title = "Home";
$page_heading = "Pure PHP Blog";
$page_subheading = "by Alper";

include 'includes/header.php';
?>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">

          <?php
              include 'includes/show_posts.php';
          ?>

      </div>
    </div>
  </div>

<?php
include 'includes/footer.php'
?>
ob_end_flush();