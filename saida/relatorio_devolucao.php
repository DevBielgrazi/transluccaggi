<html>
	<head>
		<link rel="stylesheet" href="print.css" media="print"/>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head> 
	<body>	
		<menu>
        	<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
        	<h1>MATRIZ PRINCIPAL</h1><p>
            <table id="00001" class="tableb">
				<tr><td><a href="../saida/form_saida_motorista.html"><button>SAÍDA DE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.html"><button>BAIXA DE CANHOTOS</button></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button>ROMANEIO DE CARGAS</button></a></td></tr>
				<tr><td><a href="../saida/form_relatorio_devolucao.php"><button>RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
				<tr><td><h2>CADASTROS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>PESQUISAS</h2></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>MOTORISTAS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_motoristas.html"><button>PESQUISAR</button></a></td></tr>
            </table>
        </menu>

<?php
	require('../connect.php');
	
	$not_dev = trim($_POST['not_dev']);
	$ser_dev = trim($_POST['ser_dev']);
	$dis_dev = trim($_POST['dis_dev']);
    $dev = $_POST['opc'];
		
?>
		<rn>
	<table border=1>
		<tr><h3>RELATÓRIO DE DEVOLUÇÕES</h3></tr>
        <tr>
			<td><h3>DISTRIBUIDORA:<?php echo $dis_dev  ?></h3></td>
		</tr>
		<tr>
			<td><h3>ENTRADA</h3></td>
			<td><h3>NF</h3></td>
			<td><h3>SÉRIE</h3></td>
			<td><h3>VOLUMES</h3></td>
			<td><h3>CLIENTE</h3></td>					
			<td><h3>DISTRIBUIDORA</h3></td>				
			<td><h3>DEVOLUÇÃO</h3></td>				
		</tr>
<?php

    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$not_dev' and `serie` = '$ser_dev' and `cod_distribuidora` = '$dis_dev'");
    $n = mysqli_num_rows($sql);
    if($n!=0){
        switch($dev){
            case "int":
                $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'DEVOLUÇÃO INTEGRAL' WHERE `numero` = '$not_dev' and `serie` = '$ser_dev' and `cod_distribuidora` = '$dis_dev'");
                break;
            case "par":
                $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'DEVOLUÇÃO PARCIAL' WHERE `numero` = '$not_dev' and `serie` = '$ser_dev' and `cod_distribuidora` = '$dis_dev'");
                break;
        }    
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `status` LIKE  'DEVOLUÇÃO%' and `cod_distribuidora` = '$dis_dev' ORDER BY `id` DESC");
        $n = mysqli_num_rows($sql);
        $i=0;
        while($i!=$n){
            $vn = mysqli_fetch_array($sql);
    ?>
                <tr>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime($vn['entrada']));   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>
    <?php
        $i = $i + 1;
        }
	}
	else
    {
?>
        <tr>
            <td><h4><nobr>NÃO CADASTRADA</nobr></h4></td>
            <td><h4><nobr></nobr></h4></td>
            <td><h4><nobr></nobr></h4></td>
            <td><h4><nobr></nobr></h4></td>
            <td><h4><nobr></nobr></h4></td>
            <td><h4><nobr></nobr></h4></td>
<?php
	}	        		
?>
		<pag>
			<table>
				<tr>
					<td>
						<form method="post" action="relatorio_devolucao.php">
							<table>
                                <tr>
                                    <td><h4>INTEGRAL<input type="radio" name="opc" value="int" checked></h4></td>
                                    <td><h4>PARCIAL<input type="radio" name="opc" value="par"></h4></td>
                                </tr>
								<tr>
									<td><h4>NOTA:</h4></td>
									<td><input name="not_dev" type=text size=16 maxlength=32 required></td>
								</tr>
                                <tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input name="ser_dev" type=text size=16 maxlength=32 required></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=PRÓXIMA></td>
							</tr>
						</form>
					</td>	
				</tr>																				 
			</table>
		</pag>	
	</body>
</html>