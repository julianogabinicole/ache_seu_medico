<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pessoas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function cadastrar($data) {

        return $this->db->insert('tbl_cadastro_login', $data);
    }

    public function excluir_acesso_usuario($id_remover_dados) {

        $this->db->where('id_usuario', $id_remover_dados);
        return $this->db->delete('tbl_cadastro_login');
    }

    public function excluir_acesso($id_cadastrar) {

        $this->db->where('id_usuario', $id_cadastrar);
        return $this->db->delete('tbl_cadastro_login');
    }

    public function cadastrar_acesso_usuario($data) {

        return $this->db->insert('tbl_cadastro_acesso_usuario', $data);
    }

    public function ValidarLoginUsuarioNome($nome) {

        $query = $this->db->where('cpf', $nome);
        $query = $this->db->get('tbl_cadastro_acesso_usuario');
        return $query->row();    //   Retornamos ao controlador a fila que coincide com a busca. (FALSE no caso de não existirem coincidencias)
    }

    public function ValidarLoginUsuarioSenha($senha) {

        $senha_md5 = md5($senha);
        $query = $this->db->where('senha_criptografada', $senha_md5);  //   A consulta é efetuada mediante Active Record. Uma maneira alternativa, e em linguagem mais simples, de gerar as consultas Sql.
        $query = $this->db->get('tbl_cadastro_acesso_usuario');
        return $query->row();    //   Retornamos ao controlador a fila que coincide com a busca. (FALSE no caso de não existirem coincidencias)
    }

    public function alterar_senha_usuario($data) {


        $this->db->where('cpf', $_SESSION["matricula_logada"]);
        return $this->db->update('tbl_cadastro_acesso_usuario', $data);
    }

    public function retorna_acesso() {
        //$query = $this->db->where('senha_criptografada', $_SESSION["senha_logada"]);  
        $query = $this->db->where('cpf', $_SESSION["matricula_logada"]);
        $query = $this->db->get('tbl_cadastro_acesso_usuario');
        return $query;
    }

    public function inserir_medico($data) {

        return $this->db->insert('tbl_cadastro_medico', $data);
    }

    public function ValidarEspecialidade($informa_especialidade) {

        $query = $this->db->where('especialidade_medico', $informa_especialidade);
        $query = $this->db->get('tbl_cadastro_medico');
        return $query->row();    //   Retornamos ao controlador a fila que coincide com a busca. (FALSE no caso de não existirem coincidencias)
    }

    public function retorna_medicos($informa_especialidade) {
        //$query = $this->db->where('senha_criptografada', $_SESSION["senha_logada"]);  
        $query = $this->db->where('especialidade_medico', $informa_especialidade);
        $query = $this->db->get('tbl_cadastro_medico');
        return $query->result();
    }

    public function retorna_distancia($latitude, $longitude) {


        $this->db->select('*, ( 6371 * ACOS( COS( RADIANS(' . $latitude . ') ) * COS( RADIANS(latitude) ) * '
                . 'COS( RADIANS(longitude) - RADIANS(' . $longitude . ') ) + '
                . 'SIN( RADIANS(' . $latitude . ') ) * SIN( RADIANS(latitude) ) ) ) AS distancia', FALSE);
        $this->db->from('tbl_cadastro_medico');
        $query = $this->db->get();
        return $query;
    }



    public function ValidarUsuarioSenha($senha) {         //   Consulta Mysql para buscar na tabela Usuario aqueles usuarios que coincidam com o mail e password inscritos na tela de login
        $senha = $_POST['senha'];
        $codificada = md5($senha);
        //echo $senha;
        $query = $this->db->where('senha', $codificada);   //   A consulta é efetuada mediante Active Record. Uma maneira alternativa, e em linguagem mais simples, de gerar as consultas Sql.
        $query = $this->db->get('tbl_cadastro_login');
        return $query->row();
    }

    public function ValidarCPF($cpf) {

        $query = $this->db->where('cpf', $cpf);
        $query = $this->db->get('tbl_cadastro_acesso_usuario');
        return $query->row();    //   Retornamos ao controlador a fila que coincide com a busca. (FALSE no caso de não existirem coincidencias)
    }
        public function ValidarUsuarioEmail($email) {

        $query = $this->db->where('email', $email);
        $query = $this->db->get('tbl_cadastro_acesso_usuario');
        return $query->row();    //   Retornamos ao controlador a fila que coincide com a busca. (FALSE no caso de não existirem coincidencias)
    }
    
       public function atualizar_senha($data,$cpf) {


        $this->db->where('cpf', $cpf);
        return $this->db->update('tbl_cadastro_acesso_usuario', $data);
    }
      public function ValidarCPF_Login($cpf) {

        $query = $this->db->where('cpf', $cpf);
        $query = $this->db->get('tbl_cadastro_login');
        return $query->row();    //   Retornamos ao controlador a fila que coincide com a busca. (FALSE no caso de não existirem coincidencias)
    }
}
