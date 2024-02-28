<h1>Cadastrar Modelo</h1>	

<form action="?page=moeda-salvar" method="POST" enctype="multipart/form-data">

	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Moeda</label>
		<input type="text" name="nome_cripto" class="form-control">
	</div>
	<div class="mb-3">
		<label>Empresa</label>
		<input type="text" name="empresa" class="form-control">
	</div>
	<div class="mb-3">
		<label>Valor</label>
	<div class="input-group">
        <span class="input-group-text">R$</span>
		<input type="text" name="valor" class="form-control">
	</div>
	<div class="mb-3">
		<label>Descrição</label>
		<input type="text" name="descricao" class="form-control">
	</div>
	<div class="mb-3">
		<label>Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Enviar</button>
	</div>
</form>