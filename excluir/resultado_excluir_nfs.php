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
	
	$sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `id` = '$id'");
	
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>EXCLUIR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="excluir_nfs.php">
							<table border=1>
                                <tr>
                                <td><h3>NÚMERO</h3></td>
                                <td><h3>SÉRIE</h3></td>
                                <td><h3>EMISSÃO</h3></td>
                                <td><h3>ENTRADA</h3></td>
                                <td><h3>VALOR</h3></td>
                                <td><h3>PESO</h3></td>
                                <td><h3>ROTA</h3></td>
                                <td><h3>CIDADE</h3></td>
                                <td><h3>NOME_<br>CLIENTE</h3></td>
                                <td><h3>COD_<br>DISTRIBUIDORA</h3></td>
                                <td><h3>MOTORISTA</h3></td>
                                <td><h3>STATUS</h3></td>						
                                </tr>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
								<h6>DESEJA MESMO EXCLUIR ESSA NOTA?</h6>
                                    <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['rota'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cidade_cliente'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['cod_distribuidora'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['motorista'];    ?></nobr></h4></td>
                                    <td><h4><nobr><?php echo $vn['status'];    ?></nobr></h4></td>																	 
							</table>                            
                            <tr>
                                <td><input class="inputc" type=submit value=SIM>
						</form>
                        <form method="post" action="..\pesquisa\form_pesquisar_nfs.html">
                                <input class="inputb" type=submit value=NÃO></td>
                            </tr>
                        </form>
					</td>	
				</tr>
			</table>
		</pag>
    </body>
</html>