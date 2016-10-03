<?php

class EncaminhaLink extends CI_Controller {

// metrodo que efetua cadastro com valores que vem do formulario 
    public function tela_cadastro() {
        /* Carrega o modelo */
        $this->load->model('cadastra_empresa_model');

        $matricula_empr = $this->cadastra_empresa_model->retorna_dados_empresas_cadastro();

        $option2 = "<option value=''>-------Selecione--------</option>";
        foreach ($matricula_empr->result() as $linha) {
            $option2 .= "<option value='$linha->matricula'>$linha->matricula</option>";
        }

//recebe valor do modelo para ser enviado parametro para formulario
        If ($option2 == null) {
            //exibe mensagen e retorna quando efetuado    
            ?>
            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Antes de cadastrar funcionário, efetuar cadastro da empresa!\n\
                    "
                        );

                window.location = "http://localhost/CodeIgniter/index.php/empresas/encaminhaLink_empresa/tela_cadastro";
            </SCRIPT> <?php
        }
        $variaveis['empresa'] = $option2;
        //$variaveis['cargo_func'] = $option;
//envia array para formulario com dados
        $this->load->view('tela_principal');
        $this->load->view('cadastra_usuario_admin/tela_cadastra_func_empresa', $variaveis);
    }

// metrodo que efetua cadastro com valores que vem do formulario 
    public function tela_cadastro_cargo() {
// recebe atributos do formulario e cria sessao a partit do mesmo
        $_SESSION["matri_empresa"] = $_POST["matri_empresa"];
        $_SESSION["nome"] = $_POST["nome"];
        $_SESSION["rg"] = $_POST["rg"];
        $_SESSION["cpf"] = $_POST["cpf"];
        $_SESSION["data_nasc"] = $_POST["data_nasc"];
        $_SESSION["telefone"] = $_POST["telefone"];
        $_SESSION["email"] = $_POST["email"];



//efetua consulta enviando para model uma session de parametro
        $this->load->model('cadastra_func_empresa_model');
        $cargo_func = $this->cadastra_func_empresa_model->consulta_dados_cargo($_POST["matri_empresa"]);
//dados recebido da model
        $cargo = "<option value=''>-------Selecione--------</option>";
        foreach ($cargo_func->result() as $linha) {
            $cargo .= "<option value='$linha->cargo_func'>$linha->cargo_func</option>";
        }

//efetua consulta enviando para model $nome_cargo de parametro
        $nome_cargo = $this->input->post("matri_empresa"); // pega via post a senha que venho do formulario
        $ExisteCadastro_cargo_empresa = $this->cadastra_func_empresa_model->consulta_dados_cargo_empresa($nome_cargo);

        //   se existem cadastro da empresa vai para outra tela
        IF ($ExisteCadastro_cargo_empresa == "") {
            ?>
            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Antes de cadastrar funcionário para esta empresa, efetuar cadastro do cargo!\n\
                  "
                        );

                window.location = "http://localhost/CodeIgniter/index.php/cargos_admin/encaminhaLink_cargo_admin/tela_cadastro_cargo";
            </SCRIPT><?php
        }

        $data['cargo_func'] = $cargo;
// encamina tela com array dea tributos
        $this->load->view('tela_principal');
        $this->load->view('cadastra_usuario_admin/cadastra_cargo_adm', $data);
    }

    public function altera_cadastro() {

        /* Carrega o modelo */
        $this->load->model('cadastra_func_empresa_model');

        $matricula = $this->cadastra_func_empresa_model->retorna_alteracao();
// busca valor para imprimir no select em array
        $option = "<option value=''></option>";
        foreach ($matricula->result() as $linha) {
            $option .= "<option value='$linha->matricula'>$linha->matricula</option>";
        }

        $variaveis['matricula'] = $option;

// envia array e encaminha para outra tela
        $this->load->view('tela_principal');

        $this->load->view('cadastra_usuario_admin/tela_altera_usuario_admin', $variaveis);
    }

    public function envia_dados() {
        /* Carrega o modelo */
        $this->load->model('cadastra_func_empresa_model');

        $dados_retorna = $this->cadastra_func_empresa_model->retorna_usuario();
// envia array e encaminha para outra tela
        $this->load->view('tela_principal');

        $this->load->view('cadastra_usuario_admin/tela_altera_usuario_admin', $dados_retorna);
    }

    public function envia_consulta_func() {
// cria sessao para ser enviado para models
        $_SESSION["id_consulta"] = $_POST["id_altera"];
//carrega modelo
        $this->load->model('cadastra_func_empresa_model');
        $dados_func = $this->cadastra_func_empresa_model->retorna_usuario();

        $dados_cargo = $this->cadastra_func_empresa_model->retorna_dados_cargo();

        $cargo_func = "";
        foreach ($dados_cargo->result() as $linha) {
            $cargo_func= "<option value='$linha->cargo_func'>$linha->cargo_func</option>";
        }
//busca valores do model já carregado anteriormente
        foreach ($dados_func->result() as $linha) {
            $nome_func = "$linha->nome";
            $rg = "$linha->rg";
            $cpf = "$linha->cpf";
            $data_nasc = "$linha->data_nasc";
            $tel = "$linha->tel";
            $email = "$linha->email";
        }
        //atributos que irao ser enviado para formulario que irá er atualixado
        $data['nome'] = $nome_func;
        $data['rg'] = $rg;
        $data['cpf'] = $cpf;
        $data['data_nasc'] = $data_nasc;
        $data['tel'] = $tel;
        $data['email'] = $email;
        $data['cargo_func'] = $cargo_func;
// encamina tela com array dea tributos
        $this->load->view('tela_principal');

        $this->load->view('cadastra_usuario_admin/tela_altera_usuario_admin', $data);
    }

    public function alterar() {
//cria sessao com o id que será enviado para model para wque seja feita consulta
        $_SESSION["id_consulta"] = $_POST["id"];
        $this->load->model('cadastra_func_empresa_model');
//carrega modelo
        $dados_retorna = $this->cadastra_func_empresa_model->retorna_usuario();
//envia parametroa para formulario com os valores do banco
        $this->load->view('tela_principal');
        $this->load->view('cadastra_usuario_admin/tela_altera_usuario_admin', $dados_retorna);
    }

}
