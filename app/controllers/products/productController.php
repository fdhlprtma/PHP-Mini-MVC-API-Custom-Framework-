<?php

include_once __DIR__ . '/../../models/products/productModel.php';

class ProductController
{
  // ============================
  // GET ALL PRODUCTS (GET)
  // ============================
  public function index()
  {
    header("Content-Type: application/json");

    $products = getProducts();

    echo json_encode([
      "status" => true,
      "data" => $products
    ]);
  }

  // ==========================================
  // GET PRODUCT BY NAME (GET /api/products/{name})
  // ==========================================
  public function show($product_name)
  {
    header("Content-Type: application/json");

    if (!$product_name) {
      echo json_encode([
        "status" => false,
        "message" => "Parameter product_name wajib diisi"
      ]);
      return;
    }

    $product = getProductByName($product_name);

    if ($product) {
      echo json_encode([
        "status" => true,
        "data" => $product
      ]);
    } else {
      echo json_encode([
        "status" => false,
        "message" => "Produk tidak ditemukan"
      ]);
    }
  }
}
