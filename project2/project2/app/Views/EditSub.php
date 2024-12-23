<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Môn Học</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        form {
            margin-top: 20px;
        }
        input, button {
            padding: 5px;
            margin: 5px;
        }
        .error {
            color: red;
        }
        .success {
            color: green;
        }
    </style>
</head>
<body>

    <br><a href='/list'>Quay lại</a>
    
    <h2>Chỉnh Sửa Môn Học</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error"><?= session()->getFlashdata('error'); ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <form method="POST" action="/editSub/<?= isset($subject['id']) ? $subject['id'] : ''; ?>">
    <table>
            <tr>
                <td><label for="subject">Tên Môn Học:</label></td>
                <td>
                    <input type="text" name="subject" id="subject" value="<?= old('subject', $subject['subject']); ?>" required>
                    <?php if (isset($validation) && $validation->getError('subject')): ?>
                        <div class="error"><?= $validation->getError('subject'); ?></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><label for="description">Mô Tả:</label></td>
                <td>
                    <input type="text" name="description" id="description" value="<?= old('description', $subject['description']); ?>" required>
                    <?php if (isset($validation) && $validation->getError('description')): ?>
                        <div class="error"><?= $validation->getError('description'); ?></div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td><label for="updated_at">Ngày Cập Nhật:</label></td>
                <td><input type="datetime-local" name="updated_at" id="updated_at" value="<?= old('updated_at', $subject['updated_at']); ?>" required></td>
            </tr>
        </table>
        <button type="submit">Cập Nhật</button>
    </form>

</body>
</html>
