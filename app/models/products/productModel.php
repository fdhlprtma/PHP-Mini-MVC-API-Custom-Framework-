<?php
include_once __DIR__ . '/../../../config/db.php';

function getProducts()
{
  global $conn;

  $stmt = $conn->query("SELECT * FROM products");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductByName($product_name)
{
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM products WHERE product_name = ?");
  $stmt->execute([$product_name]);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}
