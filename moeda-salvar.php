<?php
session_start();
switch ($_REQUEST["acao"]) {
    case 'cadastrar':
        if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK && !empty($_FILES["foto"]["tmp_name"])) {
            $diretorio = "./imagem/";
            $nomeFoto = $diretorio . basename($_FILES["foto"]["name"]);

            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $nomeFoto)) {
                $caminhoFoto = "imagem/" . $_FILES["foto"]["name"];
                
                $sql = "INSERT INTO modelo (
                            nome_cripto,
                            empresa,
                            valor,
                            descricao,
                            foto
                        ) VALUES (
                            '".$_POST["nome_cripto"]."',
                            '".$_POST["empresa"]."',
                            '".$_POST["valor"]."',
                            '".$_POST["descricao"]."',
                            '".$caminhoFoto."'
                        )";

                $res = $conn->query($sql);

                if($res == true) {
                    echo "<script>alert('Cadastrou com sucesso!');</script>";
                    echo "<script>location.href='?page=moeda-lista';</script>";
                } else {
                    echo "<script>alert('Não foi possível cadastrar!');</script>";
                    echo "<script>location.href='?page=moeda-lista';</script>";
                }
            } else {
                echo "Erro ao fazer upload do arquivo.";
            }
        }
        break;

        case 'editar':
           
            if (isset($_POST["nome_cripto"], $_POST["empresa"], $_POST["valor"], $_POST["descricao"], $_POST['id_cripto'])) {
                $id_cripto = $_POST['id_cripto'];
                $nome_cripto = $_POST["nome_cripto"];
                $empresa = $_POST["empresa"];
                $valor = $_POST["valor"];
                $descricao = $_POST["descricao"];
        
                if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] === UPLOAD_ERR_OK && !empty($_FILES["foto"]["tmp_name"])) {
                    $diretorio = "./imagem/";
                    $nomeNovaFoto = $diretorio . basename($_FILES["foto"]["name"]);
        
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $nomeNovaFoto)) {
                        $caminhoNovaFoto = "imagem/" . $_FILES["foto"]["name"];
        
                        $sql = "UPDATE modelo SET nome_cripto=?, empresa=?, valor=?, descricao=?, foto=? WHERE id_cripto=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("sssssi", $nome_cripto, $empresa, $valor, $descricao, $caminhoNovaFoto, $id_cripto);
                    } else {
                        echo "Erro ao fazer upload da nova imagem.";
                        exit; 
                    }
                } else {
    
                    $sql = "UPDATE modelo SET nome_cripto=?, empresa=?, valor=?, descricao=? WHERE id_cripto=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ssssi", $nome_cripto, $empresa, $valor, $descricao, $id_cripto);
                }
        
            
                if ($stmt->execute()) {
                    echo "<script>alert('Editou com sucesso!');</script>";
                    echo "<script>location.href='?page=moeda-lista';</script>";
                } else {
                    echo "<script>alert('Erro ao editar!');</script>";
                    echo "<script>location.href='?page=moeda-lista';</script>";
                }
            } else {
                echo "Dados do formulário não foram recebidos corretamente.";
            }
            break;
        
    case 'excluir':
        $sql = "DELETE FROM modelo WHERE id_cripto=".$_REQUEST['id_cripto'];

        $res = $conn->query($sql);

        if($res == true) {
            echo "<script>alert('Excluiu com sucesso!');</script>";
            echo "<script>location.href='?page=moeda-lista';</script>";
        } else {
            echo "<script>alert('Não foi possível excluir!');</script>";
            echo "<script>location.href='?page=moeda-lista';</script>";
        }
        break;
    }

?>
