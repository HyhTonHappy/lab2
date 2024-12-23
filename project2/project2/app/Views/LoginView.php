<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
        }
        label, input, button {
            margin-bottom: 15px;
        }
        input {
            padding: 8px;
            font-size: 14px;
        }
        button {
            padding: 10px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            color: red;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <!-- Hiển thị thông báo nếu có -->
    <?php if (!empty($message)): ?>
        <p class="message">
            <?= esc($message); ?>
        </p>
    <?php endif; ?>

    <!-- Form đăng nhập -->
    <form action="/login" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>
    <a href="/">Go back to Home</a>
</body>
</html>
