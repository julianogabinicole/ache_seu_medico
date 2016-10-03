<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>

<script src="http://localhost/ache_seu_medico/js/bootstrap.min.js"></script>

<link href="http://localhost/ache_seu_medico/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 
href="http://localhost/ache_seu_medico/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://localhost/ache_seu_medico/js/consulta_tela.js"></script>



<script>

    $(document).ready(function () {
        $('#minhaTabela').dataTable();
    });
</script>



<html lang="pt-BR">
    <head>

        <meta charset="UTF-8" />

        <link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_exibe_relatorio.css">  

    </head>
    <body>
        
             <div id="box" class="card card-container">
           <div class="form-group"  top:20px; left:6px;"><h1>Painel de Controle de Acesso</h1></div><br><br>      <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <div class="table-responsive">
                 
                    <table id="minhaTabela" class="display table" width="100%" >

                        <thead>  
                            <tr>  
                                <th width="4%">Código</th> 
                                <th width="10%">Nome</th> 
                                <th width="10%">CPF</th> 
                                <th width="10%">CNES</th> 
                                <th width="10%">CNPJ</th> 
                                <th width="10%">Endereço</th> 
                                <th width="10%">CEP</th> 
                                <th width="10%">Email</th>
                                <th width="20%">Telefone</th> 
                                <th width="10%">Latitude</th>
                                <th width="20%">Longitude</th> 
                                <th width="10%"></th> 
                                <th width="10%"></th> 

                            </tr>  
                        </thead>  
                        <tbody>
                            <?php foreach ($dados as $dados) { ?>
                                <tr>  
                                    <td><?= $dados->id_usuario; ?> </td> 
                                    <td><?= $dados->nome_solicitante; ?> </td>
                                    <td><?= $dados->cpf; ?> </td>
                                    <td><?= $dados->cnes; ?> </td>
                                    <td><?= $dados->cnpj; ?> </td>
                                    <td><?= $dados->endereco; ?> </td>
                                    <td><?= $dados->cep; ?> </td>
                                    <td><?= $dados->email; ?> </td>
                                    <td><?= $dados->telefone; ?> </td>
                                    <td><?= $dados->latitude; ?> </td>
                                    <td><?= $dados->longitude; ?> </td>

                            <form class="form-signin" method="post" accept-charset="utf-8"  action="http://localhost/ache_seu_medico/index.php/crud_registros_control/exclui" id="form">
                                <td><button  name="excluir" class="btn btn-danger" type="submit">Remover</button>
                                    <input name="id_remover"  type="hidden" id="id_remover" value="<?= $dados->id_usuario; ?>"</td>
                            </form>
                            <form class="form-signin" method="post" accept-charset="utf-8"  action="http://localhost/ache_seu_medico/index.php/crud_registros_control/cadastrar" id="form">
                                <td><button  name="cadastrar" class="btn btn-primary"  type="submit">Cadastrar</button>
                                          <input name="id_cadastrar"  type="hidden" id="id_cadastrar" value="<?= $dados->id_usuario; ?>"</td>
                                    <input name="nome_solicitante"  type="hidden" id="nome_solicitante" value="<?= $dados->nome_solicitante; ?>"</td>
                                <input name="cpf"  type="hidden" id="cpf" value="<?= $dados->cpf; ?>"</td>
                                <input name="cnes"  type="hidden" id="cnes" value="<?= $dados->cnes; ?>"</td>
                                <input name="cnpj"  type="hidden" id="cnpj" value="<?= $dados->cnpj; ?>"</td>
                                <input name="endereco"  type="hidden" id="endereco" value="<?= $dados->endereco; ?>"</td>
                                <input name="cep"  type="hidden" id="cep" value="<?= $dados->cep; ?>"</td>
                                <input name="email"  type="hidden" id="email" value="<?= $dados->email; ?>"</td>
                                <input name="telefone"  type="hidden" id="telefone" value="<?= $dados->telefone; ?>"</td>
                                 <input name="latitude"  type="hidden" id="latitude" value="<?= $dados->latitude; ?>"</td>
                                <input name="longitude"  type="hidden" id="longitude" value="<?= $dados->longitude; ?>"</td>
                            </form>


                            </tr>
                        <?php } ?>
                        </tbody>  
                    </table><br><br>
<a href="http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin">
  <img src="http://localhost/ache_seu_medico/dist/img/Voltar.jpg" alt="Voltar" style="width:50px;height:50px;border:0;">
</a>
                </div>     </div> 
        </div>
</html>
