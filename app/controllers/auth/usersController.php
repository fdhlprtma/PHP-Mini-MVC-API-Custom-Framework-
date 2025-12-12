<?php
include_once __DIR__ . '/../../models/auth/usersModel.php';

class UsersController
{
  // ==========================
  // LOGIN (POST /api/login)
  // ==========================
  public function login()
  {
    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      echo json_encode([
        "status" => false,
        "message" => "Method not allowed"
      ]);
      return;
    }

    // Ambil input JSON / form
    $input = json_decode(file_get_contents("php://input"), true);

    $username = $input['username'] ?? '';
    $password = $input['password'] ?? '';

    if ($username === '' || $password === '') {
      http_response_code(400);
      echo json_encode([
        "status" => false,
        "message" => "Username dan password wajib diisi!"
      ]);
      return;
    }

    // Cek user
    $user = loginUser($username, $password);

    if ($user) {
      echo json_encode([
        "status" => true,
        "message" => "Login berhasil",
        "user" => $user
      ]);
      return;
    }

    http_response_code(401);
    echo json_encode([
      "status" => false,
      "message" => "Login gagal! Username atau password salah."
    ]);
  }


  // ==========================
  // GET ALL USERS (GET /api/users)
  // ==========================
  public function getAll()
  {
    header("Content-Type: application/json");

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
      http_response_code(405);
      echo json_encode([
        "status" => false,
        "message" => "Method not allowed"
      ]);
      return;
    }

    if (!function_exists('getUsers')) {
      echo json_encode([
        "status" => false,
        "message" => "getUsers() tidak ditemukan"
      ]);
      return;
    }

    echo json_encode([
      "status" => true,
      "data" => getUsers()
    ]);
  }
}
