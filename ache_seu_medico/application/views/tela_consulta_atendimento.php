<head><meta charset='utf-8'></head>
<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>

<script src="http://localhost/ache_seu_medico/js/bootstrap.min.js"></script>

<link href="http://localhost/ache_seu_medico/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 
href="http://localhost/ache_seu_medico/css/jquery.dataTables.min.css"></style>
<script type="text/javascript" 
src="http://localhost/ache_seu_medico/js/consulta_tela.js"></script>
<script>function mostraCampo( el )
{
  var inputOutros = document.getElementById('outros');
  if (el.value === 'Outros'){ 
   	  inputOutros.style.display = "block";
  }
  else {
      inputOutros.style.display = "none";
  }
}</script>
<script type="text/javascript">
var hora = new Date();

</script>

</HTML>

<link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_padrao.css">
<body onLoad="ExibirLocalizacao()">
<form id="localizacao"  class="form-signin" method="post"  accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/pessoas/consultas">


    <div id="box" class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="http://localhost/ache_seu_medico/dist/img/medico.jpg" />

            <select  onchange='mostraCampo(this)' name="meu_local"  class="form-control "  >
                <option  value="1" align="center" selected="selected">Seu Local</option>
                <option value="Outros">Informe outro Local</option>
            </select>  <label class="col-md-3 control-label" for="textinput" style="display:none" >Outros:</label>   
            <div class="col-md-7" ><br> 
               <input type="textinput" id="outros" style='display:none'  name="outros" class="form-control" placeholder="Endereço/Cidade/Estado"> <br>
            </div>
         
            <select id="inputEmail" name="informa_especialidade" class="form-control">
                <option value=""  align="center" selected="selected">Informe a Especialidade </option>
                <option value="Clínico Médico">Clínico Médico</option>
                <option value="Ortopedia">Ortopedia</option>
                <option value="Ginecologista">Ginecologista</option>
                  <option value="Pediatria">Pediatria</option>
              
            </select>   <?php  if (isset($_POST["botao"])) 
                {
                    echo $falta_cadastro ;//mensagem de erro que não existe cadastro especialidade ;
                   //   echo $falta_endereco;  
                } ?>
            <br><br>

            <input type="hidden" name="latitude" value="" id="lt" />
<input type="hidden" name="longitude" value="" id="lg" />
             <td><button  name="botao" class="btn btn-primary"  type="submit">Verificar</button> </td>
        </form><!-- /form -->


    </tr><tr align="center"><td>      <br><br>
        <a href="http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin" class="forgot-password">
            Acesso Administrador
        </a></td>
</tr>
</div><!-- /card-container -->
</div><!-- /container -->

<style type="text/css">
    #box{

        border-radius: 10px;
    }

</style>
<script type="text/javascript">
var area = document.getElementById("geoarea");
function ExibirLocalizacao(){ 
if(navigator.geolocation){ navigator.geolocation.getCurrentPosition(ObterPosicao); }
else{ document.getElementById("geoarea").innerHTML = "Sem suporte geolocalização."; } }
function ObterPosicao(posicao){ 
   document.getElementById('lt').value = posicao.coords.latitude;
   document.getElementById('lg').value = posicao.coords.longitude;
   document.getElementById("geoarea").innerHTML = "Latitude: " + posicao.coords.latitude + "<br /> Longitude: " + posicao.coords.longitude;
}
</script></body>
<?php

date_default_timezone_set('America/Sao_Paulo');

   $hora1      = strtotime('19:00');
   $hora2      = strtotime('01:00');
  $horaAtual = strtotime(date('H:i'));
	

if ($horaAtual > $hora1 && $horaAtual < $hora2){
	
	//... CODIGO A SER EXECUTADO CASO ESTEJÁ NO HORARIO!
	
	
} else {
	
	echo "HORARIO EXPIRADO"; // MENSAGEM EXIBIDA CASO O HORARIO ESTEJA EXPIRADO!
	
}