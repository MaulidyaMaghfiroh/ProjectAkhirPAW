<?php
class ProductModel {
    private $conn;

    public function __construct() {
        // Ambil konfigurasi database dari file db.php
        include 'config/db.php';

        global $conn;
        // Membuat koneksi
        $this->conn = $conn;

        // Periksa apakah koneksi berhasil
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getAllProduct() {
        $sql = "SELECT * FROM items";
        return $this->conn->query($sql);
    }

    public function addProduct($data) {

        $sql = "INSERT INTO items (name, price,image) VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param("sds", $data['name'], $data['price'], $data['image']);

        return $stmt->execute();
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM items WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateProduct($id, $name, $price, $image) {
        // Update data di database
        $sql = "UPDATE items SET name = ?, price = ?, image = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sdsi", $name, $price, $image, $id); // Gunakan parameter yang benar
        return $stmt->execute();
    }
    public function deleteProduct($id) {
        $sql = "DELETE FROM items WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            return true; // Penghapusan berhasil
        } else {
            die("Error: " . $this->conn->error); // Debug jika ada error
        }
    }
}
?>