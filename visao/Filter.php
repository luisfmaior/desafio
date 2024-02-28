<?php
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';



function listarComFiltro(){
    $daoN = new UsuarioDAO();    
    //return $daoN->listar("AND user.nm_usuario like %$filter[name]% AND user.nr_cpf like %$filter[cpf]%");
    return $daoN->listar("AND u.nm_usuario like '%us%' AND u.nr_cpf like '%1%'");
}




$vetor = listarComFiltro();
foreach ($vetor as $elemento) {
    echo 'Usuario: ' . $elemento->getNmUsuario() . '<br>'.  'CPF: ' . $elemento->getNrCpf() . '<br>';
}

?>


<div class='container-filter' >
<form method="post">
<h3>Filtro</h3>
    <label for="name">Nome:</label>
    <input type="text" id="name" name="name">
    <label for="cpf">CPF:</label>
    <input type="text" id="cpf" name="cpf">
    <br>    
    <br>
    <button class="filtrar" type="submit" name="submit">Buscar</button>
</form>
</div>
