<?php

include_once DIR_PERSISTENCIA . 'Conexao.class.php';
include_once DIR_MODELO . 'UsuarioVO.class.php';

class UsuarioDAO
{

    private $conexao = null;

    function __construct()
    {
    }

    function listar($filtros = '')
    {
        try {
            $query = ("SELECT * FROM usuario u WHERE 1=1 $filtros ORDER BY u.nm_usuario ASC");
            $this->conexao = Conexao::connect()->query($query);
            $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);

            $usuarios = array();

            foreach ($array as $obj) {
                $usuario = new UsuarioVO();
                $usuario->setIdUsuario($obj['id_usuario']);
                $usuario->setNmUsuario($obj['nm_usuario']);
                $usuario->setNrCpf($obj['nr_cpf']);
                $usuario->setDsEmail($obj['ds_email']);
                $usuario->setDsLogin($obj['ds_login']);
                $usuario->setPwSenha($obj['pw_senha']);
                $usuario->setIdPerfil($obj['id_perfil']);
                $usuario->setAoStatus($obj['ao_status']);
                $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
                $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
                $usuario->setDtCadastro($obj['dt_cadastro']);
                $usuario->setDtAlteracao($obj['dt_alteracao']);
                $usuarios[] = $usuario;
            }
            $this->conexao = null;
            return $usuarios;
        } catch (Exception $e) {
            echo "Erro ao buscar os Usuarios";
            return false;
        }
    }



    function cadastrar(UsuarioVO $usuario)
    {
        try {

            $sql = "
                INSERT INTO usuario(
                    nm_usuario,
                    ds_email,
                    nr_cpf,
                    ds_login,
                    pw_senha,
                    id_perfil,
                    ao_status,
                    id_usuarioinclusao,
                    id_usuarioalteracao,
                    dt_cadastro,
                    dt_alteracao
                )VALUES(
                    '{$usuario->getNmUsuario()}',
                    '{$usuario->getDsEmail()}',
                    '{$usuario->getNrCpf()}',
                    '{$usuario->getDsLogin()}',
                    '{$usuario->getPwSenha()}',
                    '{$usuario->getIdPerfil()}',
                    '{$usuario->getAoStatus()}',
                    '{$usuario->getIdUsuarioInclusao()}',
                    '{$usuario->getIdUsuarioAlteracao()}',
                    now(),
                    now()
                )
            ";

            $this->conexao = Conexao::connect()->prepare($sql);
            $this->conexao->execute();
            $this->conexao = null;
            return true;
        } catch (Exception $e) {
            echo "Erro ao cadastrar o Usuario";
            return false;
        }
    }

    // function filtrar($filtro)
    // {
    //     switch ($filtro) {
    //         case (isset($filtro['cpf']) && isset($filtro['name'])): {
    //                 try {
    //                     $cpf = $filtro['cpf'];
    //                     $name = $filtro['name'];
    //                     $query = ("SELECT * FROM usuario user WHERE 1=1 AND user.nm_usuario like '%$name%' AND user.nr_cpf like '%$cpf%' ORDER BY user.nm_usuario ASC");
    //                     $this->conexao = Conexao::connect()->query($query);
    //                     $this->conexao->execute();
    //                     $array = $this->conexao->fetchAll(PDO::FETCH_ASSOC);
    //                     foreach ($array as $obj) {
    //                         $usuario = new UsuarioVO();
    //                         $usuario->setIdUsuario($obj['id_usuario']);
    //                         $usuario->setNmUsuario($obj['nm_usuario']);
    //                         $usuario->setNrCpf($obj['nr_cpf']);
    //                         $usuario->setDsEmail($obj['ds_email']);
    //                         $usuario->setDsLogin($obj['ds_login']);
    //                         $usuario->setPwSenha($obj['pw_senha']);
    //                         $usuario->setIdPerfil($obj['id_perfil']);
    //                         $usuario->setAoStatus($obj['ao_status']);
    //                         $usuario->setIdUsuarioinclusao($obj['id_usuarioinclusao']);
    //                         $usuario->setIdUsuarioalteracao($obj['id_usuarioalteracao']);
    //                         $usuario->setDtCadastro($obj['dt_cadastro']);
    //                         $usuario->setDtAlteracao($obj['dt_alteracao']);
    //                         $usuarios[] = $usuario;
    //                     }
    //                     $this->conexao = null;
    //                     return $usuarios;
    //                 } catch (Exception $e) {
    //                     echo "Erro ao cadastrar o Usuario";
    //                     return false;
    //                 }
    //             }
    //         case (isset($filtro['name'])): {
    //                 $name = $filtro['name'];
    //                 $query = ("SELECT * FROM usuario user WHERE 1=1 AND user.nm_usuario like '%$name%' ORDER BY user.nm_usuario ASC");
    //                 $this->conexao = Conexao::connect()->query($query);
    //                 $this->conexao->execute();
    //                 $this->conexao = null;
    //             }
    //         case (isset($filtro['cpf'])): {
    //                 $cpf = $filtro['cpf'];
    //                 $query = ("SELECT * FROM usuario user WHERE 1=1 AND user.nr_cpf like '%$cpf%' ORDER BY user.nm_usuario ASC");
    //                 $this->conexao = Conexao::connect()->query($query);
    //                 $this->conexao->execute();
    //                 $this->conexao = null;
    //             }
    //     }
    // }
}
