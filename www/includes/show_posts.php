<?php
include("connectPDO.php");

// COUNT
$sql = "SELECT COUNT(*) FROM posts";
$stmt = $conn->query($sql);
$numrows = $stmt->fetchColumn();

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
$stmt = $conn->query($sql);

if ($stmt->rowCount() < 1) {
    echo '<div class="w3-panel w3-pale-red w3-card-2 w3-border w3-round">Nothing to display</div>';
}

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    //$des = htmlentities($row['description']);
    $des = $row['description'];
    $posted_by = htmlentities($row['posted_by']);
    $hits = htmlentities($row['hits']);
    $image_url = htmlentities($row['image_url']);
    $time = htmlentities($row['date']);
    $slug = htmlentities($row['slug']);
    $category = htmlentities($row['post_cat']);

    echo sprintf('
    <div class="row mt-lg-5">
        <div class="col-md-7">
          <a href="/post/%s">
            <img class="img-fluid align-content-md-center rounded" src=%s alt="" width="400" height="300">
          </a>
          <hr>
        </div>
        <div class="col-md-5">
          <h3><a href="post/%s">%s</a></h3>
          <span class="badge badge-secondary">%s</span>

          <p>%s</p>
          <p class="post-meta"><b>Posted by</b></p> 
          <a href="#"  >%s</a>
          <p><b>on</b> %s</p>
          <a class="btn btn-primary" href="post/%s">Read More</a>
            <hr>
          </div>
              
      
      ',
    $slug, $image_url, $slug ,$title, $category, substr( $des, 0, 100), $posted_by, $time, $slug);

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
