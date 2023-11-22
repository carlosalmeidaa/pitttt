<?php
$user = 'root';
$password = '';
$database = "pet_care_db";
$host = 'localhost';

$mysqli = new mysqli($host, $user, $password, $database);

if ($mysqli->error) {
  die('Falha ao conectar com o banco de dados' . $mysqli->error);
}


// function conectaBanco()
// {
// $host = "localhost";
// $usuario = "root";
// $senha = "";
// $bd = "pet_care_db";

// try {
// $conexao = new PDO("mysql:host=$host;dbname=$bd", $usuario, $senha);
// return $conexao;
// } catch (PDOException $e) {
// die("Falha na conexão: (" . $e->getCode() . ") " . $e->getMessage());
// }
// }
?>