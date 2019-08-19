<?php
    try {
        $conexao = mysqli_connect('localhost','id10375306_xuaum','picolo1997','id10375306_livro'); 
                                //servidor , usuario banco, senha, nome do banco
    
        
        $query = "SELECT * FROM tb_livro ORDER BY cd_livro ASC";
        
        
        $resultado = mysqli_query($conexao,$query);
        
        $registro = array(
            'livros'=>array()
        );
        
        $i = 0;
        
        while($linha = mysqli_fetch_assoc($resultado)){
            $registro['livros'][$i] = array(
                'codigo' => $linha['cd_livro'],
                'livro' => $linha['nm_livro'],
                'autor' => $linha['nm_autor'],
                'ano' => $linha['nr_ano']
            );
            
            $i++;
        }
      
       echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }
?>