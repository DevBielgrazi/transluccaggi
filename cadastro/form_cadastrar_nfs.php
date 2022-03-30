<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet"/>
		<title>Matriz Principal</title>
	</head> 
	<body>
		<menu>
			<a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
			<h1>MATRIZ PRINCIPAL</h1><p>
				<table class="tableb">
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
		<pag>
			<h1>CADASTRAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="cadastrar_nfs.php">
							<table>
								<tr>
									<td><h4>NÚMERO:</h4></td>
									<td><input name="num_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>SÉRIE:</h4></td>
									<td><input name="ser_nf" type=int size=16 maxlength=8 required></td>
								</tr>
								<tr>
									<td><h4>EMISSÃO:</h4></td>
									<td><input name="emi_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>ENTRADA:</h4></td>
									<td><input name="ent_nf" type=date required></td>
								</tr>
								<tr>
									<td><h4>VOLUMES:</h4></td>
									<td><input name="vol_nf" type=int size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>VALOR:</h4></td>
									<td><input name="val_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>PESO:</h4></td>
									<td><input name="pes_nf" type=float size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO CLIENTE:</h4></td>
									<td><input name="cod_cli" type=int size=16 maxlength=16 required></td>
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
                <h3>NOTAS CADASTRADAS</h3>
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
                <?php   require('..\connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs ORDER BY `id` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql);	?>                        
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
                    }   ?>
            </table>
        </urn>	
	</body>
</html>