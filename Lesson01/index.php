<?php

declare(strict_types=1);

// Thông tin cố định của trung tâm -> khai báo bằng hằng
const TEN_TRUNG_TAM = 'Trung tâm đào tạo DevMaster';
const KHAU_HIEU = 'Learn To Work - Học để làm được việc';
const NAM_THANH_LAP = 2015;
const DIA_CHI = 'Hà Nội, Việt Nam';

$soKhoaHoc = 12;
$soHocVien = 1850;
$tyLeCoViec = 0.925;
$dangTuyenSinh = true;

// Giá trị tính toán
$namHienTai = (int) date('Y');
$soNamHoatDong = $namHienTai - NAM_THANH_LAP;
$hocVienMoiKhoa = intdiv($soHocVien, $soKhoaHoc);
$trangThai = $dangTuyenSinh ? 'Đang tuyển sinh' : 'Tạm ngừng tuyển sinh';
?>


<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TEN_TRUNG_TAM ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="site">
        <h1><?= TEN_TRUNG_TAM ?></h1>
        <p><?= KHAU_HIEU ?></p>
    </header>
    <nav class="menu">
        <a href="index.php">Trang chủ</a>
        <a href="khoa-hoc.php">Khóa học</a>
        <a href="hoc-vien.php">Học viên</a>
    </nav>
    <main>
        <section class="card">
            <h2>Giới thiệu</h2>
            <table class="info">
                <tr>
                    <th>Địa chỉ</th>
                    <td><?= DIA_CHI ?></td>
                </tr>
                <tr>
                    <th>Năm thành lập</th>
                    <td><?= NAM_THANH_LAP ?> (<?= $soNamHoatDong ?> năm hoạt động)</td>
                </tr>
                <tr>
                    <th>Số khóa học</th>
                    <td><?= $soKhoaHoc ?></td>
                </tr>
                <tr>
                    <th>Tổng số học viên</th>
                    <td><?= number_format($soHocVien, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Trung bình mỗi khóa</th>
                    <td><?= $hocVienMoiKhoa ?> học viên</td>
                </tr>
                <tr>
                    <th>Tỷ lệ có việc làm</th>
                    <td><?= number_format($tyLeCoViec * 100, 1, ',', '.') ?>%</td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td><?= $trangThai ?></td>
                </tr>
            </table>
        </section>
    </main>
    <footer class="site">
        &copy; <?= $namHienTai ?> <?= TEN_TRUNG_TAM ?> - Trang được tạo lúc <?= date('H:i:s d/m/Y') ?>
    </footer>
</body>

</html>