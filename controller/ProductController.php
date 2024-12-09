<?php
// ProductController.php

class ProductController
{
    private $productModel;

    public function __construct($conn)
    {
        $this->productModel = new ProductModel($conn);
    }

    // Halaman utama
    public function home()
    {
        if (!isset($_SESSION['username'])) {
            header('Location: index.php?action=login');
            exit;
        }

        // Memeriksa apakah ada permintaan untuk menghapus produk
        if (isset($_GET['hapus'])) {
            $this->productModel->deleteProduct($_GET['hapus']);
            header('Location: index.php?action=home');
            exit;
        }

        $products = $this->productModel->getAllProduct();
        $items = $products->fetch_all(MYSQLI_ASSOC);
        include 'views/home.php';
    }

    // Menambahkan produk
    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel = new ProductModel();
    
            $target_dir = "img";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            
            // Proses upload file
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $data = [
                    'name' => $_POST['name'],
                    'price' => $_POST['price'],
                    'image' => basename($_FILES['image']['name'])
                ];

                // Tambahkan ke database
                $this->productModel->addProduct($data);

                // Redirect ke halaman utama
                header('Location: index.php?action=home');
                exit;
            } else {
                echo "Error uploading the file.";
            }
        }

        // Tampilkan form tambah barang
        include 'views/addProduct.php';
    }

    // Menampilkan detail produk
    public function detail($id)
    {
        $item = $this->productModel->getProductById($id);

        if (!$item) {
            echo "<h2>Item tidak ditemukan!</h2>";
            exit();
        }

        include 'views/detail.php';
    }

    // Memproses update produk
    public function editProduct($id) {
        $item = $this->productModel->getProductById($id);
    
        if (!$item) {
            echo "<h2>Item tidak ditemukan!</h2>";
            exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];
    
            // Default ke gambar lama
            $target_file = $item['image'];
    
            // Jika ada gambar baru yang diupload, lakukan proses upload
            if (!empty($image)) {
                $target_dir = "img/";
                $target_file = $target_dir . basename($image);
    
                // Memindahkan file gambar ke direktori yang diinginkan
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                    $target_file = basename($image); // Hanya menyimpan nama file
                } else {
                    echo "<h3>Error uploading the file. Using old image.</h3>";
                    $target_file = $item['image']; // Kembali ke gambar lama jika gagal
                }
            }
    
            // Memanggil fungsi updateProduct dari model untuk update data di database
            if ($this->productModel->updateProduct($id, $name, $price, $target_file)) {
                header('Location: index.php?action=home');
                exit();
            } else {
                echo "<h3>Terjadi kesalahan saat mengupdate data.</h3>";
            }
        }
    
        include 'views/editProduct.php';
    }
}
?>