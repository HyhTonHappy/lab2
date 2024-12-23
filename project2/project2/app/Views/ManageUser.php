?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .container {
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        button {
            margin-right: 10px;
        }

        .message {
            text-align: left;
            margin-bottom: 20px;
            color: red;
        }

        .message.success {
            color: green;
        }

        .edit-form {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            display: none;
        }
    </style>
    <script>
        function showEditForm(username, type, position) {
            document.getElementById('edit-username').value = username;
            document.getElementById('edit-type').value = type;
            document.getElementById('edit-position').value = position;
            document.getElementById('edit-form').style.display = 'block';
        }
    </script>
</head>
<body>
    <ul>
        <li><a class="active" href="/manager">Home</a></li>
        <li><a href="/manageruser">User</a></li>
        <li><a href="/list">Todo</a></li>
        <li><a href="/">Đăng xuất</a></li>
    </ul>

    <h1>User Management</h1>

    <div class="message">
        <?= esc($message ?? '') ?>
    </div>

    <!-- Form to add new user -->
    <h2>Add New User</h2>
    <form action="/manageruser" method="post">
        <?= csrf_field(); ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="type">Type:</label>
        <select id="type" name="type" required>
            <option value="user">User</option>
        </select>

        <button type="submit">Add User</button>
    </form>

    <!-- Edit User Form -->
    <div id="edit-form" class="edit-form">
        <h2>Edit User</h2>
        <form action="/manageruser/updateUser" method="post">
        <?= csrf_field(); ?>
        
        <label for="edit-username">Username (unchangeable):</label>
        <input type="text" id="edit-username" name="username" readonly>
        <br>

        <label for="edit-password">Password:</label>
        <input type="password" id="edit-password" name="password" required>
        <br>

        <label for="edit-type">Type:</label>
        <select id="edit-type" name="type" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <label for="edit-position">Position:</label>
        <select id="edit-position" name="position" required>
            <option value="Add">Thêm</option>
            <option value="Delete">Xoá</option>
            <option value="Edit">Sửa</option>
        </select>
        <br>

        <button type="submit">Save Changes</button>
    </form>
    </div>

    <h2>User List</h2>
    <table>
        <thead>
            <tr>
                <th>Username</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['type']) ?></td>
                        <td>
                            <a href="/manageruser/deleteUser/<?= esc($user['username']) ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">No users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
