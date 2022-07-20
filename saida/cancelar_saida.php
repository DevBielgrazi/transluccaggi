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
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEL HIDDEN DO BANCO
	$mot_sai = trim($_POST['mot_sai']);
	$dat_sai = trim($_POST['dat_sai']);
    $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `motorista`='',`saida`='0000-00-00',`status`='DISPONIVEL',`tentativas`=`tentativas`-1 WHERE `motorista`='$mot_sai' AND `saida`='$dat_sai'");
?>
        <script>
			function formAutoSubmit()
			{
			var frm = document.getElementById("form");
			frm.submit();
			}
			window.onload = formAutoSubmit;
		</script>
		<form id="form" method="post" action="saida_motorista.php">
			<input autocomplete="off" type="hidden" name="mot_sai" value="<?php echo $mot_sai;?>">
			<input autocomplete="off" type="hidden" name="dat_sai" value="<?php echo $dat_sai;?>">
		</form>
	</body>
</html>
<?php
    }
}
?>