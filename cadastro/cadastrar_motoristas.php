<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head>
	<body>
		<menu>
        	<a href="http://localhost/transluccaggi/menu.html"><img src="..\imagem/logo.png" width=20%></a>
        	<h1>MATRIZ PRINCIPAL</h1><p>
            <table class="tableb">
				<tr><td><a href="../saida/form_saida_motorista.html"><button>SAÍDA DE MOTORISTAS</button class="buttonb"></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.php"><button>BAIXA DE CANHOTOS</button class="buttonb"></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button>ROMANEIO DE CARGAS</button class="buttonb"></a></td></tr>
				<tr><td><a href="../saida/form_relatorio_devolucao.php"><button>RELATÓRIO DE DEVOLUÇÕES</button class="buttonb"></a></td></tr>
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
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
	$cad_mot = trim($_POST['cad_mot']);
	$nom_mot = trim($_POST['nom_mot']);
	$vei_mot = trim($_POST['vei_mot']);
	$pla_mot = trim($_POST['pla_mot']);
	$tel_mot = trim($_POST['tel_mot']);
	$end_mot = trim($_POST['end_mot']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `nome` = '$nom_mot' and `placa` = '$pla_mot'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO O NÚMERO DE CADASTROS
	if($n != 0){
?>
			<pag>
				<h1>CADASTRAR MOTORISTAS</h1><p>
				<table>
					<tr>
						<td><h5>MOTORISTA JÁ CADASTRADO</h5></td>
					</tr>
				</table>
			</pag>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
        $sql = mysqli_query($conn,"INSERT INTO $tab_mot (`cadastro`, `nome`, `veiculo`, `placa`, `telefone`, `endereco`)  VALUES ('$cad_mot', '$nom_mot', '$vei_mot', '$pla_mot', '$tel_mot', '$end_mot')");
?>
            <pag>
                <h1>CADASTRAR MOTORISTAS</h1><p>
                <table>
                    <tr>
                        <td><h7>MOTORISTA CADASTRADO</h7></td>
                    </tr>
                </table>
            </pag>
<?php
    }
?>
        <urn>
            <table border=1>
                <h3>MOTORISTAS CADASTRADOS</h3>
                <tr>
					<td><h3>CADASTRO</h3></td>
					<td><h3>NOME</h3></td>
					<td><h3>VEÍCULO</h3></td>
					<td><h3>PLACA</h3></td>
					<td><h3>TELEFONE</h3></td>
					<td><h3>ENDERECO</h3></td>
				</tr>
<?php
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot ORDER BY `id` DESC LIMIT 5");
#TRANSFORMANDO RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
	$i=0;
#APRESENTANDO DADOS DA TABELA
	while($i!=$n){
#CADASTROS POR COLUNA
		$vn = mysqli_fetch_array($sql);	?>
				<tr>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['veiculo'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['placa'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['telefone'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['endereco'];   ?></nobr></h4></td>
				</tr>
<?php
#SOMANDO AO CONTADOR
		$i = $i + 1;
	}
?>
            </table>
        </urn>
	</body>
</html>