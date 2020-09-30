<?php
$page_heading = "Register Now!";
include 'includes/header.php';
include 'includes/connectPDO.php';

function registry_entries_modifier($entry, $password = false)
{
    $entry = strip_tags($entry); //removes tags for unwanted html

    if (!$password) { // does not remove the blanks if its password since it might be the users choice
        $entry = str_replace(' ', '', $entry); //removes blanks
        $entry = ucfirst(strtolower($entry)); // lower case , first letter upper
    }
    return $entry;
}

function does_entry_exist($username, $email, $conn)
{
    $sql = "SELECT * FROM users WHERE username='$username' OR  email='$email'";
    $stmt = $conn->query($sql);
    $r = $stmt->fetch();
    if ($r['username'] === $username) {
        echo "Password already exist";
    } else if ($r['email'] === $email) {
        echo "Email already exist";
    }

    echo $r['username'], $username;
}

function does_registry_entries_match($entry, $confirm_entry, $type = ['password', 'email'])
{
    if ($entry == $confirm_entry) {
        if ($type == 'email') {
            filter_var($entry, FILTER_VALIDATE_EMAIL);
            return $entry;
        }
        if ($type == 'password') {
            return $entry;
        }
    } else {
        echo  $type." does not match";
    }

}


if (isset($_POST['reg'])) {

    $username = registry_entries_modifier($_POST['username']);
    $email = registry_entries_modifier($_POST['email']);
    $confirm_email = registry_entries_modifier($_POST['confirm_email']);
    $password = registry_entries_modifier($_POST['password'], true);
    $confirm_password = registry_entries_modifier($_POST['confirm_password'], true);

    $em = does_registry_entries_match($email, $confirm_email, 'email');
    $pass = does_registry_entries_match($password, $confirm_password, 'password');

    does_entry_exist($username, $email, $conn);

}


?>


<div class="container-md" align="center"><h3>Register</h3></div>
<form action="/register" method="POST" class="container" align="center">
    <input type="text" name="username" class="w3-input w3-border" placeholder="User Name" required>
    <br>
    <br>
    <input type="email" name="email" class="card-text" placeholder="Email" required>
    <input type="email" name="confirm_email" class="card-text" placeholder=" Confirm Email" required>
    <br>
    <br>

    <input type="password" name="password" class="card-text" placeholder="Password" required>
    <input type="password" name="confirm_password" class="card-text" placeholder="Confirm Password" required>
    <br>
    <br>
    <input type="submit" name="reg" value="Register" class="btn btn-primary">
</form>
