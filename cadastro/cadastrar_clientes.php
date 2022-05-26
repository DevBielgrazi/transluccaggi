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
			<table class="tableb">
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
                <tr><td><a href="..\financeiro/form_relatorio_diario.php"><button>RELATÓRIO DIÁRIO</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_relatorio_mensal.php"><button>RELATÓRIO MENSAL</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_relatorio_anual.php"><button>RELATÓRIO ANUAL</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
			</table>
		</menu>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cod_cli = trim($_POST['cod_cli']);
    $nom_cli = trim($_POST['nom_cli']);
    $cad_cli = trim($_POST['cad_cli']);
    $rot_cli = trim($_POST['rot_cli']);
    $cid_cli = trim($_POST['cid_cli']);
    $bai_cli = trim($_POST['bai_cli']);
	$end_cli = trim($_POST['end_cli']);
    $cod_dis = trim($_POST['cod_dis']);
#VERIFICANDO INPUT
	if(!isset($_POST['age'])){
        $age = "NAO";
    }else{
        $age = $_POST['age'];
    }
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn, "SELECT * FROM $tab_cli WHERE `codigo` = '$cod_cli'");
#TRANSFORMANDO RESULTADO
	$n = mysqli_num_rows($sql);
#VERIFICANDO CADASTROS DA TABELA
	if($n!=0){
?>
			<pag>
				<h1>CADASTRAR CLIENTES</h1><p>
				<table>
					<tr>
						<td><h5>CLIENTE JÁ CADASTRADO</h5></td>
					</tr>
					<tr>
						<td><a href="form_cadastrar_clientes.php"><button class="buttonc">VOLTAR</button></a></td>
                    </tr>
				</table>
			</pag>
		<?php
	}
	else
	{
		$sql2 = mysqli_query($conn, "SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
		$n2 = mysqli_num_rows($sql2);
		if($n2 != 0){
#INSERINDO DADOS NA TABELA
			$sql = mysqli_query($conn,"INSERT INTO $tab_cli(`codigo`, `nome`, `agendar`, `cadastro`, `rota`, `cidade`, `bairro`, `endereco`, `cod_distribuidora`) VALUES ('$cod_cli', '$nom_cli', '$age', '$cad_cli', '$rot_cli', '$cid_cli', '$bai_cli', '$end_cli', '$cod_dis')");
			?>
				<pag>
					<h1>CADASTRAR CLIENTES</h1><p>
					<table>
						<tr>
							<td><h7>CLIENTE CADASTRADO</h7></td>
						</tr>
						<tr>
                            <td><a href="form_cadastrar_clientes.php"><button class="buttonc">PRÓXIMO</button></a></td>
                    	</tr>
					</table>
				</pag>
			<?php
		}
		else
		{
			?>
				<pag>
					<h1>CADASTRAR CLIENTES</h1><p>
					<table>
						<tr>
							<td><h6>DISTRIBUIDORA NÃO CADASTRADA</h6></td>
						</tr>
						<tr>
                            <td><a href="form_cadastrar_distribuidoras.php"><button class="buttonc">CADASTRAR</button></a></td>
                    	</tr>
					</table>
				</pag>
			<?php
		}
	}
?>
		<urc>
            <table border=1>
                <h3>CLIENTES CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>AGENDAR</h3></td>
                    <td><h3>CADASTRO</h3></td>
                    <td><h3>ROTA</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>BAIRRO</h3></td>
                    <td><h3>ENDEREÇO</h3></td>
                    <td><h3>COD_<br>DISTRIBUIDORA</h3></td>
				</tr>
<?php
				$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
				$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
                $i=0;
#APRESENTANDO DADOS DA TABELA
				while($i<$n){
#CADASTROS POR COLUNA
					$vn = mysqli_fetch_array($sql);
?>
							<tr>
								<td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['agendar'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['bairro'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['endereco'];    ?></nobr></h4></td>
								<td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
							</tr>
					<?php   $i = $i + 1;
				}   ?>
            </table>
        </urc>
	</body>
</html>
<?php
    }
}
?>