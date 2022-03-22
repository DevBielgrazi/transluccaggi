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
				<table class="tableb" border=1>
						<tr><td><h2>CADASTROS</h2></td></tr>
						<tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
						<tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
						<tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
				</table>
		</menu>
		<pag>
			<h2>CADASTRAR CLIENTES</h2><p>
			<table border=1>
				<tr>
					<td>
						<form method="post" action="cadastrar_clientes.php">
							<table>
								<tr>
									<td><h4>CÓDIGO:</h4></td>
									<td><input name="cod_cli" type=text size=16 maxlength=16 required></td>
								</tr>
								<tr>
									<td><h4>NOME:</h4></td>
									<td><input name="nom_cli" type=int size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:</h4></td>
									<td><input name="cad_cli" type=date required></td>
								</tr>
								<tr>
									<td><h4>ROTA:</h4></td>
									<td><select name="rot_cli">
										<option value="VP0" selected>VP0</option>
										<option value="VP1">VP1</option>
										<option value="VP2">VP2</option>
										<option value="VP3">VP3</option>
										<option value="VP4">VP4</option>
										<option value="VP5">VP5</option>
										<option value="VP6">VP6</option>
										<option value="VP7">VP7</option>
										<option value="VP8">VP8</option>
										<option value="VP9">VP9</option>
										<option value="VP10">VP10</option>
										<option value="VP11">VP11</option>
										<option value="VP12">VP12</option>
									</select></td>
								</tr>
								<tr>
									<td><h4>CIDADE:</h4></td>
									<td><input name="cid_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>BAIRRO:</h4></td>
									<td><input name="bai_cli" type=text size=32 maxlength=32 required></td>
								</tr>
								<tr>
									<td><h4>ENDEREÇO:</h4></td>
									<td><input name="end_cli" type=text size=32 maxlength=64 required></td>
								</tr>
								<tr>
									<td><h4>CÓDIGO DISTRIBUIDORA:</h4></td>
									<td><input name="cod_dis" type=int size=16 maxlength=16 required></td>
								</tr>																 
								<tr>
									<td><input class="inputb" type=submit value=CADASTRAR></td>
								</tr>
							</table>
						</form>						
					</td>	
				</tr>
			</table>
		</pag>
		<urc>
            <table border=2>
                <h3>CLIENTES CADASTRADOS</h3>
                <tr>
					<td><h3>CÓDIGO</h3></td>
					<td><h3>NOME</h3></td>
                    <td><h3>CADASTRO</h3></td>
                    <td><h3>ROTA</h3></td>
                    <td><h3>CIDADE</h3></td>
                    <td><h3>BAIRRO</h3></td>
                    <td><h3>ENDEREÇO</h3></td>
                    <td><h3>COD_DISTRIBUIDORA</h3></td>						
				</tr>		
                <?php   require('..\connect.php');
				$sql = mysqli_query($conn,"SELECT * FROM $tab_cli ORDER BY `id` DESC LIMIT 5");
				$n = mysqli_num_rows($sql);
                $i=0;
                    while($i!=$n)
                    {
                        $vn = mysqli_fetch_array($sql);	?>                        
                                <tr>
                                    <td><h4><?php echo $vn['codigo'];   ?></h4></td>
                                    <td><h4><?php echo $vn['nome'];    ?></h4></td>
                                    <td><h4><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></h4></td>
                                    <td><h4><?php echo $vn['rota'];    ?></h4></td>
                                    <td><h4><?php echo $vn['cidade'];    ?></h4></td>
                                    <td><h4><?php echo $vn['bairro'];    ?></h4></td>
                                    <td><h4><?php echo $vn['endereco'];    ?></h4></td>
                                    <td><h4><?php echo $vn['cod_distribuidora'];    ?></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urc>
	</body>
</html>