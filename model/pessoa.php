<?php
class Pessoa {
    public $conn;
    public $tabela = "pessoa";

    #construtor 
    public function Pessoa($conn){
        $this->conn = $conn;
    }

    #crud: read
    public function listar(){
        $sql = "select * from $this->tabela";
        return $this->conn->query($sql);
    }

    public function listarPorId($id){
        $sql = "select * from $this->tabela where id=$id";
        return $this->conn->query($sql);
    }

    #crud: create
    public function add($nome, $email, $endereco){
        $sql = "insert into $this->tabela(nome, email, endereco)
                values('$nome', '$email', '$endereco')";
        return $this->conn->query($sql);
    }

    #crud: update
    public function update($id, $nome, $email, $endereco){
        $sql = "update $this->tabela set nome='$nome', email='$email', endereco='$endereco' 
                where id = $id";
        return $this->conn->query($sql);
    }

    #crud: delete
    public function delete($id){
        $sql = "delete from $this->tabela where id=$id";
        return $this->conn->query($sql);
    }
}

?>