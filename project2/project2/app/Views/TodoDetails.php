<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Công việc</title>
</head>
<body>
    <h1>Chi tiết Công việc</h1>

    <?php if (!empty($todoInfo)): ?>
        <p><strong>ID:</strong> <?= esc($todoInfo['id']) ?></p>
        <p><strong>Tên Công việc:</strong> <?= esc($todoInfo['subject']) ?></p>
        <p><strong>Mô tả:</strong> <?= esc($todoInfo['description']) ?></p>
    <?php else: ?>
        <p>Không tìm thấy thông tin công việc.</p>
    <?php endif; ?>

    <h2>Danh sách Bình luận</h2>
    <?php if (!empty($comments)): ?>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bình luận</th>
                    <th>Username</th>
                    <th>Chức</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?= esc($comment['id']) ?></td>
                        <td><?= esc($comment['comment']) ?></td>
                        <td><?= esc($comment['username']) ?></td>
                        <td><?= esc($comment['type']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Không có bình luận nào được tìm thấy.</p>
    <?php endif; ?>


</body>
</html>
