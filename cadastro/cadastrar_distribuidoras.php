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
				<tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
			</table>
        </menu>
<?php
#IMPORTANDO CONEXÃO DO BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $nom_dis = trim($_POST['nom_dis']);
    $por_dis = trim($_POST['por_dis']);
    $cad_dis = trim($_POST['cad_dis']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `nome` = '$nom_dis'");
#TRANSFORMANDO RESULTADO EM NUMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<pag>
				<h1>CADASTRAR DISTRIBUIDORA</h1><p>
				<table>
					<tr>
						<td><h5>DISTRIBUIDORA JÁ CADASTARDA</h5></td>
					</tr>
					<tr>
						<td><a href="form_cadastrar_distribuidoras.php"><button class="buttonc">VOLTAR</button></a></td>
                    </tr>
				</table>
			</pag>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
		$sql = mysqli_query($conn,"INSERT INTO $tab_dis(`nome`, `porcentagem`, `cadastro`) VALUES ('$nom_dis', '$por_dis', '$cad_dis')");
?>
			<pag>
				<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
				<table>
					<tr>
						<td><h7>DISTRIBUIDORA CADASTRADA</h7></td>
					</tr>
					<tr>
						<td><a href="form_cadastrar_distribuidoras.php"><button class="buttonc">PRÓXIMA</button></a></td>
                    </tr>
				</table>
			</pag>
<?php
	}
?>
		<urd>
			<table border=1>
				<h3>DISTRIBUIDORAS CADASTRADAS</h3>
				<tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>CADASTRO</h3></td>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis ORDER BY `codigo` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i<$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<td><h4><nobr><?php echo $vn['codigo'];   ?><nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];    ?><nobr></h4></td>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?><nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
			</table>
		</urd>
	</body>
</html>
<?php
    }
}
?>