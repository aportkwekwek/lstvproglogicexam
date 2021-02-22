<?php
    session_start();
    session_destroy();
    setcookie("password", "", time() - 3600);
    header("Location: index.php");
?>