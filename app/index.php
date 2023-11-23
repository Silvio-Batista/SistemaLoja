<?php
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
  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- fim Google Fonts -->
  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- Fim Bootstrap icon -->
  <!-- Favicon -->
  <link rel="shortcut icon" href="images/Suplementos-frangolino.ico" type="image/x-icon">
  <!-- fim favicon -->
  <link rel="stylesheet" href="style/index.css">

  <title>Suplementos Frangolino</title>
</head>

<body>
  <!-- <a href="sair.php">sessao</a> -->
  <header>
    <div class="interface">
      <div class="logo">
        <a href="index.php"><img src="images/Suplementos frangolino.png" alt="logo suplementos frangolino"></a>
      </div> <!-- logo -->
      <nav class="menu-desktop">
        <ul>
          <li><a href="mycart.php"><i class="bi bi-cart-check"></i>Carrinho</a></li>
          <li><a href="login.php">Fazer Login</a></li>
          <li><a href="cadastrar.php">Cadastrar</a></li>
        </ul><!-- menu desktop -->
      </nav>
    </div><!-- interface -->
  </header>
  <section>
    <div class="row">
      <?php
      while ($productDB = mysqli_fetch_assoc($result)) {
        echo '<div class="card">
            <img class="image" src="images/image' . $productDB['idProduto'] . '.png"alt="' . $productDB['nomeProduto'] . '">
            <h2>' . $productDB['nomeProduto'] . "</h2><p><b>Preço: R$" . number_format($productDB['preco'], 2, ',', '.') . "</b> <br><b>Descrição:</b> " . $productDB['descricao'] .
          '<br><a class="btn" href="?idProduto=' . $productDB['idProduto'] . '">Adicionar ao carrinho</a></p></div>';
      }
      ?>
    </div>
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
  </section>
</body>

</html>