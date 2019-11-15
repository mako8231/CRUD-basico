<!DOCTYPE html>
<html>
  <!--Include para todo o header-->
	<?php include('include/inc_head.php'); ?>
  <?php include('../utils/connect.php'); ?>
  <?php include("../model/pessoa.php"); ?>

  <?php $PessoaModel = new Pessoa($conn);
  $rs = $PessoaModel->listar();

  #verificar status:
    if (isset($_GET['status'])){
      #valor do status 
      $status = $_GET['status'];
      #tipo
      $tipo = $_GET['tipo'];

      #tipo de operação:
      if ($tipo==1){
        $operacao = "adicionado";
      } else if ($tipo==2){
        $operacao = "editado";
      } else {
        $operacao = "excluído";
      }

      #verificar se não houve erros:
        if ($status == 1){
          $msg = "Registro $operacao com sucesso!";
          $class = "alert alert-success";
        } else {
          $msg = "Ocorreu um erro!";
          $class = "alert alert-danger";
        }
    }

  ?>

  <div class="container">
  <?php if (isset($_GET['status'])) { ?>
  <div class="<?php echo $class?>"><?php echo $msg?></div>
  <?php }?>
  <a href="adicionar.php" class="btn btn-primary btn-xs pull-right" title="Editar Cadastro"> <i class="fa fa-plus"></i> Adicionar</a>
	
  </div class="">
  <table class="table">
  	<thead>
    <tr>
     	<th scope="col">ID</th>
      <th scope="col">Nome</th>
     	<th scope="col">e-mail</th>
     	<th scope="col">Endereço</th>
		 <th scope="col">Ação</th>
   	 </tr>
  </thead>
  <tbody>
    <!--print dos dados-->
    <?php while ($obj = $rs->fetch_object()) {?>
    <tr>
      <th scope="row"><?php echo $obj->id?></th>
      <td><?php echo $obj->nome?></td>
      <td><?php echo $obj->email?></td>
      <td><?php echo $obj->endereco?></td>
	    <td class="">
      <a href="editar.php?id=<?php echo $obj->id?>" class="btn btn-warning btn-xs pull-left" title="Editar Cadastro"> <i class="fa fa-pencil"></i></a>
      <a href="../controller/delete.php?id=<?php echo $obj->id?>" class="btn btn-danger btn-xs pull-left" title="Editar Cadastro"> <i class="fa fa-trash"></i></a>
      </td>
      <?php }?> 
    </tr>
    
  </tbody>
</table>
 <!--e para o footer-->
	<?php include('include/inc_bottom.php'); ?>
</body>
</html>