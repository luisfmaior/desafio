<?php 
include_once 'Header.php';
include_once 'Filter.php';
include DIR_UTIL . 'Mask.php';
include_once DIR_PERSISTENCIA . 'UsuarioDAO.class.php';


$dao = new UsuarioDAO();
?>

<div class="conteudo">
    <div class="listagem" style="background: #fcfcfc; margin: 2em auto;width:85%;">
        <table>
            <thead>
                <tr>
                    <th width="25%">Nome</th>
                    <th width="16%">CPF</th>
                    <th width="21%">Email</th>
                    <th width="6%">Status</th>
                    <th width="14%">Data de Cadastro</th>
                    <th width="18%">Ações</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($dao->listar("AND u.nm_usuario like '%$n%' AND u.nr_cpf like '%$c%'") as $usuario) { ?>
                <tr>
                    <td><?=$usuario->getNmUsuario()?></td>
                    <td><?=mask($usuario->getNrCpf(), '###.###.###-##')?></td>
                    <td><?=$usuario->getDsEmail()?></td>
                    <td><?=$usuario->getAoStatus() ? "Ativo" : "Inativo" ?></td>
                    <td><?=date('d/m/Y', strtotime($usuario->getDtCadastro()))?></td>
                    <td>    
                        <button type="submit" onclick="window.location.href='../index.php'">Editar</button>
                        <button type="submit">Deletar</button>
                    </td>
                </tr>

    
                <?php } ?>
            </tbody>

            
        </table>
        <div>
    <button type="submit" onclick="window.location.href='GuiCadastroUsuario.php'">Cadastrar</button>

    </div>
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
</style>    