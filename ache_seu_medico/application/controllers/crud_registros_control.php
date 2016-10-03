<?php

class Crud_registros_control extends CI_Controller {

    public function exclui() {
        // echo $id_remover ;
        $id_remover_dados = $_POST["id_remover"];

        $this->load->model('pessoas_model', 'model', TRUE);
        $this->model->excluir_acesso_usuario($id_remover_dados);



//exibe mensagen e retorna quando efetuado   
        ?><SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("A operação foi realizada com sucesso!");

            window.location = "http://localhost/ache_seu_medico/index.php/validacao_login_controler/valida_login";
        </SCRIPT><?php
    }

    public function cadastrar() {
        $unico_id = uniqid();
        $senha_md5 = md5($unico_id);
        
        $id_cadastrar = $_POST["id_cadastrar"];
        $data['codigo_usuario'] = $this->input->post('id_cadastrar');
        $data['nome_solicitante'] = $this->input->post('nome_solicitante');
        $data['cpf'] = $this->input->post('cpf');
        $data['cnes'] = $this->input->post('cnes');
        $data['cnpj'] = $this->input->post('cnpj');
        $data['endereco'] = $this->input->post('endereco');
        $data['cep'] = $this->input->post('cep');
        $data['email'] = $this->input->post('email');
        $data['telefone'] = $this->input->post('telefone');
        $data['latitude'] = $this->input->post('latitude');
        $data['longitude'] = $this->input->post('longitude');
        $data['acesso'] = 1;
        $data['senha_criptografada'] = $senha_md5;
//primeiro cadastra em uma tabela
        $this->load->model('pessoas_model', 'model', TRUE);
        $this->model->cadastrar_acesso_usuario($data);
//depois exclui da tbl_login do mesmo id
        $this->load->model('pessoas_model', 'model', TRUE);
        $this->model->excluir_acesso($id_cadastrar);
//exibe mensagen e retorna quando efetuado   

        $email = $_POST["email"];
        $corpoEmail = 'Sua senha para acesso ao Sistema Ache Médico é: ' . $unico_id . ' ';



        $this->load->library('email');
        $this->email->from($email);
        $this->email->to($email);
        $this->email->subject();
        $this->email->message($corpoEmail);
        $this->email->send();
        ?><SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("A operação foi realizada com sucesso!");

            window.location = "http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin";
        </SCRIPT><?php
    }

    public function cadastrar_medico() {
        date_default_timezone_set("America/New_York");
        $data_cadastro = date('d/m/y'); // Resultado: 18/03/13
        $this->load->model('pessoas_model');
        $dados_acesso = $this->pessoas_model->retorna_acesso();

        foreach ($dados_acesso->result() as $linha) {
            $dados = "$linha->endereco";
            $dados_latitude = "$linha->latitude";
            $dados_longitude = "$linha->longitude";
        }

        // $id_cadastrar = $_POST["id_cadastrar"];
        $data['nome_cadastrante'] = $_SESSION["matricula_logada"];
        $data['nome_medico'] = $this->input->post('nome_medico');
        $data['especialidade_medico'] = $this->input->post('especialidade');
        $data['hora_entrada'] = $this->input->post('hora_entrada');
        $data['hora_saida'] = $this->input->post('hora_saida');
        $data['data_cadastro'] = $data_cadastro;
        $data['nivel_procura'] = $this->input->post('quantidade_fila');
        $data['local'] = $dados;
        $data['latitude'] = $dados_latitude;
        $data['longitude'] = $dados_longitude;


        $this->load->model('pessoas_model', 'model', TRUE);
        $this->model->inserir_medico($data);
        ?><SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("A operação foi realizada com sucesso!");

            window.location = "http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/tela_cadastro_medico";
        </SCRIPT><?php
    }

}
