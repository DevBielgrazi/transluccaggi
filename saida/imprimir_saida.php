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
			<td><h3>DATA:<?php  echo date( 'd/m/Y' , strtotime($dat_sai)); ?></h3></td>
			<td><h3>MOTORISTA:<?php  echo $nom_mot; ?></h3></td>
			<td><h3>VEÍCULO:<?php echo $vei_mot  ?></h3></td>
			<td><h3>PLACA:<?php echo $pla_mot  ?></h3></td>
		</tr>
		<tr>
			<td><h3>NF</h3></td>
			<td><h3>VALOR</h3></td>
			<td><h3>VOLUMES</h3></td>
			<td><h3>CLIENTE</h3></td>						
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
            <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
            <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
            <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
            <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
<?php
    $i = $i + 1;
    }        		
?>
        <script>window.print();</script>
    </body>
</htmml>