<?php
    try {
        $conexao = mysqli_connect('localhost','id10375306_xuaum','picolo1997','id10375306_livro');
                                //servidor , usuario banco, senha, nome do banco
    
        $id = $_GET['id'];
        
        $query = "SELECT * FROM tb_livro WHERE cd_livro = $id";
        
        
        $resultado = mysqli_query($conexao,$query);
       
       
        
        while($linha = mysqli_fetch_assoc($resultado)){
             
        $registro = array(
            'livros'=>array(
                'codigo' => $linha['cd_livro'],
                'livro' => $linha['nm_livro'],
                'autor' => $linha['nm_autor'],
                'ano' => $linha['nr_ano'],
                'imagem' => $linha['url_img'],
            )
        );
        
            
        }
       
        echo json_encode($registro);
 
    } catch (Exception $e ) {
        echo "Erro ao buscar: ".$e;
    }