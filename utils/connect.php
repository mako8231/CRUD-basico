<?php
    #configuração com todos os parâmetros de acesso
    $server = "localhost";
    $username = "root";
    $pass = "";
    $db = "crud";

    #conectando ao servidor 
    $conn = new mysqli($server, $username, $pass, $db);

    #testando se a conecção funciona 
    if ($conn->connect_error){
        die("Falha na conecção ". $conn->connect_error);
    }
