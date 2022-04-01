<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="icon" href="..\imagem/favicone.png"/>
        <link href="..\estilo.css" rel="stylesheet"/>
        <title>Matriz Principal</title>
    </head>
    <body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.html"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
                <table class="tableb">
                    <tr><td><a href="../saida/form_saida_motorista.html"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_baixa_canhotos.html"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                    <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                    <tr><td><a href="../saida/form_relatorio_devolucao.php"><button class="buttonb">RELATÓRIO DE DEVOLUÇÕES</button></a></td></tr>
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
#IMPORTANDO CONEXÃO COM O BANCO
	require('..\connect.php');
#VARIÁVEL HIDDEN DO FORMULÁRIO
	$id = $_POST['id'];
#ADQUIRINDO INFORMAÇÕES DO BANCO
	$sql = mysqli_query($conn,"SELECT * FROM $tab_mot WHERE `id` = '$id'");
#CADASTROS POR COLUNA
	$vn = mysqli_fetch_array($sql);
?>
            <pag>
			<h1>ALTERAR MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="alterar_motoristas.php">
							<table>
                                <input type="hidden" name="id" value="<?php echo $vn['id'];?>">
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cad">CADASTRO:<?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));;   ?></nobr></h2></td>
                                    <td><input name="cad_mot" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nom">NOME:<?php echo $vn['nome'];   ?></nobr></h2></td>
                                    <td><input name="nom_mot" type=tex size=16 maxlength=32></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="vei">VEÍCULO:<?php echo $vn['veiculo'];   ?></nobr></h2></td>
                                    <td><input name="vei_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="pla">PLACA:<?php echo $vn['placa'];   ?></nobr></h2></td>
                                    <td><input name="pla_mot" type=text size=16 maxlength=8></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="tel">TELEFONE:<?php echo $vn['telefone'];   ?></nobr></h2></td>
                                    <td><input name="tel_mot" type=int size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="end">ENDEREÇO:<?php echo $vn['endereco'];   ?></nobr></h2></td>
                                    <td><input name="end_mot" type=text size=16 maxlength=64></td>
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