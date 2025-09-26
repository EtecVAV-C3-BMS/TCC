<?php 
session_start();
if (($_SESSION["logado"]) || ($_SESSION["logado"] !== TRUE)){
    $conexao=mysqli_connect(hostname: "localhost", username:"root", password:"", database:"tcc");
    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }
    $sql = "SELECT `curtida` FROM `post` where `id`='$id'";
    $curtida=$linha["curtida"];
    $curtida+=1;
    $sql="UPDATE `post` SET `curtida`='$curtida' WHERE `id`='$id'";
    header("Location: index.php");
}
else{
    header("Location: admin/login.php");
}
?>