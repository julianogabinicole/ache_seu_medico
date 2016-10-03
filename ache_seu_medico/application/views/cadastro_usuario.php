<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>
<style type="text/css">
    #box{

        border-radius: 10px;
    }

</style><!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="http://localhost/CodeIgniter/css/formulario_tela_cadastro_funcionario.css">  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script type="text/javascript" 
    src="http://localhost/CodeIgniter/js/tratamento_campos.js"></script>
    <script type="text/javascript" src="http://localhost/CodeIgniter/js/trata_campo_cpf.js"></script>
    <script type="text/javascript" src="http://localhost/CodeIgniter/js/trata_cpf.js"></script>   
    <link rel="stylesheet" href="dist/css/bootstrap-select.css">      
</head>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_cadastro_usuario.css">  

    </head>
    <body>
        <form class="form-signin" id="form" name="form" method="post" accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/pessoas/cadastrar">


            <div id="box" class="card card-container">
 <a href="http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin">
  <img src="http://localhost/ache_seu_medico/dist/img/Voltar.jpg" alt="Voltar" style="width:50px;height:50px;border:0;">
</a>  
                <table>
                    <tr><h2>Cadastrar Usuário <h2></tr>
                            </table>

                            Nome do Solicitante : *  <input onKeypress="return somente_letras(event)"  maxlength="30" type="text" 
                                                            class="form-control"inputEmail name="nome_solicitante" placeholder="Nome" required autofocus>
                            CPF do Solicitante : * <input type="text"   onKeyPress="return Apenas_Numeros(event);" onBlur="validaCPF(this);" 
                                                          title="Digite o CPF no formato nnn.nnn.nnn-nn" id="cpf" class="form-control" size="11" 
                                                          maxlength="14" name="cpf" placeholder="xxx.xxx.xxx-xx" required>
                            Cadastro Nacional de Estabelecimento de Saúde - CNES: *(Visível ao público) 
                            Informar o número do CNES disponivel no site http://cnes.datasus.gov.br/ (consulta ou cadastro)
                            <input type="text" placeholder="CNES"  class="form-control"  name="cnes" maxlength="30" required="required">
                            CNPJ : * 
                            Informe o número do CNPJ do serviço de saúde sem os caracateres (. ou /)
                            <input type="text" placeholder="CNPJ"  class="form-control"  name="cnpj" maxlength="30" required="required">
                            Endereço: * 
                            Informar o endereço completo do estabelecimento de saúde
                            Endereço : *<input type="text" placeholder="Endereço" class="form-control" name="endereco" maxlength="100" required="required">
                            Cidade : *<input type="text" placeholder="Cidade" class="form-control" name="cidade" maxlength="100" required="required">
                            UF :    <select id="inputEmail" name="estado" class="form-control">

                                <option value="DF">Distrito Federal</option>
                                <option value="SP">São Paulo</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>

                            </select> 
                            CEP :<input type="text" placeholder="CEP"  class="form-control"  name="cep" maxlength="30" required="required">
                            E-mail para contato : * 
                            Informar o email institucional para contato. (por exemplo: direcao@provedor.com.br)
                            <input type="text" placeholder="Email"  class="form-control"   name="email" maxlength="30" required="required">
                            Telefone: *Informar o número do telefone de contato do estabelecimento de saúde, com DD.
                            <input type="text"  class="form-control"   onKeyPress="fone(this, document.form.data)"  class="form-control" name="telefone" maxlength="14" pattern="\([0-9]{2}\)[0-9]{4}-[0-9]{4}" placeholder="(xx) xxxx-xxxx" required>


                            </select>
                            <br><br>

                            <button name="botao" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Cadastrar</button><br>
                                       
                            </div>
                            </form>




                            </body>
                            </html>