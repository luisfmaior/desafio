<?php 
include_once 'Header.php';
include_once 'Filter.php';
include DIR_UTIL . 'Mask.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';


$dao = new UsuarioDAO();
?>

<?php
if(isset($_GET['sucesso'])){
    switch($_GET['sucesso']){
        case 'cadastro_realizado':
            echo "<div class='container-filter'><h4> Cadastro realizado com sucesso! </h4></div>";
            break;
    
        case 'atualizacao_realizada':
            echo "<div class='container-filter'><h4> Atualização realizada com sucesso! </h4></div>";
            break;
    
        case 'exclusao_realizada':
            echo "<div class='container-filter'><h4 class='delete'> Exclusão realizada com sucesso! </h4></div>";
            break;        
    }
    }
    
?>


<div class="conteudo">
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
        

            <tbody>
                <?php 
                $registers = $dao->listar("AND u.nm_usuario like '%$name%' AND u.nr_cpf like '%$cpf%'");
                if(empty($registers)){
                   echo "<br><br><h3 class='not-found'>Nenhum registro foi encontrado</h3>";
                }else{
                    echo "<table>
                    <thead>
                        <tr>
                            <th width='25%'>Nome</th>
                            <th width='16%''>CPF</th>
                            <th width='21%'>Email</th>
                            <th width='6%'>Status</th>
                            <th width='14%'>Data de Cadastro</th>
                            <th width='18%'>Ações</th>
                        </tr>
                    </thead>";
                    foreach ($registers as $usuario) {;
                ?>
                <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=mask($usuario->getNrCpf(), '###.###.###-##')?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=date('d/m/Y', strtotime($usuario->getDtCadastro()))?></td>
                    <td>    
                    <form  class="form-button"action='Edit.php' method="POST">
                        <button type="submit" class="editButton" name="edit_usuario" onclick="window.location.href='../index.php'" value='<?= $usuario->getIdUsuario() ?>'>Editar</button>
                    </form>
                    <form class="form-button" action='../controle/ControleUsuario.php?op=delete' method="POST">
                            <button type="submit" class="deleteButton" name="id_usuario" value='<?= $usuario->getIdUsuario() ?>'>Excluir</button>
                    </form>
                    </td>
                </tr>

    
                <?php } }?>
            </tbody>

            
        </table>
      
    </div>

    <div>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }

    .form-button {
    display: inline-block; /* Define o formulário como inline-block */
}
</style>    