<script>
function filter() {
    <?php
    $n = $_GET['name'];
    $c = $_GET['cpf'];
    ?>
}
</script>


<div class='container-filter' >
<form method="get" action="GuiUsuarios.php">
<h3>Filtro</h3>
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name">
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf">
    <br>    
    <br>
    <button class="filtrar" type="submit" name="submit" onclick="filter()">Buscar</button>
</form>
</div>

<?php


include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';


?>
