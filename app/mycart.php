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
  <link rel="stylesheet" href="style/mycart.css">
  <link rel="shortcut icon" href="images/Suplementos-frangolino.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <!-- Bootstrap icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <!-- Fim Bootstrap icon -->
  <title>Carrinho</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="index.php"><img src="images/Suplementos frangolino.png" alt="logo suplementos frangolino"></a>
    </div>

    <?php if (count($productsInCart) <= 0) : ?>
      <div class="interface">
        <h2 class="flex">Nenhum produto no carrinho</h2>
        <a class="btnCart" href="index.php">Adicionar produto</a>
      </div>
    <?php endif; ?>
  </header>
  <section>
    <div class="rowCard">
      <?php foreach ($productsInCart as $product) : ?>

        <div class="card-cart">
          <h2><?php echo $product->getName(); ?></h2><br>
          <h6 class="card-subtitle mb-2 text-body-secondary">Quantidade: <?php echo $product->getQuantity() ?></p>
            <p class="card-text">Preço Unitário: R$<?php echo number_format($product->getPrice(), 2, ',', '.') ?></p>
            <p class="card-text">Subtotal: R$<?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?></p>
            <a class="remover btnCart" href="?idProduto=<?php echo $product->getId(); ?>">Remover <?= $product->getName() ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section>
    <div class="rowCard">
      <div class="card-total">
        <h2><span>Total: R$<?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></span></h2>
      </div>
    </div>
  </section>
  <section>
    <div class="rowCard cep">
      <div class="card-cep">
        <span id="message"></span>
        <p class="consultar">Consultar frete e prazo de entrega</p><br>
        <div class="input-group input-group-sm mb-3">
          <span class="input-group-text" id="inputGroup-sizing-sm">CEP</span>
          <input type="text" id="cep" class="form-control" placeholder="00.000-000" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
        <!-- <input type="text" id="cep" placeholder="cep" class="input"><br> -->
        <span id="address">Cidade: </span><br>
        <span id="bairro">Bairro: </span><br>
        <span id="cidade">Estado: </span><br>
        <span id="estado">UF: </span><br>
        <span class="total" id="frete">Total: </span><br>
      </div>
    </div>
  </section>
  <footer>
    <div class="interface">
      <div class="line-footer">
        <div class="flex">
          <div class="logo">
            <img src="images/Suplementos frangolino.png" alt="logo supllementos fragolino">
          </div> <!-- logo footer -->
          <div class="btn-social">
            <a href="https://www.instagram.com/silsawkkj/"><button><i class="bi bi-instagram"></i></button></a>
            <a href="https://github.com/Silvio-Batista"><button><i class="bi bi-github"></i></button></a>
            <a href="https://www.linkedin.com/in/silvio-p-batista/"><button><i class="bi bi-linkedin"></i></button></a>
          </div> <!-- button footer -->
        </div><!-- flex -->
      </div><!-- line footer -->
      <div class="line-footer borda">
        <p><i class="bi bi-code-square"></i><a href="https://github.com/Silvio-Batista">developed by Silvio</a></p>
      </div><!-- line footer -->
    </div>
  </footer>
</body>
<script src="script/script.js"></script>

</html>