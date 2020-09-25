<?php
if (!isset($_SESSION['username'])) {
    header("location: /login");
    exit();
}