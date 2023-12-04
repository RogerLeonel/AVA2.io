<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "clientes_pedidos";



$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
  die("Não foi possível conectar" . $conn->connect_error);
}


$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$mensagem_customizada = $_POST['mensagem_customizada'];


$sql = "INSERT INTO pedidos(nome, email, telefone, peso, altura, mensagem_customizada, ) VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ssiiis", $nome, $email, $telefone, $peso, $altura, $mensagem_customizada);


if ($stmt->execute() === TRUE) {
  echo "Recebemos seu pedido! Em breve entraremos em contato com você!";
} else {
  echo "Erro ao enviar o pedido" . $stmt->error;
}

$stmt->close();
$conn->close();



//CREATE TABLE `clientes_pedidos`.`pedidos` (`nome` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `telefone` INT(11) NOT NULL , `peso` INT(3) NOT NULL , `altura` INT(3) NOT NULL , `mensagem_customizada` VARCHAR(100) NOT NULL ) ENGINE = InnoDB; 