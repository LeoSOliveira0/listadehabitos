<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>lista de habitos</title>
</head>
<body>
    <div class="center">
        <h1>Lista de habitos</h1>
        <p>Cadastre aqui os habitos que voce tem que vencer para melhorar sua vida!</p>
        
        <?php
        $servidor = "localhost";
        $usuario = "root";
        $bancodedados = "listadehabitos";

        $conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

        if ($conexao->connect_error){
            die("falha na conexao: " .
                	$conexao->connect_error);
        }
        $sql = " SELECT id ".
                "      , nome".
                " FROM habito ".
                "WHERE status = 'A'";
        $resultado = $conexao->query($sql);
        
        if ($resultado->num_rows > 0) {
            ?>
            <br />
            <table class="center">
                <tbody>
                    <?php
                    while($registro = $resultado->fetch_assoc() ){
                        ?>

                        <tr>
                        <td><?php echo $registro["nome"]; ?></td>
                        
                        <td><a href="vencerhabito.php?id=<?php echo $registro["id"]; ?>">Vencer</a></td>
                        <td><a href="desistirhabito.php?id=<?php echo $registro["id"]; ?>">desistir</a></td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <p>Continue mudando sua vida!</p>
                    <p>Cadastre mais habitos!</p>
                        	<?php
                        }else{
                            ?>
                            <p>Voce nao possui habitos cadastrados!</p>
                            <p>Comece ja a mudar sua vida!</p>
                            <?php
                        }

                        $conexao->close();
                        ?>

                        <a href="novohabito.php">Cadastrar Habito</a>
                    </div>
    </body>
</html>
