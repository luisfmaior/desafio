<?php 
include_once 'Header.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';

$dao = new UsuarioDAO();
?>

<div class="conteudo">
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
        <table>
            <thead>
                <tr>
                    <th width="35%">Nome</th>
                    <th width="10%">CPF</th>
                    <th width="35%">Email</th>
                    <th width="8%">Status</th>
                    <th width="40%">Data de Cadastro</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dao->listar() as $usuario) { ?>
                <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=$usuario->getNrCpf()?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=$usuario->getDtCadastro()?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once 'Footer.php'; ?>

<style>
    thead{
        background-color: #006b85;
        color: #fff;
    }
</style>    