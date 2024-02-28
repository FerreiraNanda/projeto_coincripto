<?php
include "config.php";
session_start();

$sql = "SELECT * FROM modelo";
$res = $conn->query($sql);
$qtd = $res->num_rows;


if ($qtd > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COMPRAR CRIPTOMOEDAS</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
         
        </style>
    </head>
    <body>
        <h1>COMPRAR CRIPTOMOEDAS</h1>
        <p>Resultado(s) <b><?php print $qtd; ?></b> encontrado(s).</p>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Empresa</th>
                <th>Valor R$</th>
                <th>Descrição</th>
                <th>Foto</th>
                <th>Ação</th>
            </tr>
            <?php

            while ($row = $res->fetch_object()) {
                ?>
                <tr>
                    <td><?php print $row->id_cripto; ?></td>
                    <td><?php print $row->nome_cripto; ?></td>
                    <td><?php print $row->empresa; ?></td>
                    <td><?php print $row->valor; ?></td>
                    <td><?php print $row->descricao; ?></td>
                    <td><img src="<?php print $row->foto; ?>" style="max-width: 100px; max-height: 100px;"></td>
                    <td>
                        <button onclick="adicionarAoCarrinho(<?php print $row->id_cripto; ?>);" class="btn btn-primary">Adicionar</button>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <button onclick="finalizarCompra()" class="btn btn-success">Finalizar Compra</button>
<script>
    function finalizarCompra() {
        if (confirm('Deseja finalizar a compra?')) {
            window.location.href = "pagar.php";
        }
    }
</script>

        <script>
            function adicionarAoCarrinho(idCripto) {
                var confirmacao = confirm('Deseja adicionar ao carrinho?');
                if (confirmacao) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            alert('Criptomoeda adicionada ao carrinho!');
                        }
                    };
                    xhttp.open('GET', '?page=pagar.php&acao=comprar&id_cripto=' + idCripto, true);
                    xhttp.send();
                }
            }
        </script>
    </body>
    </html>
    <?php
} else {
 
    print "Nenhum resultado encontrado.";
}
?>
