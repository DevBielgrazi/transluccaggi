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
                <tr><td><h1>CADASTROS</h1></td></tr>
                <tr><td><a href="../cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="../cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="../cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h1>PESQUISAS</h1></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_nfs.html"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_clientes.html"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="../pesquisa/form_pesquisar_distribuidoras.html"><button>DISTRIBUIDORAS</button></a></td></tr>
            </table>
        </menu>
<?php
	require('..\connect.php');

	$cod_dis = $_POST['cod_dis'];	
	
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
	
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>EXCLUIR DISTRIBUIDORAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="excluir_distribuidoras.php">
							<table border=1>
                                <tr>
                                    <td><h3>CÓDIGO</h3></td>
                                    <td><h3>NOME</h3></td>
                                    <td><h3>CADASTRO</h3></td>						
                                </tr>
                                <input type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
								<h6>DESEJA MESMO EXCLUIR ESSA DISTRIBUIDORA?</h6>
                                <td><h4><nobr><?php echo $vn['codigo'];   ?></nobr></h4></td>
                                <td><h4><nobr><?php echo $vn['nome'];    ?></nobr></h4></td>
                                <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));    ?></nobr></h4></td>																	 
							</table>                            
                            <tr>
                                <td><input class="inputc" type=submit value=SIM>
						</form>
                        <form method="post" action="..\pesquisa\form_pesquisar_distribuidoras.html">
                                <input class="inputb" type=submit value=NÃO></td>
                            </tr>
                        </form>
					</td>	
				</tr>
			</table>
		</pag>
    </body>
</html>