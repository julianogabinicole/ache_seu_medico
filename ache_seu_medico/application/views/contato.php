<link rel="shortcut icon" href="http://localhost/ache_seu_medico/dist/img/medico.jpg" >
<title>Ache seu Médico</title>

<style type="text/css">
    #box{

        border-radius: 10px;
    }

</style>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="iso-8859-1" />
        <link rel="stylesheet" type="text/css" href="http://localhost/ache_seu_medico/css/form_padrao_login.css">  
    <body>

        <div id="container">


            <div id="body"> 

                <form method="POST" class="form-signin"  accept-charset="utf-8" action="http://localhost/ache_seu_medico/index.php/contato/envia_email">

                    <div id="box" class="card card-container">
             <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->

                        <input type="text" id="inputEmail" class="form-control" name="cpf" placeholder="Informe seu CPF" required autofocus><br>
                        <input type="email" id="inputPassword" class="form-control" name="email" placeholder="Informe seu Email" required><br>


                        <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Enviar</button><br>

                        </form>
                       <a href="http://localhost/ache_seu_medico/index.php/encaminha_tela_inicial/login_admin">
  <img src="http://localhost/ache_seu_medico/dist/img/Voltar.jpg" alt="Voltar" style="width:50px;height:50px;border:0;">
</a>  
                    </div>

            </div>

    </body>
</html>