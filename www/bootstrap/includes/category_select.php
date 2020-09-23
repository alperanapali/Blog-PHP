<?php

$sql_cat = "SELECT * FROM `category`";
$result = mysqli_query($dbcon, $sql_cat);

while($row = mysqli_fetch_assoc($result))
{
    $category_get = $row['catname'];
    echo "<option>$category_get</option>";

}

?>
