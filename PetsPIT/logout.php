<?php
// Destroi todas as variáveis de sessão
session_unset();


// Redireciona para a página de login ou qualquer outra página desejada
header("Location: login.php");
exit();
?>