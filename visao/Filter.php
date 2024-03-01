<script>
function filter() {
    <?php
    $name = $_POST['name'];
    $cpf = $_POST['cpf'];
    ?>
}
</script>

<br>
<br>
<div class='container-filter' >
<form method="post" action="GuiUsuarios.php">
<h3>Filtro</h3>
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name">
    <label for="cpf">CPF:</label>
    <input type="number" id="cpf" name="cpf">
    <br>    
    <br>
    <button class="filtrar" type="submit" name="submit" onclick="filter()">Buscar</button>
</form>
</div>

