<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "clientes_contatos";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Não foi possível conectar" . $conn->connect_error);
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];



$sql = "INSERT INTO contatos (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


$stmt->bind_param("ssis", $nome, $email, $telefone, $mensagem);


if ($stmt->execute() === TRUE) {
  echo "Mensagem enviada com sucesso!";
} else {
  echo "Erro ao enviar a mensagem: " . $stmt->error;
}


$stmt->close();
$conn->close();

//CREATE TABLE `clientes_contato`.`contatos` (`nome` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `telefone` INT(11) NOT NULL , `mensagem` TEXT NOT NULL ) ENGINE = InnoDB; 