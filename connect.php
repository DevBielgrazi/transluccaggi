<?php 
	// Conexão com o banco de dados
	$conn = mysqli_connect("localhost", "root", "") or die("Não foi possível a conexão com o Banco");

	// Selecionando banco
	$db = mysqli_select_db($conn,"transluccaggi_bd") or die("Não foi possível selecionar o Banco");

	//Tabelas
	$tab_nfs = "notas_fiscais";
	$tab_cli = "clientes";
	$tab_dis = "distribuidoras";
	$tab_mot = "motoristas";
 ?>