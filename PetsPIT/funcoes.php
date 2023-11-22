<?php

function uploadImagem($conexao)
{
  if (isset($_POST['upload'])) {
    $image = $_FILES['image']['name'];
    $image_text = $_POST['image_text'];

    $target = "imgs/" . basename($image);
    $sql = "INSERT INTO images (image, image_text) VALUES (:image, :image_text)";

    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':image_text', $image_text);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target) && $stmt->execute()) {
      $sucess = "Imagem carregada com sucesso.";
      return $sucess;
    } else {
      return "Falha ao carregar a imagem.";
    }
  }
}

function listarImagens($conexao)
{
  $sql = "SELECT * FROM images";
  $stmt = $conexao->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>