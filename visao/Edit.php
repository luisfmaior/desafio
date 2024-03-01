<?php 
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';
include_once './Header.php';

$dao = new UsuarioDAO();

$id_usuario = $_POST['edit_usuario'];
$usuario = $dao->edit($id_usuario);

?>


<div class="container">
    
    <form class="form-horizontal" id="cadUsuario" method="POST" action="../controle/ControleUsuario.php?op=update">
    
       
        <div class="formulario-campos">
            <label>Nome</label>
            <input type="text" name="nm_usuario" id="nm_usuario" value='<?= $usuario->getNmUsuario() ?>'>
    
            <label>CPF</label>
            <input type="text" name="nr_cpf" id="nr_cpf" value='<?= $usuario->getNrCpf() ?>'>
        </div>
    
        <div class="formulario-campos">
            <label>Login</label>
            <input type="text" name="ds_login" id="ds_login" value='<?= $usuario->getDsLogin() ?>'>

            <label>Senha</label>
            <input type="password" name="pw_senha" id="pw_senha" value='<?= $usuario->getPwSenha() ?>'>
        </div>
    
        <div class="formulario-campos">
            <label>Email</label>
            <input type="text" name="ds_email" id="ds_email" value='<?= $usuario->getDsEmail() ?>'>

            <label>Perfil</label>
            <select name="id_perfil" id="id_perfil" > 
                <option value="1">Administrador</option>
                <option value="2">Atendente</option>
                <option value="3">Desenvolvedor</option>
            </select>
        </div>
    
        <div class="formulario-campos">
            <label>Ativo?</label>
            <input type="checkbox" name="ao_status" id="ao_status" <?php echo $usuario->getAoStatus() == 1 ? 'checked' : '0'; ?>>
        </div>
    
        <div class="botoes">
            <button type="submit" class="save-button" id="id_usuario" name="id_usuario" value='<?= $usuario->getIdUsuario() ?>'>Salvar</button>
            <button type="button" onclick="window.location.href='GuiUsuarios.php'">Voltar</button>

        </div>
    </form>
</div>
    


<style>
    .formulario-campos{
        margin: 1em 30%;
    }

    .botoes{
        float: right;
        margin: 3em 47%;
    }
    
</style>
