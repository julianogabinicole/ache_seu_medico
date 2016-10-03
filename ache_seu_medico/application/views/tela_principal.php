<title>Ache Seu Médico</title>
<link rel="shortcut icon" href="http://localhost/CodeIgniter/dist/img/img_cheque_on.jpg" >
<html lang=''>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="http://localhost/CodeIgniter/js/menu_mostra.js" type="text/javascript"></script>
        <script src="http://localhost/CodeIgniter/js/script.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title></title>
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="http://localhost/CodeIgniter/css/bootstrap.min.css" rel="stylesheet">   
        <link href="http://localhost/CodeIgniter/css/menu_vertical.css" rel="stylesheet">    
        <link rel="stylesheet" type="text/css" href="http://localhost/CodeIgniter/css/AVATAR.css">
       
   
        <SCRIPT type="text/javascript">
            window.history.forward();
            function noBack() {
                window.history.forward();
            }
        </SCRIPT>
        <SCRIPT type="text/javascript">
            function enviar_formulario() {
                document.formulario_href.submit()
            }
        </SCRIPT>
    </HEAD>
</head>
<body  onload="noBack();"
       onpageshow="if (event.persisted) noBack();" onunload="">
  
    <div>
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <?php $texto = $_SESSION["matricula_logada"]; ?>
                    <form class="form-signin" name="formulario_href" method="post" accept-charset="utf-8" action="http://localhost/CodeIgniter/index.php/encaminha/emite" >
                        <input name="nome" type="hidden" id="id" value="<?= $_SESSION["matricula_logada"]; ?>" />
                        <input name="senha" type="hidden" id="id" value="<?= $_SESSION["senha_logada"]; ?>" />
                    </form>
                    <span  style="font-size: 25px;" text-align:left class="icon-bar">
                       <font color="White"><?php if ($texto[0] == "F" or $texto[0] == "f") { ?><?= $_SESSION["func_dados"] ?><?php } ?>
                        <?php if ($texto[0] == "E" or $texto[0] == "e") { ?><?= $_SESSION["empresa_dados"] ?><?php } ?>
                        <?php if ($texto[0] == "A" or $texto[0] == "a") { ?><?= "Administrador" ?><?php } ?></font></span>

                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"></a></li>
                        <li><a href="#"></a></li>
                        <li><a href="http://localhost/CodeIgniter/index.php/"> <span  style="font-size: 20px;" text-align:left class="icon-bar">Sair</font></span></a></li>

                    </ul>

                </div>

        </nav>
    </div></div>
<div id='cssmenu'>

    <ul>
        <li class='last'><a></a> 
        <li class='last'><a><span> </span> </a> 

        <li class='last'><a href="javascript:enviar_formulario()"><span>Home</span></a> 
            <?php if ($texto[0] == "a" or $texto[0] == "A") { ?>

            <li class='active has-sub'><a href='#'><span>Manter Empresa</span></a>
                <ul>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/empresas/encaminhaLink_empresa/tela_cadastro'><span>Inserir</span></a>
                        <ul>

                        </ul>
                    </li>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/empresas/consultar/envia_consulta'><span>Consultar</span></a>

                    </li>

                </ul>

            </li>
        <?php } ?>
        <?php if ($texto[0] == "E" or $texto[0] == "e") { ?>


            <li class='active has-sub'><a href='#'><span>Manter Funcionário</span></a>
                <ul>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/funcionarios/encaminhaLink/tela_cadastro'><span>Inserir</span></a>
                        <ul>
                            <li><a href='#'><span>Inserir</span></a></li>
                        </ul>
                    </li>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/funcionarios/consultar/envia_consulta'><span>Consultar</span></a>

                    </li>

                </ul>

            </li>

            <li class='active has-sub'><a href='#'><span>Manter Cargo</span></a>
                <ul>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/cargos/encaminhaLink_cargo/tela_cadastro_cargo'><span>Inserir</span></a>
                        <ul>
                            <li><a href='#'><span>Inserir</span></a></li>
                        </ul>
                    </li>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/cargos/consultar_cargo/envia_consulta'><span>Consultar</span></a>

                    </li>

                </ul>

            </li>
            <li class='last'><a href='http://localhost/CodeIgniter/index.php/contra_cheque/cadastra_contra_cheque/envia_dados_select'><span>Cadastrar Contra Cheque</span></a> 

            <?php } ?>
            <?php if ($texto[0] == "a" or $texto[0] == "A") { ?>


            <li class='active has-sub'><a href='#'><span>Manter Funcionário</span></a>
                <ul>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/cad_funcionario_empresa/encaminhaLink/tela_cadastro'><span>Inserir</span></a>
                        <ul>
                            <li><a href='#'><span>Inserir</span></a></li>
                        </ul>
                    </li>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/cad_funcionario_empresa/consultar/envia_consulta'><span>Consultar</span></a>

                    </li>

                </ul>

            </li>
            <li class='active has-sub'><a href='#'><span>Manter Cargo</span></a>
                <ul>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/cargos_admin/encaminhaLink_cargo_admin/tela_cadastro_cargo'><span>Inserir</span></a>
                        <ul>
                            <li><a href='#'><span>Inserir</span></a></li>
                        </ul>
                    </li>
                    <li class='last'><a href='http://localhost/CodeIgniter/index.php/cargos_admin/consultar_cargo_admin/envia_consulta'><span>Consultar</span></a>

                    </li>

                </ul>

            </li>
            <li class='last'><a href='http://localhost/CodeIgniter/index.php/contra_cheque_admin/cadastra_contra_cheque_admin/envia_dados_matricula'><span>Cadastrar Contra Cheque</span></a> 
            <li class='last'><a href='http://localhost/CodeIgniter/index.php/contra_cheque_admin/control_gera_pdf_contra_cheque_admin/envia_matricula_funcionario'><span>Visualizar Contra Cheque</span></a> 
            <?php }
            ?>
            <?php if ($texto[0] == "F" or $texto[0] == "f") { ?>

            <li class='last'><a href='http://localhost/CodeIgniter/index.php/contra_cheque/control_gera_pdf_contra_cheque/tela_escolha_periodo'><span>Visualizar Contra Cheque</span></a> 
            <?php } ?>
            <?php if ($texto[0] == "F" or $texto[0] == "f" or $texto[0] == "a" or $texto[0] == "A"or $texto[0] == "e"or $texto[0] == "E") { ?>

            <li class='last'><a href='http://localhost/CodeIgniter/index.php/control_altera_senha/altera_senha/mudar_senha'><span>Alterar Senha</span></a> </li>
            <?php } ?>

    </ul>
</div>


</body>
</html>
<?php
//Inicia a sessão
//if(!isset($_SESSION)) 
// { 
//   session_start(); 
//} 
//Verifica se há dados ativos na sessão
if (empty($_SESSION["matricula_logada"])) {
//Caso não exista dados registrados, exige login
    header("Location:./login.php");
}
// Verifica se $_SESSION['ultimoClick'] esta setada e não esta vazia.
// Caso esteja, ele verifica o tempo que o usuario levou entre um clique e outro.
// Caso não, ele seta a sessão e dá o valor do tempo time() atual.
if (isset($_SESSION['ultimoClick']) AND ! empty($_SESSION['ultimoClick'])) {

    $tempoAtual = time();

    if (($tempoAtual - $_SESSION['ultimoClick']) > '500') {

//session_unregister($_SESSION['ultimoClick']);
        $_SESSION = array();
        session_destroy();
        header("Location:http://localhost/CodeIgniter/");
        exit();
    } else {

        $_SESSION['ultimoClick'] = time();
    }
} else {

    $_SESSION['ultimoClick'] = time();
}
?>