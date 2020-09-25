
<table  class="table">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">Category Name</th>
        <th scope="col">Description</th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>
    <tr>
        <?php include 'includes/admin_category_control.php'; ?>
    </tr>

    <h3>Categories</h3>
    <br>
    </tbody>
</table>
<div class="container" align="left">
    <form class="container" method="POST">
            <label for="new_category">Add New Category</label>
        <br>
            <input type="text" name="new_categogry" placeholder="Category Name" required>
            <br>
            <textarea id = "submit_new_category" name="submit_new_category" required/>Category Description</textarea>
            <br>
            <input type="submit" class="btn btn-primary" name="submit_cat" value="Post">

    </form>
</div>
<br>
<h3>Comments</h3>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col"></th>
        <th scope="col">User Name</th>
        <th scope="col">Date</th>
        <th scope="col">Text</th>
        <th scope="col">Verified</th>
        <th scope="col"></th>

    </tr>
    </thead>
    <tbody>
    <tr>
       <?php include 'includes/comment_control.php'; ?>
    </tr>
    </tbody>
</table>
