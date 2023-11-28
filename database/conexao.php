<?php
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="suplementos_frangolinos";
	
	$mysqli = new mysqli($hostname, $username, $password, $dbname);
	$queryF = "SELECT * FROM produtos";
	$result = $mysqli->query($queryF);

// 	$query = "CREATE TABLE clientes ( idCliente int Primary Key AUTO_INCREMENT, nome varchar(25), dataNascimento date, telefone varchar(25), email varchar(50), nomeLogin varchar(25), senha varchar(50));";
// 	$query2 = "CREATE TABLE produto ( idProduto int Primary Key AUTO_INCREMENT, nomeProduto varchar(25) NOT NULL, descricao varchar(150), preco varchar(25) NOT NULL, quantidade varchar(25) );";
	
// 	$query3 = "CREATE TABLE compra ( idCompra int Primary Key AUTO_INCREMENT, idCliente int, idProduto int);";
// 	$query4 = "ALTER TABLE compra ADD FOREIGN KEY (idCliente) REFERENCES cliente(idCliente);;";
// 	$query5 = "ALTER TABLE compra ADD FOREIGN KEY (idProduto) REFERENCES produto(idProduto);";
	
// // quando fizer o git clone, mudar os nomes da tabelas. clientes = cliente e produto = produtos e compra = compras
// 	$result2 = $mysqli->query($query2);
// 	$result3 = $mysqli->query($query3);
// 	$result4 = $mysqli->query($query4);
// 	$result5 = $mysqli->query($query5);
	
	// $tabela = mysqli_fetch_assoc($result);





	
	
?>
