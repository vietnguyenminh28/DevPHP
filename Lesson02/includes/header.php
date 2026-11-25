<?php

declare(strict_types=1);

// Đầu trang dùng chung. Trang gọi phải khai báo trước: $tieuDe (string) và $trangHienTai (string)
require_once __DIR__ . '/ham.php';

$tieuDe ??= 'Trang chủ';
$trangHienTai ??= '';
$menu = [
    'index.php' => 'Trang chủ',
    'khoa-hoc.php' => 'Khóa học',
    'hoc-vien.php' => 'Học viên',
    'bang-diem.php' => 'Bảng điểm',
    'lich-hoc.php' => 'Lịch học',
];
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($tieuDe) ?> - <?= TEN_TRUNG_TAM ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="site">
        <h1><?= TEN_TRUNG_TAM ?></h1>
        <p><?= h($tieuDe) ?></p>
    </header>
    <nav class="menu">
        <?php foreach ($menu as $file => $ten): ?>
            <a href="<?= $file ?>"<?= $file === $trangHienTai ? ' class="active"' : '' ?>><?= $ten ?></a>
        <?php endforeach; ?>
    </nav>
    <main>