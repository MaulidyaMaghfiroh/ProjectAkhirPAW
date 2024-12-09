<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffe6f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #ff66b2;
        }

        label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            color: #ff66b2;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ff99cc;
            border-radius: 5px;
            background-color: #fff0f5;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ff66b2;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff3385;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #ff66b2;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            margin-top: 10px;
            font-size: 16px;
            text-align: center;
            background-color: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (!empty($error_message)): ?>
            <div class="error"><?= htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label>Username:</label>
            <input type="text" name="username" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <a href="index.php?action=register">Belum punya akun? Register di sini.</a>
    </div>
</body>
</html>