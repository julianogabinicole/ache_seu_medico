<?php

class Contato extends CI_Controller {

    public function envia_email() {

 
        $this->load->model('pessoas_model', 'model', TRUE);
        $unico_id = uniqid();
        $senha_md5 = md5($unico_id);
       $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $data['senha_criptografada'] =$senha_md5;
        $data['acesso'] =1;
        
        
        $ExisteEmail = $this->model->ValidarUsuarioEmail($_POST['email']);
        $ExisteCPF = $this->model->ValidarCPF($_POST['cpf']);

        if ($ExisteEmail and $ExisteCPF ) {
            //$this->model->atualizar_senha($data, $cpf);
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Nova senha enviada para seu e-mail!");
                window.location = "http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin";
            </SCRIPT><?php
            $this->load->library('email');
            $this->email->from($cpf);
            $this->email->to($email);
            $this->email->subject('Favor verificar sua nova senha');
            $this->email->message("Sua nova senha será:$senha_md5"
                    . "Para alterar, acesse o Lynk:http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin"
                  
                    );
            $this->email->send();
        } else {
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Favor inserir matricula e email corretos!");
                window.location = "http://localhost/achei_seu_medico/application/views/contato.php";
            </SCRIPT><?php
        }
    }

}
?>