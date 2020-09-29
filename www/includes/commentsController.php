<?php
//Adding a comment
echo "<br>";
include 'includes/connect.php';

if (isset($_POST['submit'])) {
    $comment = mysqli_real_escape_string($dbcon, $_POST['comment']);
    $comment_date = date('Y-m-d H:i');
    $comment_by = mysqli_real_escape_string($dbcon, $_SESSION['username']);

    $comment_sql = "INSERT INTO `comments` (`id`, `user`, `text`, `post_id`, `verified`, `date`) VALUES (NULL, $comment_by, $comment, $id, '1', $comment_date);";

    mysqli_query($dbcon, $comment_sql) or die("failed to post" . mysqli_connect_error());


}

echo '
    <form class="w3-container" method="POST">
        <label>Write a comment:</label>

        <input type="text" class="w3-input w3-border" name="comment" required>
        <br>
        
        <input type="submit" class="w3-btn w3-teal w3-round" name="comment_submit" value="Comment">
    </form>
    ';

