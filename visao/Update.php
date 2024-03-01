<?php 
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();

$usuario = new UsuarioVO();

$usuario->setIdUsuario($_POST['id_usuario']);
$usuario->setNmUsuario($_POST['nm_usuario']);
$usuario->setNrCpf($_POST['nr_cpf']);
$usuario->setDsEmail($_POST['ds_email']);
$usuario->setDsLogin($_POST['ds_login']);
$usuario->setPwSenha($_POST['pw_senha']);
$usuario->setIdPerfil($_POST['id_perfil']);
$usuario->setAoStatus($_POST['ao_status']);
$usuario->setIdUsuarioinclusao(1);
$usuario->setIdUsuarioalteracao(1);
$usuario->setDtAlteracao(date('Y-m-d H:i'));
$dao->update($usuario);
header("Location: ../visao/GuiUsuarios.php");
exit;
?>
    