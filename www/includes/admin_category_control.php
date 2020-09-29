<?php
if (!isset($_SESSION['is_admin'])) {
    header("location: /login");
    exit();
}
include 'includes/connectPDO.php';
include 'includes/header.php';

if (isset($_POST['submit_cat'])) {
    $cat_name_post = $_POST['new_categogry'];
    $cat_name_des = $_POST['submit_new_category'];


    $cat_sql = "INSERT INTO `category` (`id`, `catname`, `description`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($cat_sql);
    $stmt->execute([NULL, $cat_name_post, $cat_name_des]);
}


$csql = "Select * FROM category ORDER BY id ";
$stmt = $conn->query($csql);

while ($comment = $stmt->fetch()) {

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

