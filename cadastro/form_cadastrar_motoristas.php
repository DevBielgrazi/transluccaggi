<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<link href="..\estilo.css" rel="stylesheet">
		<title>Matriz Principal</title>
	</head> 
	<body>
        <menu>
        <a href="http://localhost/transluccaggi"><img src="..\imagem/logo.png" width=20%></a>
        <h1>MATRIZ PRINCIPAL</h1><p>
            <table class="tableb">
					<tr><td><a href="../saida/form_saida_motorista.html"><button>SAÍDA DE MOTORISTAS</button></a></td></tr>
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
                <?php   require('..\connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_mot ORDER BY `id` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql);	?>                        
                                <tr>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['nome'];   ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo $vn['veiculo'];   ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo $vn['placa'];   ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo $vn['telefone'];   ?></nobr></h4></td>					
                                    <td><h4><nobr><?php echo $vn['endereco'];   ?></nobr></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urn>	
	</body>
</html>