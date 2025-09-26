<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="vars.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="media-queries.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php
    session_start();
    $conexao=mysqli_connect(hostname: "localhost", username:"root", password:"", database:"tcc");
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $nome=$_POST["nome"];
        $username=$_POST["username"];
        $datanas=$_POST["datanas"];
        $senha=$_POST["senha"];
        $foto="img/no_login.png";
        
        $dataNas=new DateTime($datanas);
        $dataAtual=new DateTime();
        $idade=$dataAtual->diff($dataNas)->y;

        $hashSenha=password_hash($senha, PASSWORD_DEFAULT);

        $stmt=$conexao->prepare("INSERT INTO `usuaria` (`foto`, `nome`, `username`, `datanas`, `idade`, `senha`) VALUES ('$foto', '$nome', '$username', '$datanas', '$idade', '$hashSenha')");

        if($stmt->execute()){
            echo "Conta criada com sucesso!";
            header("Location: login.php");
            exit;
        }
        else{
            echo "Erro ao criar conta: ".$conexao->error;
        }
        $stmt->close();
        }
        $conexao->close();
    ?>
    <div class="criar_conta">
    <form action="cconta.php" method="post" onsubmit="verificarDados()">
        Nome: <input type=text name="nome" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
        Username: <input type=text name="username" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
        Data de Nascimento: <input type=date name="datanas" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML=''"><p></p>
		Senha: <input type=password name="senha" autocomplete="off" required onclick="document.getElementById('mensagem').innerHTML = ''"><p></p>
		<input type=submit value="Entrar" id=button>
    </form>
    </div>
    <script>
        function verificarDados() {
            var nome = document.getElementById("input-nome").value;
            var username = document.getElementById("input-username").value;
            var datanas = document.getElementById("input-datanas").value;
            var senha = document.getElementById("input-senha").value;
            if (senha.length<6) {
                alert("A senha deve ter no mínimo 6 digitos!");
                // abortando submit
                document.getElementById("input-senha").focus();
                window.onsubmit = function() { return false; }
            }
            if (username.length<5) {
                alert("O username deve ter no mínimo 5 caracteres!");
                // abortando submit
                document.getElementById("input-username").focus();
                window.onsubmit = function() { return false; };
    
            } else {
                return true;
            }
        }
    </script>
</body>
</html>