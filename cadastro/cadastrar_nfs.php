<?php
	//Importando a Conexão
	require('../connect.php');
	
	// Pegando os valores
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);
		
	//Verificando se ja existe uma nota cadastrada
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `cod_cliente`= $cod_cli");
	
	//Transformando o resultado em numeros
	$numero = mysqli_num_rows($sql);
	if($numero != 0)
	{
		echo "Nota já cadastrada";
	}
	else
	{		
		// Inserindo os dados
		$sql = mysqli_query($conn,"INSERT INTO $tab_nfs VALUES ('$num_nf', '$ser_nf', '$emi_nf', '$ent_nf', '$val_nf', '$pes_nf', '$cod_cli')");	
		echo "Nota Cadastrada com Sucesso!";
	}		
?>
<p><a href="form_cadastrar_nfs.html">Voltar</a>