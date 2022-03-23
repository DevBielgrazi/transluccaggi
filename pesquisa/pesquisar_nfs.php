<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet">
		<title>Matriz Principal</title>
	</head> 
	<body>	
		<menu>
			<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
			<h1>MATRIZ PRINCIPAL</h1><p>
			<table class="tableb">
				<tr><td><h2>CADASTROS</h2></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>PESQUISAS</h2></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
            </table>
		</menu>
        <urn>
            <table border=1>
                <tr><h3>NOTAS FISCAIS</h3></tr>
                <tr>
					<td><h3>NÚMERO</h3></td>
					<td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>COD_<br>CLIENTE</h3></td>
                    <td><h3>STATUS</h3></td>						
				</tr>
<?php
	require('../connect.php');
	
	$num_nf = trim($_POST['num_nf']);
    $ser_nf = trim($_POST['ser_nf']);
    $emi_nf = trim($_POST['emi_nf']);
    $ent_nf = trim($_POST['ent_nf']);
    $val_nf = trim($_POST['val_nf']);
    $pes_nf = trim($_POST['pes_nf']);
    $cod_cli = trim($_POST['cod_cli']);

    //Verificando Checkboxes

    if (!isset($_POST['tod'])) {
        $fil_tod = 0;
    } else {
        $fil_tod = 1;
    }
    if (!isset($_POST['num'])) {
        $fil_num = 0;
    } else {
        $fil_num = 1;
    }
    if (!isset($_POST['ser'])) {
        $fil_ser = 0;
    } else {
        $fil_ser = 1;
    }
    if (!isset($_POST['emi'])) {
        $fil_emi = 0;
    } else {
        $fil_emi = 1;
    }
    if (!isset($_POST['ent'])) {
        $fil_ent = 0;
    } else {
        $fil_ent = 1;
    }
    if (!isset($_POST['val'])) {
        $fil_val = 0;
    } else {
        $fil_val = 1;
    }
    if (!isset($_POST['pes'])) {
        $fil_pes = 0;
    } else {
        $fil_pes = 1;
    }
    if (!isset($_POST['cli'])) {
        $fil_cli = 0;
    } else {
        $fil_cli = 1;
    }

    //Filtrando através das Checkboxes

    if($fil_tod==0 && $fil_num==0 && $fil_ser==0 && $fil_emi==0 && $fil_ent==0 && $fil_val==0 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '0' ORDER BY `id`");
    }
    elseif($fil_tod==1){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs  ORDER BY `id`");
    }
    elseif($fil_num==1 && $fil_ser==0 && $fil_emi==0 && $fil_ent==0 && $fil_val==0 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' ORDER BY `id`");
    }
    elseif($fil_num==0 && $fil_ser==1 && $fil_emi==0 && $fil_ent==0 && $fil_val==0 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `serie` = '$ser_nf'  ORDER BY `id`");
    }
    elseif($fil_num==0 && $fil_ser==0 && $fil_emi==1 && $fil_ent==0 && $fil_val==0 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `emissao` = '$emi_nf'  ORDER BY `id`");
    }
    elseif($fil_num==0 && $fil_ser==0 && $fil_emi==0 && $fil_ent==1 && $fil_val==0 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `entrada` = '$ent_nf'  ORDER BY `id`");
    }
    elseif($fil_num==0 && $fil_ser==0 && $fil_emi==0 && $fil_ent==0 && $fil_val==1 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `valor` = '$val_nf'  ORDER BY `id`");
    }
    elseif($fil_num==0 && $fil_ser==0 && $fil_emi==0 && $fil_ent==0 && $fil_val==0 && $fil_pes==1 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `peso` = '$pes_nf'  ORDER BY `id`");
    }
    elseif($fil_num==0 && $fil_ser==0 && $fil_emi==0 && $fil_ent==0 && $fil_val==0 && $fil_pes==0 && $fil_cli==1){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_cliente` = '$cod_cli'  ORDER BY `id`");
    }
    elseif($fil_num==1 && $fil_ser==1 && $fil_emi==0 && $fil_ent==0 && $fil_val==0 && $fil_pes==0 && $fil_cli==0){
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$num_nf' and `serie` = '$ser_nf'  ORDER BY `id`");
    }
    else{
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '0' ORDER BY `id`");
    }

    $n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql); ?>                        
                                <tr>
                                    <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cod_cliente'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }
?>
            </table>
        </urn>	
	</body>
</html>