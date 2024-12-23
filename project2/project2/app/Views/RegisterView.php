<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
        label, input, select, button {
            margin-bottom: 10px;
        }
        input, select {
            padding: 8px;
            font-size: 16px;
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
            text-align: center;
            margin-bottom: 20px;
            color: red;
        }
        .message.success {
            color: green;
        }
    </style>
</head>
<body>
    <div class="message <?= strpos($message ?? '', 'thành công') !== false ? 'success' : ''; ?>">
        <?= esc($message ?? '') ?>
    </div>
    <form action="/register" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="">-- Select Type --</option>
            <option value="user">User</option>
            <option value="manager">Manager</option>
        </select>

        <button type="submit">Register</button>
    </form>
    <a href="/">Go back to Home</a>
</body>
</html>
