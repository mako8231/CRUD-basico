<html>
<?php include('include/inc_head.php'); 
include("../utils/connect.php");
require("../model/pessoa.php");

#verificar se a var $id existe:
if(!isset($id)){
    #Pega o id passado pela URL
    $id = $_GET['id'];
}


#se o id estiver vazio:
if (empty($id)){
    #redirecionar para a página inicial
    header("Location: index.php");
    exit();
} else {
    #instanciar a classe 
    $PessoaModel = new Pessoa($conn);
    #Buscar o registro individual
    $rs = $PessoaModel->listarPorId($id);
    #Tornar a consulta em um objeto
    $obj = $rs->fetch_object();
}

?>

<div class="container">
    <form action="../controller/editar.php" method="POST">
        <div class="form-group">
            <!--campo para o nome-->
            <label for="txtNome">Nome </label>
            <input type="text" class="form-control" name="txtNome" value="<?php echo $obj->nome?>" require>
            <!--campo para o e-mail-->
            <label for="txtEmail">Email </label>
            <input type="email" class="form-control" name="txtEmail" value="<?php echo $obj->email?>" require>
            <!--campo para o endereço-->
            <label for="txtEnd">Endereço </label>
            <input type="text" class="form-control" name="txtEnd" value="<?php echo $obj->endereco?>" require>
            <input type="hidden" name="txtId" value="<?php echo $obj->id?>">
            <!--submissão-->
            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
        </div>
    </form>
</div>

<?php include('include/inc_bottom.php'); ?>
</body>
</html>