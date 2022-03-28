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
	require('..\connect.php');

	$id = $_POST['id'];	
	
	$sql = mysqli_query($conn,"SELECT * FROM $tab_cli WHERE `id` = '$id'");
	
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>EXCLUIR CLIENTES</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="excluir_clientes.php">
							<table border=1>
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
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
								<h6>DESEJA MESMO EXCLUIR ESSE CLIENTE?</h6>
                                <td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['agendar'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cidade'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['bairro'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['endereco'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>																	 
							</table>                            
                            <tr>
                                <td><input class="inputc" type=submit value=SIM>
						</form>
                        <form method="post" action="..\pesquisa\form_pesquisar_clientes.html">
                                <input class="inputb" type=submit value=NÃO></td>
                            </tr>
                        </form>
					</td>	
				</tr>
			</table>
		</pag>
    </body>
</html>