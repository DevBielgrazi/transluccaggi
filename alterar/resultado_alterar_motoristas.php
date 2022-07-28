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
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="icon" href="..\imagem/favicone.png"/>
        <link href="..\estilo.css" rel="stylesheet"/>
        <title>Matriz Principal</title>
    </head>
    <body>
		<div class="bar">
			<div class="dropdown">
        <bars><img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="15%"></img>
            <div id="myDropdown" class="dropdown-content">
                <a href="..\saida/form_saida_motorista.php">>SAÍDA DE MOTORISTAS</a>
                <a href="..\saida/baixa_canhotos.php">>BAIXA DE CANHOTOS</a>
                <a href="..\saida/form_romaneio_cargas.php">>ROMANEIO DE CARGAS</a>
                <a href="..\saida/registro_devolucao.php">>REGISTRO DE DEVOLUÇÕES</a>
				<a href="..\saida/agendar_entrega.php">>AGENDAR ENTREGA</a>
                <a href="..\cadastro/cadastrar_nfs.php">>CADASTRO NOTAS</a>
                <a href="..\cadastro/cadastrar_clientes.php">>CADASTRO CLIENTES</a>
                <a href="..\cadastro/cadastrar_distribuidoras.php">>CADASTRO DISTRIBUIDORAS</a>
                <a href="..\pesquisa/form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="..\pesquisa/form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="..\pesquisa/form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="..\pesquisa/form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
                <a href="..\financeiro/form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="..\financeiro/form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="..\financeiro/form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="..\financeiro/form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="..\financeiro/form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="..\financeiro/form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
            </div>
		</div></bars>
		<script>
            function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
                }
            }
            }
        </script>
        <back>
        	<a href="..\pesquisa/form_pesquisar_motoristas.php"><img src="..\imagem/back.png" width=20%></a>
        </back>
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
		</div>
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
                                <input autocomplete="off" type="hidden" name="id" value="<?php echo $vn['id'];?>">
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cad">CADASTRO:<?php echo date( 'd/m/Y' , strtotime( $vn['cadastro']));   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cad_mot" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nom">NOME:<?php echo $vn['nome'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="nom_mot" type=tex size=16 maxlength=32></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="vei">VEÍCULO:<?php echo $vn['veiculo'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="vei_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="pla">PLACA:<?php echo $vn['placa'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="pla_mot" type=text size=16 maxlength=8></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="tel">TELEFONE:<?php echo $vn['telefone'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="tel_mot" type=int size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="end">ENDEREÇO:<?php echo $vn['endereco'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="end_mot" type=text size=16 maxlength=64></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cpf">CPF:<?php echo $vn['cpf'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cpf_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="rg">RG:<?php echo $vn['rg'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="rg_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nas">NASCIMENTO:<?php echo date( 'd/m/Y' , strtotime( $vn['nascimento']));   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="nas_mot" type=date></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="nat">NATURALIDADE:<?php echo $vn['naturalidade'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="nat_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cnh">CNH:<?php echo $vn['cnh'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cnh_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="val">VALIDADE(CNH):<?php echo date( 'd/m/Y' , strtotime( $vn['validade_cnh']));   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="val_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cat">CATEGORIA(CNH):<?php echo $vn['categoria_cnh'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cat_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cep">CEP:<?php echo $vn['cep'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cep_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ban">CEP:<?php echo $vn['banco'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="ban_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cod">CÓDIGO BANCO:<?php echo $vn['cod_banco'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cod_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="age">AGÊNCIA BANCO:<?php echo $vn['agencia_banco'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="age_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="">CONTA BANCO:<?php echo $vn['conta_banco'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="con_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ano">ANO VEÍCULO:<?php echo $vn['ano_veiculo'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="ano_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="cor">COR VEÍCULO:<?php echo $vn['cor_veiculo'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="cor_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ren">RENAVAM:<?php echo $vn['renavam'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="ren_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="num">NÚMERO CHASSI:<?php echo $vn['num_chassi'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="num_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="ant">ANTT:<?php echo $vn['antt'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="ant_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="caa">CATEGORIA(ANTT):<?php echo $vn['categoria_antt'];   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="caa_mot" type=text size=16 maxlength=16></td>
								</tr>
                                <tr>
                                    <td><h2><nobr><input type="radio" name="opc" value="vaa">VALIDADE(ANTT):<?php echo date( 'd/m/Y' , strtotime( $vn['validade_antt']));   ?></nobr></h2></td>
                                    <td><input autocomplete="off" name="vaa_mot" type=date></td>
								</tr>
							</table>
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=ALTERAR></td>
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