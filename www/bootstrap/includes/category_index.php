<?php
include("connect.php");

$sql_cat = "SELECT * FROM `category`";
$result = mysqli_query($dbcon, $sql_cat);

while($row = mysqli_fetch_assoc($result))
{
    $category_get = $row['catname'];
    echo sprintf("
    <a href='category.php?catname=%s' class='badge badge-secondary'> $category_get </a>", $category_get )
    ;

}

?>
