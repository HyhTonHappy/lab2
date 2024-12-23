<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .todo-buttons {
            display: flex;
            gap: 10px;
        }

        .todo-buttons a {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .todo-buttons a.delete {
            background-color: #f44336;
        }

        .todo-buttons a.edit {
            background-color: #2196F3;
        }

        .todo-buttons a.comment {
            background-color: #ff9800;
        }

        .comment-list {
            margin-top: 10px;
        }

        .comment-list td {
            padding-left: 20px;
            background-color: #fff3e0;
            margin-top: 5px;
        }

        .status-update {
            display: flex;
            gap: 10px;
        }

        .status-update select, .status-update button {
            padding: 5px 10px;
            border-radius: 5px;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .message.success {
            background-color: #4CAF50;
            color: white;
        }

        .message.error {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
<ul>
  <li><a class="active" href="/user">Home</a></li>
  <li><a href="/listuser">Todo</a></li>
  <li><a href="/">Đăng xuất</a></li>
  
</ul>
<h2>Your Todo List</h2>

<?php if (!empty($success)): ?>
    <div class="message success">
        <?= esc($success) ?>
    </div>
<?php endif; ?>

<?php if (!empty($error)): ?>
    <div class="message error">
        <?= esc($error) ?>
    </div>
<?php endif; ?>

<?php if (!empty($todos)): ?>
    <table>
        <thead>
            <tr>
                <th>Subject</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($todos as $todo): ?>
                <tr>
                    <td><?= esc($todo['subject']) ?></td>
                    <td><?= esc($todo['description']) ?></td>
                    <td><?= esc($todo['created_at']) ?></td>
                    <td><?= esc($todo['updated_at']) ?></td>
                    <td>
                        <div class="status-update">
                            <form action="/update-status/<?= esc($todo['id']) ?>" method="post">
                                <select name="status">
                                    <option value="New" <?= esc($todo['status']) == 'New' ? 'selected' : '' ?>>New</option>
                                    <option value="Inprogress" <?= esc($todo['status']) == 'Inprogress' ? 'selected' : '' ?>>In Progress</option>
                                    <option value="Done" <?= esc($todo['status']) == 'Done' ? 'selected' : '' ?>>Done</option>
                                </select>
                                <button type="submit">Update Status</button>
                            </form>
                        </div>
                    </td>
                    <td>
                        <div class="todo-buttons">
                            <a href="/commentForm/<?= esc($todo['id']) ?>" class="comment">Add Comment</a>
                            <a href="/subjectInfo/<?= esc($todo['id']) ?>">Thông tin</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p><?= esc($message) ?></p>
<?php endif; ?>

</body>
</html>
