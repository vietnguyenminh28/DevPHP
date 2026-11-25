<?php

declare(strict_types=1);

// ===== Trang chủ: số liệu tổng quan của trung tâm =====

$tieuDe = 'Trang chủ';
$trangHienTai = 'index.php';
require_once __DIR__ . '/includes/header.php';

$soHocVien = 1850;
$soKhoaHoc = 12;
$dangTuyenSinh = true;

$soNamHoatDong = (int) date('Y') - NAM_THANH_LAP;
$trungBinhMoiKhoa = intdiv($soHocVien, $soKhoaHoc);
$tyLeCoViecLam = 92.5;
?>
        <section class="card">
            <h2>Giới thiệu trung tâm</h2>
            <table class="info">
                <tr><th>Năm thành lập</th><td><?= NAM_THANH_LAP ?> (<?= $soNamHoatDong ?> năm hoạt động)</td></tr>
                <tr><th>Tổng số học viên</th><td><?= dinhDangSo($soHocVien, 0) ?></td></tr>
                <tr><th>Trung bình mỗi khóa</th><td><?= $trungBinhMoiKhoa ?> học viên</td></tr>
                <tr><th>Tỷ lệ có việc làm</th><td><?= dinhDangSo($tyLeCoViecLam, 1) ?>%</td></tr>
                <tr><th>Trạng thái</th><td><?= $dangTuyenSinh ? 'Đang tuyển sinh' : 'Tạm ngừng tuyển sinh' ?></td></tr>
            </table>
        </section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>