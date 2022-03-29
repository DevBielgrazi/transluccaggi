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
			<h1>ALTERAR NOTAS FISCAIS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="alterar_clientes.php">
							<table>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
								<tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cod">CÓDIGO:<?php echo $vn['codigo'];   ?></nobr></h2></td>
                                    <td><input name="cod_cli" type=int size=16 maxlength=16 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nom">NOME:<?php echo $vn['nome'];   ?></nobr></h2></td>
                                    <td><input name="nom_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="age">AGENDAR:<?php echo $vn['agendar'];   ?></nobr></h2></td>
                                    <td><select name="age_cli">
										<option value="SIM" selected>SIM</option>
										<option value="NÃO">NÃO</option>
									</select></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cad">CADASTRO:<?php echo $vn['cadastro'];   ?></nobr></h2></td>
                                    <td><input name="cad_cli" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="rot">ROTA:<?php echo $vn['rota'];   ?></nobr></h2></td>
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
                                    <td><h2><nobr><input type="radio" name="opc" value="cid">CIDADE:<?php echo $vn['cidade'];   ?></nobr></h2></td>
                                    <td><input name="cid_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="bai">BAIRRO:<?php echo $vn['bairro'];   ?></nobr></h2></td>
                                    <td><input name="bai_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="end">ENDEREÇO:<?php echo $vn['endereco'];   ?></nobr></h2></td>
                                    <td><input name="end_cli" type=int size=16 maxlength=64 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="dis">CÓDIGO DISTRIBUIDORA:<?php echo $vn['cod_distribuidora'];   ?></nobr></h2></td>
                                    <td><input name="cod_dis" type=int size=16 maxlength=16 ></td>
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