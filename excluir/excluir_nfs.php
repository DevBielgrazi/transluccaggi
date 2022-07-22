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
	$id = trim($_POST['id']);
#EXCLUINDO REGISTRO DO BANCO
    $sql = mysqli_query($conn,"DELETE FROM $tab_nfs WHERE `id` = '$id'");
?>
        <script>
			alert("NOTA EXCLUIDA!");
			document.location.href="http://localhost/transluccaggi/pesquisa/form_pesquisar_nfs.php";
		</script>
	</body>
</html>
<?php
    }
}
?>