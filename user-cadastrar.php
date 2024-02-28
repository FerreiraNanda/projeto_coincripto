<h1>CADASTRAR USUÁRIO</h1>

<form action = "?page=user-salvar" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Nome do usuário</label>
        <input type="text" name="nome_user" class="form-control">
    </div>
    <div class="mb-3">
        <label>Endereço</label>
        <input type="text" name="endereco" class="form-control">
    </div>
    <div class="mb-3">
        <label>Cpf</label>
        <input type="text" name="cpf" class="form-control">
    </div>
    <div class="mb-3">
        <label>E-mail</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="mb-3">
    <label>Saldo</label>
    <div class="input-group">
        <span class="input-group-text">R$</span>
        <input type="text" name="saldo" class="form-control">
    </div>
</div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control">
    </div>
    <div class = "mb-3">
        <button type = "submit" class="btn btn-success">Enviar</button>
    </div>
</form>