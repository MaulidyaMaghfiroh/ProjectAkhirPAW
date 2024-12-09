<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffeef8;
            padding: 20px;
            text-align: center;
        }

        h1 {
            color: #d5006d;
        }

        p {
            font-size: 18px;
            color: #555;
        }

        img {
            border-radius: 10px;
            margin-top: 20px;
            max-width: 100%;
            height: auto;
        }

        a {
            display: inline-block;
            background-color: #d5006d;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #c4005a;
        }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($item['name']); ?></h1>
    <p>Harga: <?= htmlspecialchars(number_format($item['price'], 3, '.', ',')); ?></p>
    <img src="img<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>">
    <br>
    <a href="index.php?action=home">Kembali ke Daftar Barang</a>
</body>
</html>
