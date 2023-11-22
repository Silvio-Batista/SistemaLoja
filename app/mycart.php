<?php

require 'Product.php';
require 'Cart.php';

session_start();


$cart = new Cart;
$productsInCart = $cart->getCart();

// var_dump($productsInCart);

if (isset($_GET['idProduto'])) {
  $id = strip_tags($_GET['idProduto']);
  $cart->remove($id);
  header('Location: mycart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>

  <a href="index.php">Go to home</a>

  <ul>
    <?php if (count($productsInCart) <= 0) : ?>
      Nenhum produto no carrinho
    <?php endif; ?>

    <?php foreach ($productsInCart as $product) : ?>
      <li>
        <?php echo $product->getName(); ?>
        <input type="text" value="<?php echo $product->getQuantity() ?>">
        Price: R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?>
        Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?>
        <a href="?idProduto=<?php echo $product->getId(); ?>">remove</a>
      </li>
    <?php endforeach; ?>
    <li>Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
  </ul>
    <span id="message"></span>
    <span>Consultar frete e prazo de entrega</span><br>
    <input type="text" id="cep" placeholder="cep" class="input"><br>
    <span id="address">Cidade: </span><br>
    <span id="bairro">Bairro: </span><br>
    <span id="cidade">Estado: </span><br>
    <span id="estado">UF: </span><br>
    <span id="frete">Total: </span><br>
  
  <script src="script.js"></script>
</body>

</html>