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
			<h2>CADASTRAR NOTAS FISCAIS</h2><p>
			<table border=2>
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
									<td><input name="ser_nf" type=int size=8 maxlength=8 required></td>
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
								<tr>
									<td><input class="inputb" type=submit value=CADASTRAR></td>
								</tr>
							</table>
						</form>
					</td>	
				</tr>
			</table>
		</pag>
        <urn>
            <table border=2>
                <h3>NOTAS CADASTRADAS</h3>
                <tr>
					<td><h3>NÚMERO</h3></td>
					<td><h3>SÉRIE</h3></td>
                    <td><h3>EMISSÃO</h3></td>
                    <td><h3>ENTRADA</h3></td>
                    <td><h3>VALOR</h3></td>
                    <td><h3>PESO</h3></td>
                    <td><h3>COD_CLIENTE</h3></td>
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
                                    <td><h4><?php echo $vn['numero'];   ?></h4></td>
                                    <td><h4><?php echo $vn['serie'];    ?></h4></td>
                                    <td><h4><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></h4></td>
                                    <td><h4><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></h4></td>
                                    <td><h4><?php echo $vn['valor'];    ?></h4></td>
                                    <td><h4><?php echo $vn['peso'];    ?></h4></td>
                                    <td><h4><?php echo $vn['cod_cliente'];    ?></h4></td>
                                    <td><h4><?php echo $vn['status'];    ?></h4></td>					
                                </tr>                                            
                        <?php   $i = $i + 1;
                    }   ?>
            </table>
        </urn>	
	</body>
</html>