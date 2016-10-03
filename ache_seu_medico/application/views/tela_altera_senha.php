<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>

<style type="text/css">
    #box{

        border-radius: 10px;
    }

</style>
<link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_padrao.css">
<form class="form-signin" method="post"  accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/validacao_login_controler/atualiza_senha">

    <div id="box" class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="http://localhost/ache_seu_medico/dist/img/medico.jpg" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin">
            <span id="reauth-email" class="reauth-email"></span>
            <h1>Primeiro Acesso::<br>Informe sua Nova Senha</h1>
            <input type="password" id="inputPassword" class="form-control" name="nova_senha" placeholder="Informe sua Nova Senha" required>
            <div id="remember" class="checkbox">
             
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" name="botao" type="submit">Alterar</button>
        </form><!-- /form -->

        </tr>
    </div><!-- /card-container -->
</div><!-- /container -->
<?php
unset($_SESSION["matricula_logada"]);
?>


<?php
if (isset($_POST["botao"])) {

   $_SESSION["matricula_logada"] = $_POST["nome"];
    $_SESSION["senha_logada"] = $_POST["senha"];
}
?>




