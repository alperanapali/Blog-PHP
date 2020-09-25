<?php
$user = $_SESSION['username'];

$page_title = $user;
$page_subheading = "Welcome to your profile ".$user;

include 'includes/connect.php';
include 'includes/header.php';

$csql = "Select * FROM users WHERE username = '$user'";
$cresult = mysqli_query($dbcon, $csql);

if (isset($_POST['d_button'])) {
    $dsql = "DELETE FROM `users` WHERE `users`.`username` = $user" ;
    $dresult = mysqli_query($dbcon, $dsql);
}

$role = "User";
if ($_SESSION['is_admin']){
    $role = "Admin";
}



while ($us = mysqli_fetch_assoc($cresult)) {


    $email = $us['email'];
    $join_date = $us['date'];
    $profile_pic = $us['profile_pic'];

    $html = <<<EOD
<div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto ">
            <div>
                <img style='height: 30%; width: 30%; object-fit:contain ' src="$profile_pic" alt="">
            </div>
            <a  class='badge badge-info'> Role: $role </a>
            <span class="badge badge-primary"><?php echo $category; ?></span>
            <p class="post-meta"><b>User Name: </b>$user</p>

            <p class="post-meta"><b>Joined On </b>$join_date</p>

            <p class="post-meta"><b>Email: </b>$email

            </p>
            <button name="d_button" value="d_button" type="submit" class="btn-danger"> <span><i class="fa fa-bomb"></i></span>Deactivate</button>

        </div>
      </div>
    </div>
<br>
EOD;

    echo "$html";

}