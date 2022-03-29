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
<?php
	require('..\connect.php');

	$cod_dis = $_POST['cod_dis'];	
	
	$sql = mysqli_query($conn,"SELECT * FROM $tab_dis WHERE `codigo` = '$cod_dis'");
	
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>ALTERAR DISTRIBUIDORA</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="alterar_distribuidoras.php">
							<table>
                                <input type="hidden" name="cod_dis" value="<?php echo $vn['codigo'];?>">
                                <tr>
                                    <td><h2><nobr>NOME:<?php echo $vn['nome'];   ?></nobr></h2></td>
                                    <td><input name="nom_dis" type=int size=16 maxlength=64 ></td>
								</tr>																	 
							</table>                            
                            <tr>
                                <td><input class="inputb" type=submit value=ALTERAR></td>
                            </tr>
						</form>
					</td>	
				</tr>
			</table>
		</pag>
    </body>
</html>