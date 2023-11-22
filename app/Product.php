<?php
require('../database/conexao.php');

class Product
{

  private int $idProduto;
  private string $nomeProduto;
  private string $preco;
  private int $quantidade;


  public function setId(int $idProduto)
  {
    $this->idProduto = $idProduto;
  }

  public function setName(string $nomeProduto)
  {
    $this->nomeProduto = $nomeProduto;
  }

  public function setPrice(string $preco)
  {
    $this->preco = $preco;
  }

  public function setQuantity(int $quantidade)
  {
    $this->quantidade = $quantidade;
  }

  public function getId()
  {
    return $this->idProduto;
  }

  public function getName()
  {
    return $this->nomeProduto;
  }


  public function getPrice()
  {
    return $this->preco;
  }

  public function getQuantity()
  {
    return $this->quantidade;
  }
}
