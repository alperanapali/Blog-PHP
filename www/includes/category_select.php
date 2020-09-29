<?php

$sql_cat = "SELECT * FROM `category`";
$stmt = $conn->query($sql_cat);

while($row = $stmt->fetch())
{
    $category_get = $row['catname'];
    echo "<option>$category_get</option>";

}
