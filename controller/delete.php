<?php

include("../utils/connect.php");
require("../model/pessoa.php");

$PessoaModel = new Pessoa($conn);

if (isset($_GET['id'])){
    #pega o valor do GET
    $id = $_GET['id'];

    #excluir o registro 
    $rs = $PessoaModel->delete($id);

    #verificar a resposta 
    if ($rs===TRUE){
        $status = 1;
    } else {
        $status = 0;
    }
    $conn->close();
    header("Location: ../view/index.php?status=$status&tipo=3");
}



?>