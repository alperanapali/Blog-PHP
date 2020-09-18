<?php
include("connect.php");

// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($dbcon, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];

$rowsperpage = 5;
$totalpages = ceil($numrows / $rowsperpage);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}

if ($page > $totalpages) {
    $page = $totalpages;
}

if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($dbcon, $sql);

if (mysqli_num_rows($result) < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">Nothing to display</div>';
}

while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    //$des = htmlentities($row['description']);
    $des = $row['description'];
    $posted_by = htmlentities($row['posted_by']);
    $time = htmlentities($row['date']);

    echo sprintf('<div class="post-preview">
          <a href="postController.php?id=%1s">
            <h2 class="post-title">
            %s
    </h2>
            <h3 class="post-subtitle">
    %s
    </h3>
          </a>
          </p><div class="w3-text-teal">
          <a href="postController.php?id=%1s">Read more...</a>
          </div>
          <p class="post-meta">Posted by
    <a href="#">%s</a>
    on %s</p>
        </div>',
        $id, $title, substr($des, 0, 200000), $id, $posted_by, $time);
}

echo "<div class='w3-bar w3-center'>";
if ($page > 1) {
    echo "<a href='?page=1'>&laquo;</a>";
    $prevpage = $page - 1;
    echo "<a href='?page=$prevpage' class='w3-btn'><</a>";
}
$range = 5;
for ($x = $page - $range; $x < ($page + $range) + 1; $x++) {
    if (($x > 0) && ($x <= $totalpages)) {
        if ($x == $page) {
            echo "<div class='btn btn-primary'>$x</div>";
        } else {
            echo "<a href='?page=$x' class='btn btn-primary'>$x</a>";
        }
    }
}