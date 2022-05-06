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
        	<a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
        	<h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table id="00001" class="tableb">
				<tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
				<tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button></a></td></tr>
				<tr><td><h2>CADASTROS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>PESQUISAS</h2></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><h2>MOTORISTAS</h2></td></tr>
				<tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
				<tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
				<tr><td><h2>FINANCEIRO</h2></td></tr>
				<tr><td><a href="..\financeiro/form_financeiro_fretes.php"><button>FRETE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_frete_distribuidoras.php"><button>FRETE DISTRIBUIDORAS</button></a></td></tr>
			</table>
        </menu>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$not_dev = trim($_POST['not_dev']);
	$ser_dev = trim($_POST['ser_dev']);
	if(!isset($_POST['dis_dev'])){
		$dis_dev = null;
	}else{
		$dis_dev = $_POST['dis_dev'];
	}
    $dev = $_POST['opc'];
?>
	<rn>
		<table border=1>
			<tr><h3>REGISTRO DE DEVOLUÇÕES</h3></tr>
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
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `numero` = '$not_dev' ORDER BY `id` DESC LIMIT 1");
#CADASTROS POR COLUNA
	$x = mysqli_fetch_array($sql);
	if(!isset($x['id'])){
		$id = null;
	}else{
		$id = $x['id'];
	}
#TRANSFORMANDO RESULTADO EM NÚMEROS
    $n = mysqli_num_rows($sql);
#VERIFICANDO NÚMEROS DE REGISTROS
    if($n!=0){
#VERIFICANDO INPUT SELECIONADO
        switch($dev){
            case "int":
#ALTERANDO REGISTROS NO BANCO
                $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'DEVOLUÇÃO INTEGRAL' WHERE `id` = '$id'");
                break;
            case "par":
                $sql = mysqli_query($conn,"UPDATE $tab_nfs SET `status` = 'DEVOLUÇÃO PARCIAL' WHERE `id` = '$id'");
                break;
        }
        $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `status` LIKE  'DEVOLUÇÃO%' and `cod_distribuidora` = '$dis_dev' ORDER BY `id` DESC");
        $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
        $i=0;
#APRESENTANDO CADASTROS DO BANCO
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
#SOMANDO AO CONTADOR
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
						<form method="post" action="registro_devolucao.php">
							<table>
                                <tr>
                                    <td><h4>INTEGRAL<input type="radio" name="opc" value="int" checked></h4></td>
                                    <td><h4>PARCIAL<input type="radio" name="opc" value="par"></h4></td>
                                </tr>
								<tr>
									<td><h4>NOTA:</h4></td>
									<td><input name="not_dev" type=text size=16 maxlength=32 required></td>
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
<?php
    }
}
?>