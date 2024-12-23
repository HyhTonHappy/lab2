<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bình luận</title>
    <style>
        .success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<?php if (session()->getFlashdata('status')): ?>
    <div class="<?= esc(session()->getFlashdata('status')) ?>">
        <?= esc(session()->getFlashdata('message')) ?>
    </div>
<?php endif; ?>


    <h1>Thêm Bình luận</h1>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="error">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <form action="/addComment" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="subjectID" value="<?= esc($subjectID) ?>">

        <label for="comment">Bình luận:</label>
        <textarea id="comment" name="comment" required></textarea>
        <br>

        <button type="submit">Gửi</button>
        <a href="/list"><button type="button">Hủy</button></a>
    </form>
</body>
</html>
