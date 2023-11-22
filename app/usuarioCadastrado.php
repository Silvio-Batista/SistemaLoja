<?php
// include 'login.php';
// include 'cadastrar.php';
require 'Cart.php';
require 'Product.php';
require('../database/conexao.php');

session_start();
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Suplementos Frangolino</title>
</head>
<header>
  <h3>
    <?php 
    if(!isset($_SESSION)){
      session_start();
    }
    echo "Olá, " . $_SESSION['nome']
    ?>
  </h3>
</header>
<body>
  <a href="mycart.php">Go to cart</a>
  <a href="sair.php">deslogar</a>
  
  <ul style=" list-style-type: none">
    <?php
    while ($productDB = mysqli_fetch_assoc($result)) {
      echo "<li>Produto: " . $productDB['nomeProduto'] . " Quantidade: " . $productDB['quantidade'] . " <br>Preço: R$" . number_format($productDB['preco'], 2, ',', '.') . " <br>Descrição: " . $productDB['descricao'] .
        '<br><a href="?idProduto=' . $productDB['idProduto'] . '">Adicionar ao carrinho</a></li><br>';
    }
    ?>
  </ul>
  <?php
  $id = strip_tags($_GET['idProduto']);

  $idProdutos = "SELECT * FROM produtos WHERE idProduto = $id";
  $resultProdutos = $mysqli->query($idProdutos);
  $productCart = mysqli_fetch_assoc($resultProdutos);

  if (isset($_GET['idProduto'])) {


    $productInfo = $productCart;

    $product = new Product;
    $product->setId($productInfo['idProduto']);
    $product->setName($productInfo['nomeProduto']);
    $product->setPrice($productInfo['preco']);
    $product->setQuantity($productInfo['quantidade']);


    $cart = new Cart;
    $cart->add($product);
  }
  ?>
</body>

</html>