<?php

include("connect.php");

//$page_title = "Home";
//$page_heading = "Pure PHP Blog";
//$page_subheading = "by Alper";

$id = (INT)$_GET['id'];
if ($id < 1) {
    header("location: index.php");
}
$sql = "Select * FROM posts WHERE id = '$id'";
$result = mysqli_query($dbcon, $sql);

$invalid = mysqli_num_rows($result);
if ($invalid == 0) {
    header("location: index.php");
}

$hsql = "UPDATE posts SET hits = hits +1 WHERE id = '$id'";
mysqli_query($dbcon, $hsql);

$hsql = "SELECT * FROM posts WHERE id = '$id'";
$res = mysqli_query($dbcon, $hsql);
$hits = mysqli_fetch_row($res);

$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$title = $row['title'];
$des = $row['description'];
$by = $row['posted_by'];
$hits = $row['hits'];
$time = $row['date'];

echo '<div class="w3-container w3-sand w3-card-4">';

echo "<h2>$title</h2>";
echo '<div class="w3-panel w3-leftbar w3-rightbar w3-border w3-sand w3-card-3">';
echo "$des<br>";
echo '<div class="w3-text-grey">';
echo "Posted by: " . $by . "<br>";
echo "Views: " . $hits[0] . "<br>";
echo "$time</div>";

//Comments
echo '</div><h3>Comments:</h3></div>';

$csql = "Select * FROM comments WHERE post_id = '$id'";
$cresult = mysqli_query($dbcon, $csql);

while ($comment = mysqli_fetch_assoc($cresult)) {

    $text = $comment['text'];
    $comment_date = $comment['date'];
    $poster = $comment['user'];

    echo '<div class="w3-container w3-border w3-sand w3-card-4">';
    echo "$text<br>";
    echo '<div class="w3-text-grey">';
    echo "Comment by: " . $poster . "<br>";

    echo "$comment_date</div>";
    echo '</div></div>';
}
?>

<?php
//Adding a comment
echo "<br>";

if (isset($_POST['comment_submit'])) {
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

?>





<?php
if (isset($_SESSION['username'])) {
    ?>
    <br>
    <div class="w3-text-green"><a href="edit.php?id=<?php echo $row['id']; ?>">[Edit]</a></div>
    <div class="w3-text-red">
        <a href="del.php?id=<?php echo $row['id']; ?>"
           onclick="return confirm('Are you sure you want to delete this post?'); ">[Delete]</a></div>
    <?php
}
echo '</div></div>';