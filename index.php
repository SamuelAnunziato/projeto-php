<?php
	try {
		$con = new PDO('mysql:host=localhost,dbname=crud_pdo;', 'root', '');
	} catch (PDOException $e) {
		echo 'Erro ou falta de banco: ' . $e->getMessage();
	}

	$nome = "Megan Fox";
	$telefone = "11 97432-2342";
	$email = "meganfox@gmail.com";

	$sql = 'INSERT INTO pessoa (nome, telefone, email) VALUES (:n,:t,:e)';

	// ou

	$sql = 'INSERT INTO pessoa (nome, telefone, email) VALUES (:n,?,?)';

	$stm = $con->prepare($sql);
	$stm->bindValue(':n',$nome);
	$stm->bindValue(2,$telefone);
	$stm->bindValue(3,$email);

	$stm->execute();

	$sql = 'SELECT * FROM pessoa';

	$stm = $con->prepare($sql);
	$stm->execute();
	echo 'Nome | Telefone | E-mail';
	while($linha = $stm->fetch()) {
		echo $linha['nome'].' | '.$linha['telefone'].' | '.$linha['email'].'<br>';
		echo'SNACK SNACK';
	}
?>