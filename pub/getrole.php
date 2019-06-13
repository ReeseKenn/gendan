<?php
    session_start();
    $role = $_SESSION['role'];
    echo $role;
?>