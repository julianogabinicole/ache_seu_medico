<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->load->model("m_departamentos_produtos");

        $departamentos = $this->m_departamentos_produtos->retorna_departamentos();

        $option = "<option value=''></option>";
        foreach ($departamentos->result() as $linha) {
            $option .= "<option value='$linha->departamentos_id'>$linha->departamentos_nome</option>";
        }

        $variaveis['options_departamentos'] = $option;

        $this->load->view('cadastros_usuarios/tela_altera_usuario', $variaveis);
    }

}
