<?php
	//Importando a Conexão
	require('../connect.php');
	
	// Pegando os valores
	$cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cad_cli = trim($_POST['cad_cli']);
    $rot_cli = trim($_POST['rot_cli']);
    $cid_cli = trim($_POST['cid_cli']);
    $bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
    $cod_dis = trim($_POST['cod_dis']);
		
	//Verificando se ja existe um cliente cadastrado
	$sql = mysqli_query($conn,"SELECT * FROM $tab_clientes WHERE `codigo` = $cod_cli and `cod_distribuidora`= $cod_dis");
	
	//Transformando o resultado em numeros
	$numero = mysqli_num_rows($sql);
	if($numero != 0)
	{
		echo "Cliente já cadastrado";
	}
	else
	{		
		// Inserindo os dados
		$sql = mysqli_query($conn,"INSERT INTO $tab_clientes VALUES ('$cod_cli', '$nom_cli', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");	
		echo "Cliente Cadastrado com Sucesso!";
	}		
?>