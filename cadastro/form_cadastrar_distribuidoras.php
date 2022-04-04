<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="../estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head> 
	<body>
		<menu>
			<a href="http://localhost/transluccaggi/menu.html"><img src="..\imagem/logo.png" width=20%></a>
			<h1>MATRIZ PRINCIPAL</h1><p>
				<table class="tableb">
					<tr><td><a href="../saida/form_saida_motorista.html"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
					<tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
					<tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
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
		<pag>
			<h1>CADASTRAR DISTRIBUIDORAS</h1><p>
			<table>
					<tr>
						<td>
							<form method="post" action="cadastrar_distribuidoras.php">
								<table>
									<tr>
										<td><h4>NOME:</h4></td>
										<td><input name="nom_dis" type=text size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>PORCENTAGEM:</h4></td>
										<td><input name="por_dis" type=float size=32 maxlength=64 required></td>
									</tr>
									<tr>
										<td><h4>CADASTRO:</h4></td>
										<td><input name="cad_dis" type=date required></td>
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
		<urd>
			<table border=1>
				<h3>DISTRIBUIDORAS CADASTRADAS</h3>
				<tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>						
					<td><h3>CADASTRO</h3></td>						
				</tr>		
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#ADQUIRINDO CADASTROS DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis");
#TRANSFORMANDO O RESULTADO EM NÚMEROS
	$n = mysqli_num_rows($sql);
#VERIFICANDO A EXISTÊNCIA DE REGISTROS
	if($n!=0){
		$sql = mysqli_query($conn,"SELECT * FROM $tab_dis ORDER BY `codigo` DESC LIMIT 5");
		$n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
		$i=0;
#APRESENTANDO DADOS DA TABELA
		while($i!=$n){
#CADASTROS POR COLUNA
			$vn = mysqli_fetch_array($sql);	?>                        
				<tr>
					<td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
					<td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
					<td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>					
				</tr>                                            
<?php
#SOMANDO AO CONTADOR
			$i = $i + 1;
		}
	}
?>
			</table>
		</urd>	
	</body>
</html>