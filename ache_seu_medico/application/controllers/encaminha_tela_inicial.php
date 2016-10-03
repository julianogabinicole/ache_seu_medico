<?php

class Encaminha_tela_inicial extends CI_Controller {

 

    public function index() {

          
        $this->load->view('tela_consulta_atendimento');
   
    }
 public function login_admin() {

        $this->load->view('tela_login');
   
    }
     public function tela_altera_senha() {

        $this->load->view('tela_altera_senha');
   
    }
      public function tela_admin() {

        $this->load->view('tela_admin');
   
    }
       public function tela_cadastro_medico() {

        $this->load->view('tela_cadastro_medico');
   
    }
   
   
   
    
}