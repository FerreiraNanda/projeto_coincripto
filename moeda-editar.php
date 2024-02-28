<h1>EDITAR CRIPTOMOEDA</h1>
<?php
	$sql = "SELECT * FROM modelo WHERE id_cripto=".$_REQUEST['id_cripto'];
	$res = $conn->query($sql);
	$row= $res->fetch_object();
?>
<form action="?page=moeda-salvar" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_cripto" value="<?php echo $row->id_cripto; ?>">

    <div class="mb-3">
        <label for="nome_cripto" class="form-label">Moeda</label>
        <input type="text" name="nome_cripto" id="nome_cripto" value="<?php echo $row->nome_cripto; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="empresa" class="form-label">Empresa</label>
        <input type="text" name="empresa" id="empresa" value="<?php echo $row->empresa; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="text" name="valor" id="valor" value="<?php echo $row->valor; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="<?php echo $row->descricao; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" name="foto" id="foto" class="form-control">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>