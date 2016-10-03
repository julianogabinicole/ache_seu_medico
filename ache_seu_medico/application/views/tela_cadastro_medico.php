<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>

<script src="http://localhost/ache_seu_medico/js/bootstrap.min.js"></script>

<link href="http://localhost/ache_seu_medico/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 
href="http://localhost/ache_seu_medico/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://localhost/ache_seu_medico/js/consulta_tela.js"></script>

<style type="text/css">
    #box{

        border-radius: 10px;
    }

</style>
<link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_padrao_cadastro_medico.css">
<form class="form-inline" method="post"  accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/crud_registros_control/cadastrar_medico">

    <div id="box" class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="http://localhost/ache_seu_medico/dist/img/medico.jpg" />
        <p id="profile-name" class="profile-name-card"></p>

     
        <input type="text" id="inputEmail" size="45" class="form-control" name="nome_medico" placeholder="Informe o nome do médico" required autofocus>
        <br><br>
        <select id="inputEmail"  name="especialidade" class="form-control"  >
            <option value=""  align="center" selected="selected" >Informe a Especialidade </option>
            <option value="Clínico Médico">Clínico Médico</option>
            <option value="Pediatria">Ortopedia</option>
            <option value="Ginecologista">Ginecologista</option>
             <option value="Pediatria">Pediatria</option>
        </select><br><br>
        Das  <input type="text" size="10" id="inputHora" class="form-control" name="hora_entrada" placeholder="Hora Entrada" required autofocus>&nbsp; 
        até  <input type="text" id="inputHora" size="10" name="hora_saida" class="form-control" placeholder="Hora Saída" required autofocus>
        <br><h3>Procura::</h3>
     <input type="radio" name="quantidade_fila" value="Alta" class="form-control"> Alta(mais de 20) <br>
     <input type="radio" name="quantidade_fila" value="Média"class="form-control" > Média(11 a 20)<br>
<input type="radio" name="quantidade_fila" value="Baixa"class="form-control" > Baixa(até 10)<br><br>
        <button class="btn btn-lg btn-primary btn-block btn-signin" name="botao" type="submit">Cadastrar</button>
</form><!-- /form -->


</tr>
</div><!-- /card-container -->
</div><!-- /container -->



<?php
if (isset($_POST["botao"])) {

echo $_SESSION["matricula_logada"]; }


?>




