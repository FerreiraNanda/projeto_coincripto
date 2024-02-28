<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REALIZAR PAGAMENTO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>
    <h1>REALIZAR PAGAMENTO</h1>

    <?php
    include "config.php";
    
    session_start();
    if (!isset($_SESSION['usuario'])) {
        echo "Você precisa estar logado para realizar um pagamento.";
        exit;
    }

    $idUsuario = $_SESSION['usuario']['id_user']; 
    $saldoUsuario = $_SESSION['usuario']['saldo'];

    if (isset($_REQUEST['acao']) && $_REQUEST['acao'] === 'comprar' && isset($_REQUEST['id_cripto'])) {
        $idCripto = $_REQUEST['id_cripto'];

        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = array();
        }
    
        if (!in_array($idCripto, $_SESSION['carrinho'])) {
            $_SESSION['carrinho'][] = $idCripto;
        }
    }
    
    function getValorCriptomoeda($id_cripto, $conn) {
        $sql = "SELECT valor FROM modelo WHERE id_cripto = $id_cripto";
        $res = $conn->query($sql);
        if ($res && $res->num_rows > 0) {
            $row = $res->fetch_assoc();
            return $row['valor'];
        } else {
            return 0;
        }
    }

    $total = 0;
    if (!isset($_SESSION['carrinho']) || empty($_SESSION['carrinho'])) {
        print "<p>Nenhuma criptomoeda comprada.</p>";
    } else {
        $total = 0;
        ?>
        <table class='table table-bordered table-striped table-hover'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Valor R$</th>
            </tr>
            <?php
    
            $ids_cripto = implode(",", $_SESSION['carrinho']);
            $sql = "SELECT id_cripto, nome_cripto, valor FROM modelo WHERE id_cripto IN ($ids_cripto)";
            $res = $conn->query($sql);
    
            if ($res->num_rows > 0) {
                while ($row = $res->fetch_assoc()) {
                    $id_cripto = $row["id_cripto"];
                    $nome_cripto = $row["nome_cripto"];
                    $valor_cripto = $row["valor"];
                    ?>
                    <tr>
                        <td><?php echo $id_cripto; ?></td>
                        <td><?php echo $nome_cripto; ?></td>
                        <td>R$ <?php echo number_format($valor_cripto, 2); ?></td>
                    </tr>
                    <?php
                    $total += $valor_cripto;
                }
            }
            ?>
            <tr>
                <td colspan='2'><strong>Total</strong></td>
                <td><strong>R$ <?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </table>

        <?php
  
        if ($saldoUsuario >= $total) {
            
            echo "<p>Compra finalizada. Seu novo saldo é de R$ " . number_format($saldoUsuario - $total, 2) . "</p>";
   
            unset($_SESSION['carrinho']);
        } else {
            echo "<p>Saldo insuficiente para finalizar a compra.</p>";
        }
    }
    
    $conn->close();
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
