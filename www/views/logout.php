<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: / ");
} else {
    session_destroy();
    header("location: /login");
}