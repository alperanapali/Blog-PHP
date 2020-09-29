<?php
include("connectPDO.php");

$sql_cat = "SELECT * FROM `category`";
$stmt = $conn->query($sql_cat);

while($row = $stmt->fetch())
{
    $category_get = $row['catname'];
    echo sprintf("
    <a href='/categories/%s' class='badge badge-secondary'> $category_get </a>", $category_get );
}
