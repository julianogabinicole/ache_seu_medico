<?php

class Pessoas extends CI_Controller {

    function _remap($method) {
// chama a função gravar() somente se o método // for "excluir" 
        if ($method == "cadastrar")
            $this->cadastrar();
        else
            $this->index();
    }

    public function index() {
        $data['titulo'] = "CRUD com CodeIgniter | Pessoas";

        $this->load->view('tela_login', $data);
    }

    public function envia() {
        $data['titulo'] = "CRUD com CodeIgniter | Pessoas";

        $this->load->view('A operacão foi realizada com sucesso', $data);
        ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Erro no cadastro, favor tentar novamente!");
        </SCRIPT><?php
    }
//metodo para cadastrar dados
    public function cadastrar() {

        /* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */

        base64_encode('senha');
        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
        $this->form_validation->set_rules('senha', 'Senha', 'required|max_length[20]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[40]');

        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE) {
            $this->envia();
            /* Senão, caso sucesso: */
        } else {
            /* Recebe os dados do formulário (visão) */
            $senha = $_POST['senha'];

            $codificada = md5($senha);
            //  echo $codificada;
            // echo $senha;
            $data['nome'] = $this->input->post('nome');
            $data['senha'] = $codificada;
            $data['email'] = $this->input->post('email');
            /* Carrega o modelo */
            $this->load->model('pessoas_model', 'model', TRUE);
            /* Chama a função inserir do modelo */

            $ExisteUsuarioeNome = $this->model->ValidarUsuarioNome2($_POST['nome']);
            $ExisteUsuarioeEmail = $this->model->ValidarUsuarioEmail($_POST['email']);
            //  echo $_POST['nome'];
            $ExisteMatriculaFuncionario = $this->model->ValidarMatriculaFuncionario($_POST['nome']);
            $ExisteMatriculaEmpresa = $this->model->ValidarMatriculaEmpresa($_POST['nome']); //   comprovamos que o usuario exista na base de dados e a password inserida seja correta
            if ($ExisteMatriculaFuncionario === null and $ExisteMatriculaEmpresa === null) {   // A variavel $ExisteUsuarioePassoword recebe valor TRUE se o usuario existe e FALSE em caso negativo. Este valor é determinado pelo modelo.                   
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Matrícula não cadastrada, favor entrar em contato com a empresa e solicitar cadastro!");
                    window.location = "http://localhost/CodeIgniter/application/views/cadastro_usuario.php";
                </SCRIPT><?php
            }
            //   comprovamos que o usuario exista na base de dados e a password inserida seja correta
            else if ($ExisteUsuarioeNome) {   // A variavel $ExisteUsuarioePassoword recebe valor TRUE se o usuario existe e FALSE em caso negativo. Este valor é determinado pelo modelo.
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Usuario já cadastrado!");
                    window.location = "http://localhost/CodeIgniter/application/views/cadastro_usuario.php";
                </SCRIPT><?php
            } else {
                $this->model->cadastrar($data);
            }
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Cadastro efetuado!");
                window.location = "http://localhost/CodeIgniter/";
            </SCRIPT><?php
        }
    }

}
