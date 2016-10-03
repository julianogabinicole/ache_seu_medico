<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>
<?php //session_start(); // Inicia a sessão?>

<style type="text/css">
    #box{

        border-radius: 10px;
    }

</style>
<link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_padrao_login.css">
<form class="form-signin" method="post"  accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/validacao_login_controler/valida_login">

    <div id="box" class="card card-container">
        <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
        <img id="profile-img" class="profile-img-card" src="http://localhost/ache_seu_medico/dist/img/medico.jpg" />
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputEmail" class="form-control" name="nome" placeholder="Informe seu CPF" required autofocus>
            <input type="password" id="inputPassword" class="form-control" name="senha" placeholder="Informe sua Senha" required>
            <div id="remember" class="checkbox">
                <label>
                    <input type="checkbox" value="relembrar"> Relembrar
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block btn-signin" name="botao" type="submit">Logar</button>
        </form><!-- /form -->

        <a href="http://localhost/ache_seu_medico/application/views/contato.php" class="forgot-password"> 
            Esqueceu-se da senha?</a><br><br>
        <tr  align="right">
            <td>

                <a href="http://localhost/ache_seu_medico/application/views/cadastro_usuario.php" class="forgot-password">
                    Não possuo cadastro
                </a></td>
               <br>   <br> <tr align="left"><td>

                <a href="http://localhost/ache_seu_medico/" class="forgot-password">
                    Buscar Médico
                </a></td><tr>
        </tr>
    </div><!-- /card-container -->
</div><!-- /container -->
<?php
unset($_SESSION["matricula_logada"]);
unset($_SESSION["senha_logada"]);
?>


<?php
if (isset($_POST["botao"])) {

   $_SESSION["matricula_logada"] = $_POST["nome"];
    $_SESSION["senha_logada"] = $_POST["senha"];
}
?>
   

