<?php
        session_start();
        //logout
        session_destroy();
        // arahkan ke halaman login
        header("location: login.php");
?>
