<?php
session_start();
ob_start();
$page_title = $_GET['catname'];
$page_heading = $_GET['catname'];

include 'includes/header.php';
include 'includes/security.php';
?>
<div class="container">
    <?php
    include 'includes/category_index.php';
    ?>
</div>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">

            <?php
            include 'includes/show_category.php';
            ?>

        </div>
    </div>
</div>
<?php

include 'includes/footer.php';
ob_end_flush();
?>
