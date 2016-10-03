<head><meta charset='utf-8'></head>
<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>

<script src="http://localhost/ache_seu_medico/js/bootstrap.min.js"></script>

<link href="http://localhost/ache_seu_medico/css/bootstrap.min.css" rel="stylesheet">   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" 
href="http://localhost/ache_seu_medico/css/jquery.dataTables.min.css"></style>

<script>function mostraCampo(el)
    {
        var inputOutros = document.getElementById('outros');
        if (el.value === 'Outros') {
            inputOutros.style.display = "block";
        } else {
            inputOutros.style.display = "none";
        }
    }</script>
<link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_padrao.css">






<div  class="card card-container"> <img id="profile-img" class="profile-img-card" src="http://localhost/ache_seu_medico/dist/img/medico.jpg" />


    <form id="localizacao"  class="form-signin" method="post"  accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/pessoas/consultas">            

        <body>           
            <div class="table-responsive">

                <?php
                foreach ($dados_acesso as $dados) {
                    // DEFINE O FUSO HORARIO COMO O HORARIO DE BRASILIA
                    date_default_timezone_set('America/Sao_Paulo');
// CRIA UMA VARIAVEL E ARMAZENA A HORA ATUAL DO FUSO-HORÀRIO DEFINIDO (BRASÍLIA)
                    //$HoraLocal = date('H:i', time());
                    $hora_data_atual = date('H:i', time());
                    $data = strtotime($hora_data_atual);
                    $hora_data_atual = strtotime($dados->hora_saida);
                    $diferenca = $hora_data_atual - $data;
                    $hora = floor($diferenca / 3600);
                    $minutos = floor(($diferenca / 60) % 60);
                    $segundos = floor($diferenca % 60);
                    $resultado = "{$hora} hora e {$minutos} minutos ";
                    ?>

                    <br>  --------------------------------------------------------<br><tr> 

                        Id ocorrência: <td><?= $dados->id; ?> </td>  <br> <br>   
                    Nome do Médico: <td><?= $dados->nome_medico; ?> </td>  <br> <br>
                    Especialidade: <td><?= $dados->especialidade_medico; ?> </td> <br> <br>
                    Hora de Entrada: <td><?= $dados->hora_entrada; ?> </td>  <br> <br>
                    Hora Saída:<td><?= $dados->hora_saida; ?> </td> <br> <br>
                    Procura:<td><?= $dados->nivel_procura; ?> </td>  <br> <br>
                    Endereço:<td><?= $dados->local; ?> </td>  <br> <br>
                   <?php $distancia = substr($dados->distancia, 0, 5); ?>
                    Distância:<td><?= $distancia," Km"; ?> </td>  <br> <br>

                    <?php echo "O médico irá encerrar o expediente em ", $resultado, ""; //}               ?>
                    <br> <br><form class="form-signin" method="post" accept-charset="utf-8"  action="http://localhost/ache_seu_medico/index.php/" id="form"> 
                        <button class="btn btn-lg btn-primary btn-block btn-signin" name="botao" type="submit">Ir para destino</button> 
                        <input name="latitude"  type="hidden" id="latitude" value="<?= $dados->latitude; ?>"</td>
                        <input name="longitude"  type="hidden" id="longitude" value="<?= $dados->longitude; ?>"</td>
                    </form>
                <?php }
                ?>
                </tr>

                <?php //}   ?>
               <a href="http://localhost/ache_seu_medico/">
  <img src="http://localhost/ache_seu_medico/dist/img/Voltar.jpg" alt="Voltar" style="width:50px;height:50px;border:0;">
</a>
    </form>
</div><!-- /card-container -->

   
  