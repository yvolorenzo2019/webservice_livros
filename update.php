<?php
    try {
        $conexao = mysqli_connect('localhost','id10375306_xuaum','picolo1997','id10375306_livro'); 
                                //servidor , usuario banco, senha, livro do banco
        
        $codigo = $_POST['codigo'];
        $livro = $_POST['livro'];
        $autor = $_POST['autor'];
        $ano = $_POST['ano'];
        if($_FILES['foto1']['name'] != ''){
            $test = explode('.', $_FILES['foto1']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "png"){
                $nome = rand(100,9999).'.'.$extensao;
                $local = 'fotos/'.$nome;
                move_uploaded_file($_FILES['foto1']['tmp_name'], $local);
            }
        }
        
        $query = "UPDATE tb_livro SET nm_livro = '$livro', nm_autor = '$autor', nr_ano = '$ano', url_img = '$local' WHERE cd_livro = $codigo";
        
        mysqli_query($conexao,$query);
        echo "O livro foi atualizado";
    } catch (Exception $e ) {
        echo "Erro ao cadastrar: ".$e;
    }