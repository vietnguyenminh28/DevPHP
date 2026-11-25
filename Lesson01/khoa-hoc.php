<?php

declare(strict_types=1);

const TEN_TRUNG_TAM = 'Trung tâm đào tạo DevMaster';
const TY_LE_GIAM_DANG_KY_SOM = 0.10;
const PHI_TAI_LIEU = 200_000;

// Dữ liệu khóa học (ở bài CB05 sẽ lấy từ cơ sở dữ liệu)
$maKhoaHoc = 'PLFD';
$tenKhoaHoc = 'PHP Laravel Web FullStack Developer';
$soGio = 376;
$soGioMoiBuoi = 3;
$hocPhiGoc = 12_500_000;
$dangKySom = true;

// Tính toán
$soBuoi = intdiv($soGio, $soGioMoiBuoi);           // số buổi học trọn vẹn
$soGioLe = $soGio % $soGioMoiBuoi;                 // số giờ lẻ còn lại
$tienGiam = $dangKySom ? $hocPhiGoc * TY_LE_GIAM_DANG_KY_SOM : 0;
$hocPhiSauGiam = $hocPhiGoc - $tienGiam;
$tongPhaiDong = $hocPhiSauGiam + PHI_TAI_LIEU;
$hocPhiMoiGio = $tongPhaiDong / $soGio;
// Định dạng để hiển thị
$hocPhiGocHienThi = number_format($hocPhiGoc, 0, ',', '.');
$tienGiamHienThi = number_format($tienGiam, 0, ',', '.');
$tongPhaiDongHienThi = number_format($tongPhaiDong, 0, ',', '.');
$hocPhiMoiGioHienThi = number_format($hocPhiMoiGio, 0, ',', '.');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khóa học - <?= TEN_TRUNG_TAM ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="site">
        <h1><?= TEN_TRUNG_TAM ?></h1>
        <p>Thông tin khóa học</p>
    </header>
    <nav class="menu">
        <a href="index.php">Trang chủ</a>
        <a href="khoa-hoc.php">Khóa học</a>
        <a href="hoc-vien.php">Học viên</a>
    </nav>
    <main>
        <section class="card">
            <h2>[<?= $maKhoaHoc ?>] <?= $tenKhoaHoc ?></h2>
            <table class="info">
                <tr>
                    <th>Thời lượng</th>
                    <td><?= $soGio ?> giờ (<?= $soBuoi ?> buổi, dư <?= $soGioLe ?> giờ)</td>
                </tr>
                <tr>
                    <th>Học phí gốc</th>
                    <td><span class="gia-goc"><?= $hocPhiGocHienThi ?> đ</span></td>
                </tr>
                <tr>
                    <th>Giảm giá đăng ký sớm</th>
                    <td>- <?= $tienGiamHienThi ?> đ (<?= TY_LE_GIAM_DANG_KY_SOM * 100 ?>%)</td>
                </tr>
                <tr>
                    <th>Phí tài liệu</th>
                    <td><?= number_format(PHI_TAI_LIEU, 0, ',', '.') ?> đ</td>
                </tr>
                <tr>
                    <th>Tổng phải đóng</th>
                    <td><span class="gia-ban"><?= $tongPhaiDongHienThi ?> đ</span></td>
                </tr>
                <tr>
                    <th>Bình quân mỗi giờ học</th>
                    <td><?= $hocPhiMoiGioHienThi ?> đ</td>
                </tr>
            </table>
        </section>
    </main>
    <footer class="site">&copy; <?= date('Y') ?> <?= TEN_TRUNG_TAM ?></footer>
</body>

</html>