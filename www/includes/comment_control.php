<?php
if (!isset($_SESSION['is_admin'])) {
    header("location: /login");
    exit();
}


$csql = "Select * FROM comments ORDER BY date DESC ";
$stmt = $conn->query($csql);

while ($comment = $stmt->fetch()) {

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

        <td><input class="btn" name="verify_button" id="$id"  type="submit"><span><i class="fa fa-check"></i></span> </input>
    </tr>
EOD;

    echo $html;
}

if (!isset($_POST['verify_button'])) {
    echo $_POST['id'];

}

