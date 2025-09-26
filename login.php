<?php

    session_start();
	if(isset($_SESSION["logado"]) && $_SESSION["logado"] === true){
		header("Location: index.php");
		exit;
	}
	$mensagemErro="";

	if($_SERVER["REQUEST_METHOD"]==="POST"){
		$conexao=new mysqli("localhost", "root", "", "tcc");

		if($conexao->connect_error){
			die("Erro na conexão: ".$conexao->connect_error);
		}
		
		$username=trim($_POST["username"]);
		$senha=$_POST["senha"];

		$stmt=$conexao->prepare("SELECT * FROM `usuaria` WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
		$resultado=$stmt->get_result();

		if ($linha = $resultado->fetch_assoc()) {
			if(password_verify($senha, $linha["senha"])){
				session_regenerate_id(true);
				$_SESSION["username"] = $linha["username"];
				$_SESSION["nome"]=$linha["nome"];
				$_SESSION["logado"]=true;
				$stmt->close();
				$conexao->close();
				header("Location: index.php");
				exit;
			}
		}
		$mensagemErro="Username e/ou Senha inválidos!";
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="vars.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-queries.css">
</head>
<body>
	<?php if(!empty($mensagemErro)): ?>
		<div id="mensagem" class="alert alert-danger text-center fw-bold fs-5">
			<?= htmlspecialchars($mensagemErro) ?>
		</div>
		<?php endif; ?>
	<div class="login">
	<form action="login.php" method="post">
		<h1>Nome Site</h1>
		Username: <input type="text" name="username" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
		Senha: <input type="password" name="senha" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
		<input type=submit value="Entrar" id=button>
		<hr>
		Não possui conta?<br>
        <a href="cconta.php" id="criar_conta">Criar conta</a>
	</form>
    </div>
</body>
</html>