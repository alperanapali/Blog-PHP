<?php
if (!isset($_SESSION['is_admin'])) {
    header("location: /login");
    exit();
}


$csql = "Select * FROM comments ORDER BY date DESC ";
$cresult = mysqli_query($dbcon, $csql);

while ($comment = mysqli_fetch_assoc($cresult)) {

    $text = $comment['text'];
    $comment_date = $comment['date'];
    $poster = $comment['user'];
    $poster_image = $comment['profile_pic'];
    $verified = $comment['verified'];
    $id = $comment['id'];

    $html = <<<EOD
        <tr>
        <th scope="row" > $id</th>
        <td>$poster</td>
        <td>$comment_date</td>
        <td>$text</td>
        <td>$verified</td>

        <td><button name="verify_button" value="verify_button" type="submit" class="btn-toolbar"><span><i class="fa fa-check"></i></span> </button>
    </tr>
EOD;

    echo $html;
}

?>