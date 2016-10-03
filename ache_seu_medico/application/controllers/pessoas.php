<?php

class Pessoas extends CI_Controller {

    public function cadastrar() {

        $endereco = $_POST["endereco"];
        $cidade = $_POST["cidade"];
        $estado = $_POST["estado"];
        $address = $endereco . "," . $cidade . "," . $estado . "," . "Brasil";

        $endereco = str_replace(" ", "+", $address);


        echo $request_url = "http://maps.google.com.br/maps/api/geocode/xml?address=" . $endereco . "&sensor=true"; // the request URL you'll send to google to get back your XML feed
        $xml = simplexml_load_file($request_url) or die("url not loading"); // XML request
        $status = $xml->status; // GET the request status as google's api can return several responses
        if ($status == "OK") {
            //request returned completed time to get lat / lang for storage
            $latitude = $xml->result->geometry->location->lat;
            $longitude = $xml->result->geometry->location->lng;
            //  echo "$latitude,$longitude";  //spit out results or you can store them in a DB if you wish
        }
        if ($status == "ZERO_RESULTS") {
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Favor informar o endereço correto!");
                window.location = "http://localhost/ache_seu_medico/application/views/cadastro_usuario.php";
            </SCRIPT><?php
        }
        if ($status == "OVER_QUERY_LIMIT") {
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Estourou o limite de consulta!");
                window.location = "";
            </SCRIPT><?php
        }
        if ($status == "REQUEST_DENIED") {
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Acesso Negado!");
                window.location = "";
            </SCRIPT><?php
        }
        if ($status == "INVALID_REQUEST") {
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Acesso Negado!");
                window.location = "";
            </SCRIPT><?php
        }

// echo "$latitude,$longitude";

        $data['nome_solicitante'] = $this->input->post('nome_solicitante');
        $data['cpf'] = $this->input->post('cpf');
        $data['cnes'] = $this->input->post('cnes');
        $data['cnpj'] = $this->input->post('cnpj');
        $data['endereco'] = $this->input->post('endereco');
        $data['cidade'] = $this->input->post('cidade');
        $data['estado'] = $this->input->post('estado');
        $data['cep'] = $this->input->post('cep');
        $data['email'] = $this->input->post('email');
        $data['telefone'] = $this->input->post('telefone');

        $this->load->model('pessoas_model');
        $ExisteCadastroCPF = $this->pessoas_model->ValidarCPF_Login($_POST["cpf"]);
        /* Carrega o modelo */
        //verifica se latitude é nulo
        if ($ExisteCadastroCPF) {
            ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("CPF já cadastrado no sistema");
                window.location = "http://localhost/ache_seu_medico/application/views/cadastro_usuario.php";
            </SCRIPT><?php
        } else {
            if ($status == "OK") {
                $data['latitude'] = $latitude;
                $data['longitude'] = $longitude;
                $this->load->model('pessoas_model', 'model', TRUE);
                /* Chama a função inserir do modelo */
                $this->model->cadastrar($data);
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Pré cadastro efetuado com sucesso!Favor aguardar email");
                    window.location = "http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin";
                </SCRIPT><?php
            }
        }
    }

    public function consultas() {
        ?><script> var hora = new Date();</script><?php
        $horaAtual = "<script>document.write(hora.getHours()+':'+hora.getMinutes());</script>";

        $meu_local = $_POST["meu_local"];
        if ($meu_local == "Outros") {
            $outros = $_POST["outros"];
            $outros = str_replace(" ", "+", $outros);

            $request_url = "http://maps.google.com.br/maps/api/geocode/xml?address=" . $outros . "&sensor=false"; // the request URL you'll send to google to get back your XML feed
            $xml = simplexml_load_file($request_url) or die("url not loading"); // XML request
            $status = $xml->status; // GET the request status as google's api can return several responses
            if ($status == "OK") {
                //request returned completed time to get lat / lang for storage
                $latitude = $xml->result->geometry->location->lat;
                $longitude = $xml->result->geometry->location->lng;
                // echo "$latitude,$longitude";  //spit out results or you can store them in a DB if you wish
                $informa_especialidade = $_POST["informa_especialidade"];
                $dados['dados_acesso'] = $this->db->select('*, ( 6371 * ACOS( COS( RADIANS(' . $latitude . ') ) * COS( RADIANS(latitude) ) * '
                        . 'COS( RADIANS(longitude) - RADIANS(' . $longitude . ') ) + '
                        . 'SIN( RADIANS(' . $latitude . ') ) * SIN( RADIANS(latitude) ) ) ) AS distancia', FALSE);
                $dados['dados_acesso'] = $this->db->where('especialidade_medico', $informa_especialidade);
                $dados['dados_acesso'] = $this->db->get('tbl_cadastro_medico')->result();
            }

            if ($status == "ZERO_RESULTS") {
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Favor informar endereço correto!");
                    window.location = "http://localhost/ache_seu_medico/";
                </SCRIPT><?php
            }
            if ($status == "OVER_QUERY_LIMIT") {
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Estourou o limite de consulta!");
                    window.location = "http://localhost/ache_seu_medico/";
                </SCRIPT><?php
            }
            if ($status == "REQUEST_DENIED") {
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Acesso Negado!");
                    window.location = "http://localhost/ache_seu_medico/";
                </SCRIPT><?php
            }
            if ($status == "INVALID_REQUEST") {
                ?> <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Acesso Negado!");
                    window.location = "http://localhost/ache_seu_medico/";
                </SCRIPT><?php
            }
        }
        $this->load->model('pessoas_model');
        $ExisteCadastroEspecialidade = $this->pessoas_model->ValidarEspecialidade($_POST["informa_especialidade"]);
        if ($meu_local == 1) {
            $informa_especialidade = $_POST["informa_especialidade"];
            //$meu_local = $_POST["meu_local"]; 
            $dados['hora_atual'] = $horaAtual;


            $longitude_origem = $_POST["longitude"];
            $latitude_origem = $_POST["latitude"];

            $dados_origem['dados_origem'] = $this->db->select('*, ( 6371 * ACOS( COS( RADIANS(' . $latitude_origem . ') ) * COS( RADIANS(latitude) ) * '
                    . 'COS( RADIANS(longitude) - RADIANS(' . $longitude_origem . ') ) + '
                    . 'SIN( RADIANS(' . $latitude_origem . ') ) * SIN( RADIANS(latitude) ) ) ) AS distancia', FALSE);
            $dados['dados_origem'] = $this->db->where('especialidade_medico', $informa_especialidade);
            $dados_origem['dados_origem'] = $this->db->get('tbl_cadastro_medico')->result();
            // verica se url é nula
        }

        if ($ExisteCadastroEspecialidade) {
            if ($meu_local == 1) {
                $this->load->view('tela_resposta_atendimento', $dados_origem);
            }

            if ($meu_local == "Outros") {
                if ($status == "OK") {
                    $this->load->model('pessoas_model');
                    //echo $latitude;'<br>';

                    $dados_distancia = $this->pessoas_model->retorna_distancia($latitude, $longitude);
                    foreach ($dados_distancia->result() as $linha) {
                        $lat = "$linha->distancia";
                    }
                    //  $dados['dados_acesso'] = $lat;
                    //  $dados['latitude_outros'] = $latitude;
                    // $dados['longitude_outros'] = $longitude;

                    $this->load->view('tela_resposta_atendimento_outros', $dados);
                }
            }
        }
        //  } 
        else {
            $data['falta_cadastro'] = "<font color='red'>*Não existem nenhum cadastro para essa especialidade.</font>";
            $this->load->view('tela_consulta_atendimento', $data);
        }
    }

}
