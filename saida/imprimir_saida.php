<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<title>.</title>
	</head> 
	<body>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FOMRULÁRIO
    $mot_sai = trim($_POST['mot_sai']);
	$dat_sai = trim($_POST['dat_sai']);
#ADQUIRINDO DADOS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$mot_sai'");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
	$n1 = mysqli_num_rows($sql);
#CADASTROS POR COLUNA
    $sql2 = mysqli_fetch_array($sql);
    $nom_mot = $sql2['nome'];
    $vei_mot = $sql2['veiculo'];
    $pla_mot = $sql2['placa'];

?>
	<table border=2>
		<tr>
			<td>DATA:<?php  echo date( 'd/m/Y' , strtotime($dat_sai)) ?></td>
			<td>MOTORISTA:<?php  echo $nom_mot ?></td>
			<td>VEÍCULO:<?php echo $vei_mot  ?></td>
			<td>PLACA:<?php echo $pla_mot  ?></td>
		</tr>
		<tr>
			<td>NF</td>
			<td>VALOR</td>
			<td>VOLUMES</td>
			<td>CLIENTE</td>						
			<td>ENDEREÇO</td>						
		</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai' ORDER BY `cidade_cliente`");
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DO BANCO
	while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
        <tr>
            <td><nobr><?php echo $vn['numero'];   ?></nobr></td>
            <td><nobr><?php echo $vn['valor'];    ?></nobr></td>
            <td><nobr><?php echo $vn['volumes'];    ?></nobr></td>
            <td><nobr><?php echo $vn['nome_cliente'];    ?></nobr></td>
            <td><nobr><?php echo $vn['endereco_cliente'];    ?></nobr></td>
		</tr>
<?php
    $i = $i + 1;
    }
	$sql = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$sql = mysqli_fetch_array($sql);
#VARIÁVEL DO BANCO
	$tot_vol = $sql['vol'];
	$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$sql = mysqli_fetch_array($sql);
#VARIÁVEL DO BANCO
	$val_tot = number_format(($sql['val']), 2, '.', '');
?>
		<tr>
			<td>TOTAL VOLUMES:<?php  echo $tot_vol ?></td>
			<td>VALOR TOTAL:<?php  echo $val_tot ?></td>
			<a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=10%></a>
		</tr>
        <script>window.print();</script>
    </body>
</htmml>