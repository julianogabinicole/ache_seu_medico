<?php

class Validacao_login_controler extends CI_Controller {

    public function valida_login() {
        $_SESSION["matricula_logada"] = $_POST["nome"];
        $_SESSION["senha_logada"] = $_POST["senha"];
        $cpf = $_POST["nome"];
        $senha = $_POST["senha"];
        $this->load->model('pessoas_model');
        $ExisteUsuarioeCPF = $this->pessoas_model->ValidarLoginUsuarioNome($_POST['nome']);
        $ExisteUsuarioeSenha = $this->pessoas_model->ValidarLoginUsuarioSenha($_POST['senha']);
     
        $dados_acesso = $this->pessoas_model->retorna_acesso();

        foreach ($dados_acesso->result() as $linha) {
            $dados = "$linha->acesso";
        }
        //  echo $dados;
        if ($ExisteUsuarioeCPF and $ExisteUsuarioeSenha) {
            if ($dados == 1) {
                $this->load->view('tela_altera_senha');
            } elseif ($dados == 2) {
                $this->load->view('tela_cadastro_medico');
            }
        } elseif ($ExisteUsuarioeCPF == "" or $ExisteUsuarioeSenha == "") {
          

            if ($cpf == "admin" and $senha == 123456) {
                $dados_usuarios['dados'] = $this->db->get('tbl_cadastro_login')->result();
                $this->load->view('tela_admin', $dados_usuarios);
            } else
                $this->load->view('tela_login');
        }
    }

    public function atualiza_senha() {
//carrega modelo
        $this->load->model('pessoas_model', 'model', TRUE);
        //
        $nova_senha = $_POST['nova_senha'];
        //codifica a senha
        $codificada = md5($nova_senha);
        $data['senha_criptografada'] = $codificada;
        $data['acesso'] = 2;

        $this->model->alterar_senha_usuario($data);
        //exibe mensagen e retorna quando efetuado   
        ?>
        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("A operação foi realizada com sucesso!!");

            window.location = "http://localhost/ache_seu_medico/";
        </SCRIPT> <?php
    }

}
?>
