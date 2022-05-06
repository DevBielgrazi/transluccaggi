<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 1 || $system_control == 2){
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="icon" href="..\imagem/favicone.png"/>
        <link href="..\estilo.css" rel="stylesheet"/>
        <title>Matriz Principal</title>
    </head>
    <body>
        <menu>
            <a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=20%></a>
            <h1>MATRIZ PRINCIPAL</h1><p>
            <a href="http://localhost/transluccaggi/logout.php"><img src="..\imagem/exit.png" width=3%></a>
            <table class="tableb">
                <tr><td><a href="../saida/form_saida_motorista.php"><button class="buttonb">SAÍDA DE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="../saida/form_baixa_canhotos.php"><button class="buttonb">BAIXA DE CANHOTOS</button></a></td></tr>
                <tr><td><a href="../saida/form_romaneio_cargas.php"><button class="buttonb">ROMANEIO DE CARGAS</button></a></td></tr>
                <tr><td><a href="../saida/form_registro_devolucao.php"><button class="buttonb">REGISTRO DE DEVOLUÇÕES</button></a></td></tr>
                <tr><td><h2>CADASTROS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>PESQUISAS</h2></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_nfs.php"><button>NOTAS</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_clientes.php"><button>CLIENTES</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_distribuidoras.php"><button>DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><h2>MOTORISTAS</h2></td></tr>
                <tr><td><a href="..\cadastro/form_cadastrar_motoristas.php"><button>CADASTRAR</button></a></td></tr>
                <tr><td><a href="..\pesquisa/form_pesquisar_motoristas.php"><button>PESQUISAR</button></a></td></tr>
                <tr><td><h2>FINANCEIRO</h2></td></tr>
                <tr><td><a href="..\financeiro/form_frete_motoristas.php"><button>FRETE MOTORISTAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_distribuidoras.php"><button>FECHAMENTO DISTRIBUIDORAS</button></a></td></tr>
                <tr><td><a href="..\financeiro/form_fechamento_motoristas.php"><button>FECHAMENTO MOTORISTAS</button></a></td></tr>
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
                                    <td><h2><nobr><input type="radio" name="opc" value="cad">CADASTRO:<?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));   ?></nobr></h2></td>
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
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cpf">CPF:<?php echo $vn['cpf'];   ?></nobr></h2></td>
                                    <td><input name="cpf_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="rg">RG:<?php echo $vn['rg'];   ?></nobr></h2></td>
                                    <td><input name="rg_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nas">NASCIMENTO:<?php echo date( 'd/m/Y' , strtotime( $vn['nascimento']));   ?></nobr></h2></td>
                                    <td><input name="nas_mot" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nat">NATURALIDADE:<?php echo $vn['naturalidade'];   ?></nobr></h2></td>
                                    <td><input name="nat_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cnh">CNH:<?php echo $vn['cnh'];   ?></nobr></h2></td>
                                    <td><input name="cnh_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="val">VALIDADE(CNH):<?php echo date( 'd/m/Y' , strtotime( $vn['validade_cnh']));   ?></nobr></h2></td>
                                    <td><input name="val_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cat">CATEGORIA(CNH):<?php echo $vn['categoria_cnh'];   ?></nobr></h2></td>
                                    <td><input name="cat_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cep">CEP:<?php echo $vn['cep'];   ?></nobr></h2></td>
                                    <td><input name="cep_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ban">CEP:<?php echo $vn['banco'];   ?></nobr></h2></td>
                                    <td><input name="ban_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cod">CÓDIGO BANCO:<?php echo $vn['cod_banco'];   ?></nobr></h2></td>
                                    <td><input name="cod_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="age">AGÊNCIA BANCO:<?php echo $vn['agencia_banco'];   ?></nobr></h2></td>
                                    <td><input name="age_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="">CONTA BANCO:<?php echo $vn['conta_banco'];   ?></nobr></h2></td>
                                    <td><input name="con_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ano">ANO VEÍCULO:<?php echo $vn['ano_veiculo'];   ?></nobr></h2></td>
                                    <td><input name="ano_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cor">COR VEÍCULO:<?php echo $vn['cor_veiculo'];   ?></nobr></h2></td>
                                    <td><input name="cor_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ren">RENAVAM:<?php echo $vn['renavam'];   ?></nobr></h2></td>
                                    <td><input name="ren_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="num">NÚMERO CHASSI:<?php echo $vn['num_chassi'];   ?></nobr></h2></td>
                                    <td><input name="num_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ant">ANTT:<?php echo $vn['antt'];   ?></nobr></h2></td>
                                    <td><input name="ant_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="caa">CATEGORIA(ANTT):<?php echo $vn['categoria_antt'];   ?></nobr></h2></td>
                                    <td><input name="caa_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="vaa">VALIDADE(ANTT):<?php echo date( 'd/m/Y' , strtotime( $vn['validade_antt']));   ?></nobr></h2></td>
                                    <td><input name="vaa_mot" type=date></td>
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
<?php
    }
}
?>