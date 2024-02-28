<?php 
include_once '../base_dir.php';
include_once DIR_UTIL . 'Define.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();


$id_usuario = $_POST['id_usuario'];
$dao->deletar($id_usuario);

header("Location: " . $_SERVER["HTTP_REFERER"]);
exit;
?>
    
