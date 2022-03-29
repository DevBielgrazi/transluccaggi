<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<title>.</title>
	</head> 
	<body>
<?php
	require('../connect.php');
	
    $mot_sai = trim($_POST['mot_sai']);
	$dat_sai = trim($_POST['dat_sai']);
		
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$mot_sai'");
	$n1 = mysqli_num_rows($sql);
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
		</tr>
<?php
    $i=0;	
	if(!isset($_POST['not_sai'])) {
        $not_sai = null;
    } else {
        $not_sai = trim($_POST['not_sai']);
    }
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$not_sai'");
	$v = mysqli_fetch_array($sql);
	if(!isset($v['tentativas'])) {
        $t = 0;
    } else 
	{
        $t = $v['tentativas'] + 1;
    }	
	$sql = mysqli_query($conn,"UPDATE $tab_nfs SET `motorista` = '$nom_mot',`saida` = '$dat_sai',`status` = 'ROTA',`tentativas` = '$t' WHERE `numero` = '$not_sai'");
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$n = mysqli_num_rows($sql);
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
        <tr>
            <td><nobr><?php echo $vn['numero'];   ?></nobr></td>
            <td><nobr><?php echo $vn['valor'];    ?></nobr></td>
            <td><nobr><?php echo $vn['volumes'];    ?></nobr></td>
            <td><nobr><?php echo $vn['nome_cliente'];    ?></nobr></td>
		</tr>
<?php
    $i = $i + 1;
    }
	$sql = mysqli_query($conn,"SELECT SUM(`volumes`) as 'vol' FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$sql = mysqli_fetch_array($sql);
	$tot_vol = $sql['vol'];
	$sql = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `motorista` = '$nom_mot' and `saida` = '$dat_sai'");
	$sql = mysqli_fetch_array($sql);
	$val_tot = number_format(($sql['val']), 2, '.', '');
?>
		<tr>
			<td>TOTAL VOLUMES:<?php  echo $tot_vol ?></td>
			<td>VALOR TOTAL:<?php  echo $val_tot ?></td>
		</tr>
        <script>window.print();</script>
    </body>
</htmml>