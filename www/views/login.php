<?php
session_start();
ob_start();
include("includes/header.php");
include("includes/connectPDO.php");

if (isset($_POST['log'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    $rows = $stmt->rowCount();
    $fetch_result = $stmt->fetch();

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
