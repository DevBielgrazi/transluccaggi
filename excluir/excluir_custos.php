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
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEL HIDDEN DO BANCO
	$dat_cus = strtoupper($_POST['dat_cus']);
	$des_cus = strtoupper($_POST['des_cus']);
	$val_cus = strtoupper($_POST['val_cus']);
#EXCLUINDO REGISTRO DO BANCO
    $sql = mysqli_query($conn,"DELETE FROM $tab_cus WHERE `mes` = '$dat_cus' AND `descricao` = '$des_cus' AND `valor` = '$val_cus'");
?>
        <script>
			alert("CUSTO REMOVIDO!");
			document.location.href="http://localhost/transluccaggi/financeiro/form_relatorio_mensal.php";
		</script>
	</body>
</html>
<?php
    }
}
?>