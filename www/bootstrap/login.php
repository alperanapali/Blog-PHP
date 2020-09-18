<?php
session_start();
ob_start();
Include("includes/header.php");
Include("includes/connect.php");

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
        header("location: index.php");
    } else {
        echo "incorrect details";
    }
} else {
    ?>
    <div class="w3-container w3-teal row mt-lg-5 col-md-7">Login</div>
    <form action="" method="POST" class="w3-container">
        <label>Username </label>
        <input type="text" name="username" class="w3-input w3-border">
        <br>
        <label>Password</label>
        <input type="password" name="password" class="card-text">
        <input type="submit" name="log" value="Login" class="w3-btn w3-teal">
    </form>
    <?php
}
Include("includes/footer.php");
ob_end_flush();