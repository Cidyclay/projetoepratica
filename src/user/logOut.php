<?php 
    session_start();
    session_destroy();
    header("location:/src/login.php", true, 302);
