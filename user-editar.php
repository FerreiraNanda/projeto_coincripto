<h1>Editar Usuário</h1>
<?php
	$sql = "SELECT * FROM marca WHERE id_user=".$_REQUEST["id_user"];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
?>
<form action="?page=user-salvar" method="POST">
<input type="hidden" name="acao" value="editar">
<input type="hidden" name="id_user" value="<?php print $row->id_user; ?>">
<label>Nome do usuário</label>
        <input type="text" name="nome_user" value="<?php print $row->nome_user; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco" value="<?php print $row->endereco; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Cpf</label>
        <input type="text" name="cpf" value="<?php print $row->cpf; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="text" name="email" value="<?php print $row->email; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Saldo</label>
        <div class="input-group">
            <span class="input-group-text">R$</span>
            <input type="text" name="saldo" value="<?php print $row->saldo; ?>" class="form-control">
        </div>
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Enviar</button>
    </div>
</form>