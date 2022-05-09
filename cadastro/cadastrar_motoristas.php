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
				<tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button class="buttonb"></a></td></tr>
				<tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button class="buttonb"></a></td></tr>
				<tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button class="buttonb"></a></td></tr>
				<tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button class="buttonb"></a></td></tr>
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
                <tr><td><a href="..\financeiro/form_relatorio_mensal.php"><button>RELATÓRIO MENSAL</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
				<tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
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
	$cpf_mot = trim($_POST['cpf_mot']);
	$rg_mot = trim($_POST['rg_mot']);
	$nas_mot = trim($_POST['nas_mot']);
	$nat_mot = trim($_POST['nat_mot']);
	$cnh_mot = trim($_POST['cnh_mot']);
	$val_mot = trim($_POST['val_mot']);
	$cat_mot = trim($_POST['cat_mot']);
	$cep_mot = trim($_POST['cep_mot']);
	$ban_mot = trim($_POST['ban_mot']);
	$cod_mot = trim($_POST['cod_mot']);
	$age_mot = trim($_POST['age_mot']);
	$con_mot = trim($_POST['con_mot']);
	$ano_mot = trim($_POST['ano_mot']);
	$cor_mot = trim($_POST['cor_mot']);
	$ren_mot = trim($_POST['ren_mot']);
	$num_mot = trim($_POST['num_mot']);
	$ant_mot = trim($_POST['ant_mot']);
	$caa_mot = trim($_POST['caa_mot']);
	$vaa_mot = trim($_POST['vaa_mot']);
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
					<tr>
                            <td><a href="form_cadastrar_motoristas.php"><button class="buttonc">VOLTAR</button></a></td>
                    </tr>
				</table>
			</pag>
<?php
	}
	else
	{
#INSERINDO DADOS NA TABELA
        $sql = mysqli_query($conn,"INSERT INTO $tab_mot (`cadastro`, `nome`, `veiculo`, `placa`, `telefone`, `endereco`, `cpf`, `rg`, `nascimento`, `naturalidade`, `cnh`, `validade_cnh`, `categoria_cnh`, `cep`, `banco`, `cod_banco`, `agencia_banco`, `conta_banco`, `ano_veiculo`, `cor_veiculo`, `renavam`, `num_chassi`, `antt`, `categoria_antt`, `validade_antt`)  VALUES ('$cad_mot', '$nom_mot', '$vei_mot', '$pla_mot', '$tel_mot', '$end_mot', '$cpf_mot', '$rg_mot', '$nas_mot', '$nat_mot', '$cnh_mot', '$val_mot', '$cat_mot', '$cep_mot', '$ban_mot', '$cod_mot', '$age_mot', '$con_mot', '$ano_mot', '$cor_mot', '$ren_mot', '$num_mot', '$ant_mot', '$caa_mot', '$vaa_mot')");
?>
            <pag>
                <h1>CADASTRAR MOTORISTAS</h1><p>
                <table>
                    <tr>
                        <td><h7>MOTORISTA CADASTRADO</h7></td>
                    </tr>
					<tr>
						<td><a href="form_cadastrar_motoristas.php"><button class="buttonc">PRÓXIMO</button></a></td>
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
<?php
    }
}
?>