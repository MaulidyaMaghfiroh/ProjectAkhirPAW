<?php

include 'models/ProductModel.php';
include 'models/UserModel.php';

class UserController {
   
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari form
            $username = trim($_POST['username']);
            $password = $_POST['password'];
            $message = "";
    
            // Validasi input
            if (empty($username)) {
                $message = "Username tidak boleh kosong.";
            } elseif (strlen($password) < 6) {
                $message = "Password harus memiliki minimal 6 karakter.";
            } else {
                // Jika validasi lolos, lanjutkan ke proses registrasi
                $userModel = new UserModel();
                $error = $userModel->register($username, $password);
    
                if ($error) {
                    // Jika ada error dari model (misalnya username sudah terdaftar)
                    $message = $error;
                } else {
                    // Registrasi berhasil, redirect ke halaman login
                    header('Location: index.php?action=login');
                    exit;
                }
            }
    
            // Tampilkan form registrasi dengan pesan error (jika ada)
            include 'views/register.php';
        } else {
            // Jika tidak ada data POST, langsung tampilkan form registrasi
            include 'views/register.php';
        }
    }
    
    

    public function login() {
        if (isset($_SESSION['username'])) {
            header('Location: index.php?action=home');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mengambil dan membersihkan input
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            // Validasi input
            if (empty($username) || empty($password)) {
                $error = "Semua field wajib diisi.";
            } else {
                // Memanggil model untuk memeriksa login
                $userModel = new UserModel();
                $user = $userModel->login($username, $password);

                if ($user) {
                    // Jika login berhasil, simpan session dan arahkan ke halaman utama
                    $_SESSION['username'] = $username;
                    header('Location: index.php?action=home');
                    exit;
                } 
                
                else {
                    $error = "Pengguna atau password tidak valid.";
                }
            }
        }

        // Memuat view untuk halaman login
        include 'views/login.php';
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    }
}