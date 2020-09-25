<?php
if (!isset($_SESSION['is_admin'])) {
    header("location: /login");
    exit();
}
include 'includes/connect.php';
include 'includes/header.php';

if (isset($_POST['submit_cat'])) {
    $cat_name_post = mysqli_real_escape_string($dbcon, $_POST['new_categogry']);
    $cat_name_des = mysqli_real_escape_string($dbcon, $_POST['submit_new_category']);


    $cat_sql = "INSERT INTO `category` (`id`, `catname`, `description`) VALUES (NULL, '$cat_name_post', '$cat_name_des')";
    mysqli_query($dbcon, $cat_sql);
}




$csql = "Select * FROM category ORDER BY id ";
$cresult = mysqli_query($dbcon, $csql);

while ($comment = mysqli_fetch_assoc($cresult)) {

    $cat_id = $comment['id'];
    $cat_name = $comment['catname'];
    $desc = $comment['description'];

    $html = <<<EOD
        <tr>
        <th scope="row" > $cat_id</th>
        <td>$cat_name</td>
        <td>$desc</td>
    </tr>
EOD;

    echo $html;
}

