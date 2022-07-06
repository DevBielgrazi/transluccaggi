<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 1 || $system_control == 2){
?>
<html lang="pt-br">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#VARIÁVEL HIDDEN DO FORMULÁRIO
	$id = trim($_POST['id']);
	$cod_cli = trim($_POST['cod_cli']);
#EXCLUINDO REGISTRO DO BANCO
    $sql = mysqli_query($conn,"DELETE FROM $tab_cli WHERE `id` = '$id'");
    $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `rota` = 'nulo', `nome_cliente` = 'nulo', `bairro_cliente` = 'nulo', `cidade_cliente` = 'nulo', `endereco_cliente` = 'nulo', `cod_distribuidora` = 'nulo' WHERE `cod_cliente` = '$cod_cli'");?>
        <script>
			alert("CLIENTE EXCLUIDO!");
			document.location.href="http://localhost/transluccaggi/pesquisa/form_pesquisar_clientes.php";
		</script>
	</body>
</html>
<?php
    }
}
?>