<h1>LISTAR MOEDA</h1>

<?php 
    $sql = "SELECT * FROM modelo";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;

    if($qtd > 0) {
        print "<p>Resultado(s) <b>$qtd</b> encontrado(s).</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>ID</th>";
        print "<th>Usuário</th>";
        print "<th>Empresa</th>";
        print "<th>Valor R$</th>";
        print "<th>Descrição</th>";
        print "<th>Foto</th>";
        print "<th>Ação</th>";
        print "</tr>";  
        while($row = $res->fetch_object()) {
            print "<tr>";
            print "<td>".$row->id_cripto."</td>";
            print "<td>".$row->nome_cripto."</td>";
            print "<td>".$row->empresa."</td>";
            print "<td>".$row->valor."</td>";
            print "<td>".$row->descricao."</td>";
        
            print "<td><img src='".$row->foto."' style='max-width: 100px; max-height: 100px;' /></td>";
            print "<td>
                    <button onclick=\"location.href='?page=moeda-editar&id_cripto=".$row->id_cripto."';\" class='btn btn-primary'>Editar</button>
                    <button onclick=\"if(confirm('Tem certeza que deseja realizar a exclusão?')){location.href='?page=moeda-salvar&acao=excluir&id_cripto=".$row->id_cripto."';}else{false;}\" class='btn btn-danger'>Excluir</button>
                  </td>";
            print "</tr>";     
        }
        print "</table>";
    } else {
        print "Resultado(s) não encontrado(s).";
    }
?>
