<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
            text-align: center;
        }

        .form-container {
            background-color: #ffe6f2;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        h2 {
            margin-bottom: 20px;
            color: #d5006d;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"], input[type="number"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #d5006d;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c4005a;
        }

        img {
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Barang</h2>
        <form method="POST" enctype="multipart/form-data" action="">
            <label>Nama Produk</label>
            <input type="text" name="name" value="<?= htmlspecialchars($item['name']); ?>" required />
            
            <label>Harga</label>
            <input type="number" name="price" value="<?= htmlspecialchars($item['price']); ?>" required />
            
            <label>Gambar Sekarang</label>
            <img src="img<?= htmlspecialchars($item['image']); ?>" width="100" alt="<?= htmlspecialchars($item['name']); ?>">
            
            <label>Ganti Gambar (jika diperlukan)</label>
            <input type="file" name="image" />

            <button type="submit">Update Item</button>
        </form>
    </div>
</body>
</html>