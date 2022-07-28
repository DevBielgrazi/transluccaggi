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
                <a href="form_pesquisar_nfs.php">>PESQUISAR NOTAS</a>
                <a href="form_pesquisar_clientes.php">>PESQUISAR CLIENTES</a>
                <a href="form_pesquisar_distribuidoras.php">>PESQUISAR DISTRIBUIDORAS</a>
                <a href="..\cadastro/cadastrar_motoristas.php">>CADASTRAR MOTORISTA</a>
                <a href="form_pesquisar_motoristas.php">>PESQUISAR MOTORISTA</a>
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
        <logo>
        	<a href="..\menu.php"><img src="..\imagem/logo.png" width=25%></a>
        </logo>
		<exit>
        	<a href="..\logout.php"><img src="..\imagem/exit.png" width=50%></a>
		</exit>
		</div>
		<pag>
			<h1>PESQUISAR MOTORISTAS</h1><p>
			<table>
				<tr>
					<td>
						<form method="post" action="pesquisar_motoristas.php">
							<table>
                                <tr>
									<td><h4>TODOS<input type="radio" name="opc" value="tod"></h4></td>
								</tr>
								<tr>
									<td><h4>CADASTRO:<input type="radio" name="opc" value="cad"></h4></td>
									<td><input autocomplete="off" name="cad_mot" type=date ></td>
									<td><h4>ATÉ</h4></td>
									<td><input autocomplete="off" name="cad_mot2" type=date ></td>
								</tr>
                                <tr>
									<td><h4>NOME:<input type="radio" name="opc" value="nom"></h4></td>
									<td><input autocomplete="off" name="nom_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>VEÍCULO:<input type="radio" name="opc" value="vei"></h4></td>
									<td><input autocomplete="off" name="vei_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>PLACA:<input type="radio" name="opc" value="pla"></h4></td>
									<td><input autocomplete="off" name="pla_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>TELEFONE:<input type="radio" name="opc" value="tel"></h4></td>
									<td><input autocomplete="off" name="tel_mot" type= size=16 maxlength= ></td>
								</tr>
                                <tr>
									<td><h4>ENDEREÇO:<input type="radio" name="opc" value="end"></h4></td>
									<td><input autocomplete="off" name="end_mot" type= size=16 maxlength= ></td>
								</tr>
							</table>
                            <tr>
                                <td><input autocomplete="off" class="inputb" type=submit value=PESQUISAR></td>
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