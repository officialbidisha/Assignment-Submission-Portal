<?php
session_start();
include("../includes/db.php");
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']; //has to be logged in
} else
    header("refresh:2; url=login_teacher.php");
if (isset($_GET['sem'])) {
    $sem_sub = $_GET['sem'];
}
?>
<!DOCTYPE html>
<html lang="en">
    
</html>