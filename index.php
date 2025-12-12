<?php

require_once __DIR__ . '/app/controllers/auth/UsersController.php';
require_once __DIR__ . '/app/controllers/products/ProductController.php';

$productController = new ProductController();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Prefix folder utama project
$base = "/belajar"; // Ganti sesuai nama folder project

// Buang prefix dari URL
$route = substr($uri, strlen($base));

// Hilangkan trailing slash
$route = rtrim($route, "/");

$method = $_SERVER['REQUEST_METHOD'];

$users = new UsersController();

// =======================
//       ROUTES API
// =======================

// POST /api/login
if ($route === "/api/login" && $method === "POST") {
  $users->login();
  exit;
}

// GET /api/users
if ($route === "/api/users" && $method === "GET") {
  $users->getAll();
  exit;
}

if ($route === "/api/products") {
  $productController->index();
  exit;
}

if (preg_match("#^/api/products/(.+)$#", $route, $match)) {
  $productController->show($match[1]);
  exit;
}

// =======================
//      DEFAULT 404
// =======================
http_response_code(404);
echo json_encode([
  "status" => false,
  "message" => "API route not found",
  "method" => $method,
  "route" => $route
]);
