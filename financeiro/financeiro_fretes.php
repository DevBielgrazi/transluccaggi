<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 2){
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
				<tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
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
            </table>
        </menu>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$dat_fre = trim($_POST['dat_fre']);
    $mot_fre = trim($_POST['mot_fre']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `motorista` = '$mot_fre' and `saida` = '$dat_fre'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO NÚMERO DE REGISTROS
	if($n!=0){
        $sql2 = mysqli_query($conn,"SELECT SUM(`valor`) as 'val' FROM $tab_nfs WHERE `motorista` = '$mot_fre' and `saida` = '$dat_fre'");
	    $sql2 = mysqli_fetch_array($sql2);
#VARIÁVEL DO BANCO
	    $val_tot = number_format(($sql2['val']), 2, '.', '');
?>
	<rn>
		<table border=1>
			<tr><h3>FRETE MOTORISTA</h3></tr>
			<tr>
				<td><h3>DATA:</h3><h4><?php  echo date( 'd/m/Y' , strtotime($dat_fre)); ?></h4></td>
			</tr>
            <tr>
                <td><h3>MOTORISTA:</h3><h4><?php  echo $mot_fre; ?></h4></td>
            </tr>
            <tr>
                <td><h3>VALOR NOTAS:</h3><h4><?php  echo $val_tot; ?></h4></td>
            </tr>
            <tr>
				<td><h3>CIDADES</h3></td>
		</tr>
<?php
#INICIANDO CONTADOR
    $i=0;
#VERIFICANDO EXISTÊNCIA NO FORMULÁRIO
	$sql = mysqli_query($conn,"SELECT DISTINCT `cidade_cliente` FROM $tab_nfs WHERE `motorista` = '$mot_fre' AND `saida` = '$dat_fre'");
	$n = mysqli_num_rows($sql);
#APRESENTANDO REGISTROS NO BANCO
    while($i!=$n){
        $vn = mysqli_fetch_array($sql);
?>
            <tr>
                <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
<?php
#SOMANDO AO CONTADOR
    $i = $i + 1;
    }
?>
		<pag>
			<table>
				<tr>
					<td>
						<form method="post" action="frete_motoristas.php">
							<table>
								<input type="hidden" name="mot_fre" value="<?php echo $mot_fre;  ?>">
								<input type="hidden" name="dat_fre" value="<?php echo $dat_fre;  ?>">
								<tr>
									<td><h4>VALOR FRETE:</h4></td>
									<td><input name="val_fre" type=float size=16 maxlength=16 required></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=REGISTRAR></td>
							</tr>
						</form>
					</td>
				</tr>
			</table>
		</pag>
<?php
	}else{
		?>
			<rn>
				<h1>FRETE MOTORISTA</h1><p>
				<table>
					<tr>
						<td><h5>MOTORISTA SEM ENTREGA NESTA DATA</h5></td>
					</tr>
				</table>
            </rn>
		<?php
	}
?>
	</body>
</html>
<?php
    }
    else{
?>
        <script>
            document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
        </script>
<?php
    }
}
?>