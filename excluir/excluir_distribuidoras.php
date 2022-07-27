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
<!DOCTYPE html>
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
	$cod_dis = strtoupper($_POST['cod_dis']);
#EXCLUINDO REGISTRO DO BANCO
    $sql = mysqli_query($conn,"DELETE FROM $tab_dis WHERE `codigo` = '$cod_dis'");
    $sql2 = mysqli_query($conn,"UPDATE $tab_nfs SET `cod_distribuidora` = 'nulo' WHERE `cod_distribuidora` = '$cod_dis'");
    $sql3 = mysqli_query($conn,"UPDATE $tab_cli SET `cod_distribuidora` = 'nulo' WHERE `cod_distribuidora` = '$cod_dis'");
?>
        <script>
			alert("DISTRIBUIDORA EXCLUIDA!");
			document.location.href="http://localhost/transluccaggi/pesquisa/form_pesquisar_distribuidoras.php";
		</script>
	</body>
</html>
<?php
    }
}
?>