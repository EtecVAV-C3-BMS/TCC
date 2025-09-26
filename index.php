<?php
    session_start();
    $username=$_SESSION["username"];
    $conexao=mysqli_connect("localhost","root","","tcc");
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
    $stmt = $conexao->prepare("SELECT datanas FROM `usuaria` WHERE `username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $resultado = $stmt->get_result();
    if($linha=$resultado->fetch_assoc()){
        $datanas=$linha["datanas"];
        function calcularIdade($datanas){
            $dataNas=new DateTime($datanas);
            $dataAtual=new DateTime();
            $idade=$dataAtual->diff($dataNas);
            return $idade->y;
        }
        $idade=calcularIdade($datanas);
        $stmtUpdate=$conexao->prepare("UPDATE usuaria SET idade=? WHERE username=?");
        $stmtUpdate->bind_param("is", $idade, $username);
        $stmtUpdate->execute();
        $stmtUpdate->close();
    }
    $stmt->close();
    $conexao->close();
    header("Location: ../index.php");
    exit;
    ?>