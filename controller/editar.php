<?php
#importando a conexão com o banco e o modelo de classe
include("../utils/connect.php");
require("../model/pessoa.php");

#crie um objeto que insira dados no banco 
$PessoaMod = new Pessoa($conn);

#verifica se o $_POST está válido
if(!empty($_POST)){
    #Atribui os valores enviados 
    $nome = $_POST['txtNome'];
    $email = $_POST['txtEmail'];
    $endereco = $_POST['txtEnd'];
    $id = $_POST['txtId'];


    #operação (1: Adicionar, 2: deletar)
    $tipo = 2; 

    #chama a função de adição ao banco de dados
    $rs = $PessoaMod->update($id, $nome, $email, $endereco);

    #Pega o id inserido 
    $id = $conn->insert_id;

    #verifica a resposta do banco de dados 
    if($rs === TRUE){
        $status = 1;
    } else {
        $status = 0;
    }

    #echo($conn->error);
    echo($status);
    $conn->close();
    header("Location: ../view/index.php?status=$status&tipo=$tipo");
}

?>