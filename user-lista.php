<h1>LISTAR USUÁRIOS</h1>
<?php 
    $sql = "SELECT * FROM marca ";

    $res = $conn->query($sql);
    
    $qtd = $res->num_rows;

    if($qtd>0){
        print"<p>Resultado(s) <b>$qtd</b> encontrado(s).</p>";
        print"<table class = 'table table-bordered table-striped table-hover'>";
        print"<tr>";
        print"<th>ID</th>";
        print "<th>Nome do usuário</th>";
        print "<th>Endereco</th>";
        print "<th>Cpf</th>";
        print "<th>E-mail</th>";
        print "<th>saldo</th>";
        print "<th>Ações</th>";
        print"</tr>";  
        while($row = $res->fetch_object()){
            print"<tr>";
            print "<td>".$row -> id_user."</td>";
            print "<td>".$row -> nome_user."</td>";
            print "<td>".$row -> endereco."</td>";
            print "<td>".$row -> cpf."</td>";
            print "<td>".$row -> email."</td>";
            print "<td>".$row -> saldo."</td>";
            print "<td>
            <button onclick=
            \"location.href='?page=user-editar&id_user=".$row->id_user."';\" class='btn btn-primary'>Editar</button>
            
            <button onclick=\"if(confirm('Tem certeza que deseja realizar a exclusão?')){location.href='?page=user-salvar&acao=excluir&id_user=".$row->id_user."';}else{false;}\"class ='btn btn-danger'>Excluir</button>
                  </td>";
            print"</tr>";     
        }
        print"</table>";
    }else{
        print "<p class = 'alert alert-danger'>Resultados não encontrados!</p>";
    }
?>

