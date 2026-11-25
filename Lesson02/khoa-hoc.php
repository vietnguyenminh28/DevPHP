<?php

declare(strict_types=1);

// ===== Thẻ khóa học: dùng hàm trong includes/ham.php =====

$tieuDe = 'Thông tin khóa học';
$trangHienTai = 'khoa-hoc.php';
require_once __DIR__ . '/includes/header.php';

$maKhoaHoc = 'PLFD';
$tenKhoaHoc = 'PHP Laravel Web FullStack Developer';
$soGio = 376;
$soGioMoiBuoi = 3;
$hocPhiGoc = 12_500_000;
$dangKySom = true;

$soBuoi = intdiv($soGio, $soGioMoiBuoi);
$soGioLe = $soGio % $soGioMoiBuoi;
$tienGiam = tinhTienGiam($hocPhiGoc, $dangKySom);
$tongPhaiDong = tinhTongPhaiDong($hocPhiGoc, $dangKySom);
?>
        <section class="card">
            <h2>[<?= h($maKhoaHoc) ?>] <?= h($tenKhoaHoc) ?></h2>
            <table class="info">
                <tr><th>Thời lượng</th><td><?= $soGio ?> giờ (<?= $soBuoi ?> buổi, dư <?= $soGioLe ?> giờ)</td></tr>
                <tr><th>Học phí gốc</th><td><span class="gia-goc"><?= dinhDangTien($hocPhiGoc) ?></span></td></tr>
                <tr><th>Giảm giá đăng ký sớm</th><td>- <?= dinhDangTien($tienGiam) ?> (<?= TY_LE_GIAM_DANG_KY_SOM * 100 ?>%)</td></tr>
                <tr><th>Phí tài liệu</th><td><?= dinhDangTien(PHI_TAI_LIEU) ?></td></tr>
                <tr><th>Tổng phải đóng</th><td><span class="gia-ban"><?= dinhDangTien($tongPhaiDong) ?></span></td></tr>
                <tr><th>Bình quân mỗi giờ học</th><td><?= dinhDangTien($tongPhaiDong / $soGio) ?></td></tr>
            </table>
        </section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>