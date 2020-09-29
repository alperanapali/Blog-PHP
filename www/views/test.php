<?php
include 'includes/connectPDO.php';


$stmt = $conn->query('SELECT * FROM posts');
while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo $row['title'] . '<br>';
}


