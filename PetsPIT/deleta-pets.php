<?php
include("conexao.php");

if (isset($_GET["deleteid"])) {
  $id = $_GET["deleteid"];

  $sql = "DELETE FROM pets WHERE `id` ='$id'";
  $sql_query = $mysqli->query($sql) or die($mysqli->error);

  if ($sql_query) {
    echo "<script>alert(\"Pet excluido com sucesso!\")</script>";
    header("Location: pets_cadastrados.php");
  } else {
    echo "<script>alert(\"Falha ao excluir pet!\")</script>";
  }
}
?>