<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<link rel="icon" href="..\imagem/favicone.png"/>
		<title>Matriz Principal</title>
	</head> 
	<body>
        <table border=1>
            <tr>
                <td><h3>NÚMERO</h3></td>
                <td><h3>SÉRIE</h3></td>
                <td><h3>EMISSÃO</h3></td>
                <td><h3>ENTRADA</h3></td>
                <td><h3>VOLUMES</h3></td>
                <td><h3>VALOR</h3></td>
                <td><h3>PESO</h3></td>
                <td><h3>CLIENTE</h3></td>						
            </tr>
<?php
#IMPORTANDO CONEXÃO COM O BANCO
	require('../connect.php');
#VARIÁVEIS DO FORMULÁRIO
    $dat = trim($_POST['dat']);
    $dat2 = trim($_POST['dat2']);
    $dis = trim($_POST['dis']);
#ADQUIRINDO INFORMAÇÕES DO BANCO
    $sql = mysqli_query($conn,"SELECT * FROM $tab_nfs WHERE `cod_distribuidora` = '$dis' and `entrada` >= '$dat' and `entrada` <= '$dat2'");
#TRANSFORMANDO RESULTADO EM NÚMEROS
    $n = mysqli_num_rows($sql);
#INICIANDO CONTADOR
    $i=0;
#APRESENTANDO DADOS DO BANCO
        while($i!=$n)
        {
#CADASTROS POR COLUNA
            $vn = mysqli_fetch_array($sql); ?>
                <tr>
                    <td><h4><nobr><?php echo $vn['numero'];   ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['serie'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['emissao']));    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo date( 'd/m/Y' , strtotime( $vn['entrada']));    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['volumes'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['valor'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['peso'];    ?></nobr></h4></td>
                    <td><h4><nobr><?php echo $vn['nome_cliente'];    ?></nobr></h4></td>
                </tr>                                            
<?php
#SOMANDO AO CONTADOR
            $i=$i+1;
        }
?>
            <a href="http://localhost/transluccaggi/menu.php"><img src="..\imagem/logo.png" width=10%></a>
            </table>
            <script>window.print();</script>
    </body>
</html>