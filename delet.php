<?php
	try {
        $conexao = mysqli_connect('localhost','id10375306_xuaum','picolo1997','id10375306_livro');
                                //servidor , usuario banco, senha, nome do banco
    
        $id = $_GET['id'];
        
        $query = "DELETE FROM tb_livro WHERE cd_livro = $id";
        
        mysqli_query($conexao,$query);

        echo "O livro foi removido";

    } catch (Exception $e ) {
        echo "Erro ao deletar: ".$e;
    }

?>