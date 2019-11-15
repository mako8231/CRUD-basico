<html>
<?php include('include/inc_head.php'); ?>

<div class="container">
    <form action="../controller/adicionar.php" method="POST">
        <div class="form-group">
            <!--campo para o nome-->
            <label for="txtNome">Nome </label>
            <input type="text" class="form-control" name="txtNome" require>
            <!--campo para o e-mail-->
            <label for="txtEmail">Email </label>
            <input type="email" class="form-control" name="txtEmail" require>
            <!--campo para o endereço-->
            <label for="txtEnd">Endereço </label>
            <input type="text" class="form-control" name="txtEnd" require>
            <!--submissão-->
            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
        </div>
    </form>
</div>

<?php include('include/inc_bottom.php'); ?>
</body>
</html>