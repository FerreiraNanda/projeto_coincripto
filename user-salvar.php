<?php
if(isset($_REQUEST["acao"])){
switch  ($_REQUEST["acao"]) {
    case 'cadastrar':
        $nome_user = $_POST["nome_user"];
        $endereco = $_POST["endereco"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $saldo = $_POST["saldo"];
        $senha = md5($_POST["senha"]);

        $sql = "INSERT INTO marca(nome_user, endereco, cpf, email, saldo, senha) VALUES('{$nome_user}', '{$endereco}', '{$cpf}', '{$email}', '{$saldo}', '{$senha}')";

        $res = $conn->query($sql);

        if($res==true){
            print"<script>alert('Cadastro realizado com sucesso!');</script>";
            print"<script>location.href='?page=user-lista';</script>";
        }
        else{
            print"<script>alert('Cadastro não realizado.');</script>";
            print"<script>location.href='?page=user-lista';</script>";
        }

    break;

    case 'editar':
        $nome = $_POST["nome_user"];
        $endereco = $_POST["endereco"];
        $cpf = $_POST["cpf"];
        $email = $_POST["email"];
        $saldo = $_POST["saldo"];
        $senha = md5($_POST["senha"]);
    
        $sql = "UPDATE marca SET
                    nome_user = '{$nome}',
                    endereco = '{$endereco}',
                    cpf = '{$cpf}',
                    email = '{$email}',
                    saldo = '{$saldo}', 
                    senha = '{$senha}'
                WHERE
                    id_user = ".$_REQUEST["id_user"];
    
        $res = $conn->query($sql);

        if($res==true){
            print"<script>alert('Edição realizada com sucesso!');</script>";
            print"<script>location.href='?page=user-lista';</script>";
        }
        else{
            print"<script>alert('Edição não realizada.');</script>";
            print"<script>location.href='?page=user-lista';</script>";
        }
        break;
        case 'excluir':
            $sql = "DELETE FROM marca WHERE id_user=".$_REQUEST['id_user'];

            $res = $conn->query($sql);
            
            if($res==true){
                print"<script>alert('Exclusão realizada com sucesso!');</script>";
                print"<script>location.href='?page=user-lista';</script>";
            }else{
                print"<script>alert('Não foi possível realizar a exclusão.');</script>";
                print"<script>location.href='?page=user-lista';</script>";
            }
        break;
}
}
else{
    print "Ação não executada";
}
?>