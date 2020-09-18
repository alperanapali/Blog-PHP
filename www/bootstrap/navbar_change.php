<?php
//insert in <ul>
include 'login.php';

$html_not_loged = <<<EOD
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"></a>
                </li>
EOD;


$html_loged_user = <<<EOD
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"></a>
                </li>
EOD;

$html_loged_admin = <<<EOD
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php"></a>
                </li>
EOD;

if($_SESSION['username']){

}