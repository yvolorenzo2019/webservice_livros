<?php

	$conexao = mysqli_connect('localhost','id10375306_xuaum','picolo1997','id10375306_livro');

	try{
		$livro = $_POST['livro'];
		$autor = $_POST['autor'];
		$ano = $_POST['ano'];
		
		if($_FILES['foto']['name'] != ''){
            $test = explode('.', $_FILES['foto']['name']);
            $extensao = end($test);
            if($extensao == "jpg" || $extensao == "png"){
                $nome = rand(100,9999).'.'.$extensao;
                $local = 'fotos/'.$nome;
                move_uploaded_file($_FILES['foto']['tmp_name'], $local);
            }
        }

		$sql = "INSERT INTO tb_livro VALUES(null,'$livro','$autor','$ano','$local')";

		mysqli_query($conexao,$sql);

        echo "Livro cadastrado";

	}catch(Exception $e){
		echo ('Não foi cadastrado'.$e);
	}


?>