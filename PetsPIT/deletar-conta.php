<?php
include_once("conexao.php");

if (!isset($_SESSION)) {
  session_start();
}

if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
  $sql = "DELETE FROM usuarios WHERE id = " . $_SESSION['id'];
  $sql_query = $mysqli->query($sql) or die($mysqli->error);

  if ($sql_query) {
    session_destroy();
    header("Location: index.html");
  } else {
    echo "<script>alert('Erro ao excluir conta')</script>";
  }
}

?>