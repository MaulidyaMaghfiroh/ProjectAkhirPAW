<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #ff66b2;
            margin-bottom: 20px;
        }
        .btn, .logout-btn {
            display: inline-block;
            background-color: #ff66b2;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }
        .logout-btn {
            float: right;
        }
        .btn:hover, .logout-btn:hover {
            background-color: #ff3385;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        .table th {
            background-color: #ff99cc;
            color: white;
        }
        .table td img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }
        .table a {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            margin: 5px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .table a:hover {
            background-color: #45a049;
        }
        .table a.delete {
            background-color: #f44336;
        }
        .table a.delete:hover {
            background-color: #e60000;
        }
        @media (max-width: 768px) {
            .table th, .table td {
                font-size: 14px;
            }
            .table td img {
                width: 80px;
            }
        }
        @media (max-width: 480px) {
            .table th, .table td {
                font-size: 12px;
            }
            .table td img {
                width: 60px;
            }
        }
    </style>
</head>
<body>
    <h2>Daftar Barang</h2>
    <a href="index.php?action=addProduct" class="btn">Add Item</a>
    <a href="index.php?action=logout" class="logout-btn">Logout</a>
    <table class="table">
        <tr>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= htmlspecialchars($item['name']); ?></td>
            <td>Rp <?= number_format($item['price'], 3, '.'); ?></td>
            <td>
                <img src="img/<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>">
            </td>
            <td>
                <a href="index.php?action=detail&id=<?= $item['id']; ?>">Detail</a>
                <a href="index.php?action=editProduct&id=<?= $item['id']; ?>">Edit</a>
                <a href="index.php?action=home&hapus=<?php echo htmlspecialchars($item['id']); ?>" class="delete">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>