<?php
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
?>


<script>
// Obtém todos os elementos <a> dentro da classe .topnav
var menuItems = document.querySelectorAll('.topnav a');

// Itera sobre cada item do menu
menuItems.forEach(function(item) {
    // Adiciona um evento de clique a cada item do menu
    item.addEventListener('click', function(event) {
        // Remove a classe 'selected' de todos os itens do menu
        menuItems.forEach(function(item) {
            item.classList.remove('active');
        });
        // Adiciona a classe 'selected' ao item de menu clicado
        this.classList.add('active');
    });
});
</script>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Entrevista</title>
        <link href="../css/style.css" rel="stylesheet">
        <link type='text/css' rel='stylesheet' href='../css/font.css'/>
    </head>
    <body> 
        <header>
            <h1>Entrevista - Desenvolvimento Canoastec</h1>
        </header>
        <div class="topnav">
  <a  href="../index.php">Home</a>
  <a href="GuiUsuarios.php">Lista de Registros</a>
  <a href="GuiCadastroUsuario.php">Cadastrar</a>
</div>
    