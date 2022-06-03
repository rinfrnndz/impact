<?php

    $server = "localhost";
    $root = "root";
    $pass = "";
    $database = "impactt";

    $connect = mysqli_connect($server, $root, $pass, $database);

    if ($connect) {
        echo "<script>alert('Something's wrong with the connection!')</script>";
        
    }
?>