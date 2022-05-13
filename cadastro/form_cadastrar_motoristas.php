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
		<pag>
			<h1>CADASTRAR MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_motoristas.php">
							<table>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input name="cad_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input name="nom_mot" type=text size=16 maxlength=32 required></td>
								</tr>
                                <tr>
									<td><h4>VEÍCULO:</h4></td>
									<td><input name="vei_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PLACA:</h4></td>
									<td><input name="pla_mot" type=text size=16 maxlength=8 required></td>
								</tr>
                                <tr>
									<td><h4>TELEFONE:</h4></td>
									<td><input name="tel_mot" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input name="end_mot" type=text size=16 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CPF:</h4></td>
									<td><input name="cpf_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>RG:</h4></td>
									<td><input name="rg_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NASCIMENTO:</h4></td>
									<td><input name="nas_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>NATURALIDADE:</h4></td>
									<td><input name="nat_mot" type=text size=16 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>CNH:</h4></td>
									<td><input name="cnh_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALIDADE(CNH):</h4></td>
									<td><input name="val_mot" type=date required></td>
								</tr>
								<tr>
									<td><h4>CATEGORIA(CNH):</h4></td>
									<td><input name="cat_mot" type=text size=16 maxlength=4 required></td>
								</tr>
								<tr>
									<td><h4>CEP:</h4></td>
									<td><input name="cep_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>BANCO:</h4></td>
									<td><input name="ban_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO BANCO:</h4></td>
									<td><input name="cod_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>AGÊNCIA BANCO:</h4></td>
									<td><input name="age_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CONTA BANCO:</h4></td>
									<td><input name="con_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ANO VEÍCULO:</h4></td>
									<td><input name="ano_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>COR VEÍCULO:</h4></td>
									<td><input name="cor_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>RENAVAM:</h4></td>
									<td><input name="ren_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NÚMERO CHASSI:</h4></td>
									<td><input name="num_mot" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>ANTT:</h4></td>
									<td><input name="ant_mot" type=text size=16 maxlength=16></td>
								</tr>
								<tr>
									<td><h4>CATEGORIA ANTT:</h4></td>
									<td><input name="caa_mot" type=text size=16 maxlength=16></td>
								</tr>
								<tr>
									<td><h4>VALIDADE ANTT:</h4></td>
									<td><input name="vaa_mot" type=date></td>
								</tr>
							</table>
							<tr>
								<td><input class="inputb" type=submit value=CADASTRAR></td>
							</tr>
						</form>
					</td>	
				</tr>																				 
			</table>
		</pag>
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
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#ADQUIRINDO CADASTROS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO A EXISTÊNCIA DE REGISTROS
	if($n!=0){
		$sql = mysqli_query($conn,"SELECT * FROM $tab_mot ORDER BY `id` DESC LIMIT 5");
		$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
		$i=0;
#APRESENTANDO DADOS DA TABELA
		while($i<$n){
#CADASTRADOS POR COLUNA
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