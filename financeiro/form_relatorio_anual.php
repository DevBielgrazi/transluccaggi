<?php
session_start();
if(!isset($_SESSION["system_control"])){
?>
	<script>
		document.location.href="http://localhost/transluccaggi/index_financeiro.html";
	</script>
<?php
}else{
	$system_control = $_SESSION["system_control"];
	if($system_control == 2){
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
		<bar>
			<canvas width="1365" height="70" style="background-color:gray"></canvas>
		</bar>
			<div class="dropdown">
        <img onclick="myFunction()"class="dropbtn" src="..\imagem/bars.png" width="2%"></img>
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
                <a href="form_relatorio_diario.php">>RELATÓRIO DIÁRIO</a>
                <a href="form_relatorio_mensal.php">>RELATÓRIO MENSAL</a>
                <a href="form_relatorio_anual.php">>RELATÓRIO ANUAL</a>
                <a href="form_frete_motoristas.php">>FRETE MOTORISTAS</a>
                <a href="form_fechamento_distribuidoras.php">>FECHAMENTO DISTRIBUIDORAS</a>
                <a href="form_fechamento_motoristas.php">>FECHAMENTO MOTORISTAS</a>
            </div>
        </div>
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
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
		<pag>
			<h1>RELATÓRIO ANUAL</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="relatorio_anual.php">
							<table>
								<tr>
                                <tr>
									<td><h4>ANO:</h4></td>
									<td><select name="ano_rel">
<?php
$ano = date('Y');
$ano_a = $ano-1;
$ano_a1 = $ano-2;
$ano_a2 = $ano-3;
$ano_a3 = $ano-4;
$ano_a4 = $ano-5;
$ano_a5 = $ano-6;
$ano_a6 = $ano-7;
$ano_a7 = $ano-8;
$ano_a8 = $ano-9;
?>
                                        <option value="<?php echo $ano ?>" selected><?php echo $ano ?></option>
                                        <option value="<?php echo $ano_a ?>"><?php echo $ano_a ?></option>
                                        <option value="<?php echo $ano_a1 ?>"><?php echo $ano_a1 ?></option>
                                        <option value="<?php echo $ano_a2 ?>"><?php echo $ano_a2 ?></option>
                                        <option value="<?php echo $ano_a3 ?>"><?php echo $ano_a3 ?></option>
                                        <option value="<?php echo $ano_a4 ?>"><?php echo $ano_a4 ?></option>
                                        <option value="<?php echo $ano_a5 ?>"><?php echo $ano_a5 ?></option>
                                        <option value="<?php echo $ano_a6 ?>"><?php echo $ano_a6 ?></option>
                                        <option value="<?php echo $ano_a7 ?>"><?php echo $ano_a7 ?></option>
                                        <option value="<?php echo $ano_a8 ?>"><?php echo $ano_a8 ?></option>
									</select></td>
								</tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=VISUALIZAR></td>
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
    else
    {
?>
	<script>
		document.location.href="http://localhost/transluccaggi/financeiro/index_financeiro.html";
	</script>
<?php
    }
}
?>