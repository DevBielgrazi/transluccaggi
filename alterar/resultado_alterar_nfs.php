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
						<form method="post" action="alterar_nfs.php">
							<table>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
								<tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="num">NÚMERO:<?php echo $vn['numero'];   ?></nobr></h2></td>
                                    <td><input name="num_nf" type=int size=16 maxlength=16 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ser">SÉRIE:<?php echo $vn['serie'];   ?></nobr></h2></td>
                                    <td><input name="ser_nf" type=int size=16 maxlength=8 ></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="emi">EMISSÃO:<?php echo $vn['emissao'];   ?></nobr></h2></td>
                                    <td><input name="emi_nf" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ent">ENTRADA:<?php echo $vn['entrada'];   ?></nobr></h2></td>
                                    <td><input name="ent_nf" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="sai">SAÍDA:<?php echo $vn['saida'];   ?></nobr></h2></td>
                                    <td><input name="sai_nf" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="val">VALOR:<?php echo $vn['valor'];   ?></nobr></h2></td>
                                    <td><input name="val_nf" type=float size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="pes">PESO:<?php echo $vn['peso'];   ?></nobr></h2></td>
                                    <td><input name="pes_nf" type=float size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cli">COD_CLIENTE:<?php echo $vn['cod_cliente'];   ?></nobr></h2></td>
                                    <td><input name="cod_cli" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="mot">MOTORISTA:<?php echo $vn['motorista'];   ?></nobr></h2></td>
                                    <td><input name="sai_nf" type=text size=16 maxlength=16></td>
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