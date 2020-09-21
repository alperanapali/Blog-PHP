<?php
include 'includes/header.php';

function registry_entries_modifier($entry, $password = false)
{
    $entry = strip_tags($entry); //removes tags for unwanted html

    if(!$password){ // does not remove the blanks if its password since it might be the users choice
        $entry = str_replace(' ', '', $entry); //removes blanks
        $entry = ucfirst(strtolower($entry)); // lower case , first letter upper
    }
    return $entry;
}

function does_registry_entries_match($entry, $confirm_entry, $type = ['password', 'email'])
{
    if($entry == $confirm_entry){
        filter_var($entry, FILTER_VALIDATE_EMAIL);
    }

}


if(isset($_POST['reg'])){

    $username = registry_entries_modifier($_POST['username']);
    $email = registry_entries_modifier($_POST['email']);
    $confirm_email = registry_entries_modifier($_POST['confirm_email']);
    $password = registry_entries_modifier($_POST['password'], true);
    $confirm_password = registry_entries_modifier($_POST['confirm_password'], true);

}


?>


<div class="container-md" align="center"><h3>Register</h3></div>
<form action="register.php" method="POST" class="container" align="center">
    <input type="text" name="username" class="w3-input w3-border" placeholder="User Name">
    <br>
    <br>
    <input type="email" name="email" class="card-text" placeholder="Email">
    <input type="email" name="confirm_email" class="card-text" placeholder=" Confirm Email">
    <br>
    <br>

    <input type="password" name="password" class="card-text" placeholder="Password">
    <input type="password" name="confirm_password" class="card-text" placeholder="Confirm Password">
    <br>
    <br>
    <input type="submit" name="reg" value="Register" class="btn btn-primary">
</form>
