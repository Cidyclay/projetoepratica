<?php
    session_start();
    define('HOST', 'localhost');
    define('ROOT','root');
    define('PASS', '');
    define('BASE','projetoepratica');

    $conn = new mysqli_connect(HOST,ROOT,PASS,BASE);