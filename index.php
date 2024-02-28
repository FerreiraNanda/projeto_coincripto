<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CriptoCoin</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
	  <div class="container-fluid">
	    <a class="navbar-brand" href="#">CriptoCoin</a>
	    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
	        <li class="nav-item">
	          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
	        </li>
	       
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            Usuário
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=user-lista">Listar</a></li>
	            <li><a class="dropdown-item" href="?page=user-cadastrar">Cadastrar</a></li>
				<li><a class="dropdown-item" href="?page=user-login">Login</a></li>
			</li>
	          </ul>
	        </li>
	        <li class="nav-item dropdown">
	          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
	            CriptoMoedas
	          </a>
	          <ul class="dropdown-menu">
	            <li><a class="dropdown-item" href="?page=moeda-lista">Listar</a></li>

	            <li><a class="dropdown-item" href="?page=moeda-cadastrar">Cadastrar</a></li>

				<li><a class="dropdown-item" href="?page=moeda-comprar">Comprar</a></li></li>
	          </ul>
	        </li>  
	      </ul>
	    </div>
	  </div>
	</nav>
	<div class="container mt-3">
		<div class="row">
			<div class="col">
				<?php
					//conexão com o banco de dados
					include('config.php');

					//includes das páginas
					switch (@$_REQUEST['page']) {
						//usuários
						case 'user-lista':
							include('user-lista.php');
							break;
						case 'user-cadastrar':
							include('user-cadastrar.php');
							break;
						case 'user-login':
							include('user-login.php');
							break;
						case 'user-editar':
							include('user-editar.php');
							break;
						case 'user-salvar':
							include('user-salvar.php');
							break;

						//moedas
						case 'moeda-lista':
							include('moeda-lista.php');
							break;
						case 'moeda-cadastrar':
							include('moeda-cadastrar.php');
							break;
						case 'moeda-editar':
							include('moeda-editar.php');
							break;
						case 'moeda-salvar':
							include('moeda-salvar.php');
							break;
						case 'moeda-comprar':
								include('moeda-comprar.php');
								break;
						case 'pagar.php':
								include('pagar.php');
								break;
						
						default:
							print "<h1>Seja bem-vindo!</h1>";
					}
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>

</body>
</html>