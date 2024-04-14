<?php

    $conn = mysqli_connect("localhost", "root", "", "loja_virtual");
    if(!$conn) {
        die("Erro de conexão: " . mysqli_connect_error());
    } 
    session_start();
?>


