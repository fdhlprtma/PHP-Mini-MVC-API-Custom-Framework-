<?php

// Import koneksi
include_once __DIR__ . '/../../../config/db.php';

// Pastikan variabel $conn terbaca
if (!isset($conn)) {
  die("Koneksi database tidak ditemukan! Pastikan db.php mendefinisikan \$conn");
}

// =======================
// LOGIN USER
// =======================
function loginUser($username, $password)
{
  // Ambil variabel global koneksi dari db.php
  global $conn;

  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
  $stmt->execute([$username, $password]);

  return $stmt->fetch(PDO::FETCH_ASSOC);
}

// =======================
// GET ALL USERS
// =======================
function getUsers()
{
  global $conn;

  $stmt = $conn->query("SELECT * FROM users");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
