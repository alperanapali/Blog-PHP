<?php
session_start();
ob_start();
include("includes/header.php");
include("includes/connect.php");

if (isset($_POST['log'])) {
    $username = mysqli_real_escape_string($dbcon, $_POST['username']);
    $password = mysqli_real_escape_string($dbcon, $_POST['password']);
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($dbcon, $sql);
    $rows = mysqli_num_rows($result);
    $fetch_result = mysqli_fetch_assoc($result);

    if ($rows == 1 && ($password == $fetch_result['password'])) {
        $_SESSION['username'] = $username;
        if ($fetch_result['is_admin']){
            $_SESSION['is_admin'] = true;
        }else{
            $_SESSION['is_admin'] = false;
        }
        header("location:/");
    } else {
        echo "incorrect details";
    }
} else {
    ?>
    <div class="container" align="center"><h3>Login</h3></div>
    <form action="/login" method="POST" class="container" align="center">
        <label> </label>
        <input type="text" name="username" class="form-control" placeholder="User Name">
        <br>
        <label></label>
        <input type="password" name="password" class="form-control" placeholder="Password">
        <br>
        <input type="submit" name="log" value="Login" class="btn btn-primary">
    </form>
    <?php
}
include("includes/footer.php");
ob_end_flush();
