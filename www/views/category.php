<?php
session_start();
ob_start();
$re = '/\?.+/m';

$uri = $_SERVER['REQUEST_URI'];
$explode = explode('/',$uri);
$slug = preg_replace($re, '', $explode[2]);


$page_title = preg_replace($re, '',$slug);
$page_heading = preg_replace($re, '',$slug);

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
