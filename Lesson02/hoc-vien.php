<?php

declare(strict_types=1);

// ===== Phiếu thông tin học viên: dùng hàm trong includes/ham.php =====

$tieuDe = 'Phiếu thông tin học viên';
$trangHienTai = 'hoc-vien.php';
require_once __DIR__ . '/includes/header.php';

$soThuTu = 42;
$hoTen = 'Nguyễn Văn <An>';
$namSinh = 2006;
$email = null;
$diemThucHanh = 78;
$diemQuaTrinh = 85.5;
$daDongHocPhi = true;

$maHocVien = taoMaHocVien($soThuTu);
$tuoi = tinhTuoi($namSinh);
$tongDiem = tinhTongKet($diemThucHanh, $diemQuaTrinh);
$hocLuc = xepLoai($tongDiem);

$dat = $tongDiem >= DIEM_DAT;
$duDieuKienCapChungNhan = $dat && $daDongHocPhi;

$ketQua = $dat ? 'Đạt' : 'Chưa đạt';
$lopNhan = $dat ? 'nhan-dat' : 'nhan-chua-dat';
$emailHienThi = $email ?? 'Chưa cập nhật';
?>
        <section class="card">
            <h2><?= h($maHocVien) ?> - <?= h($hoTen) ?></h2>
            <table class="info">
                <tr><th>Năm sinh</th><td><?= $namSinh ?> (<?= $tuoi ?> tuổi)</td></tr>
                <tr><th>Email</th><td><?= h($emailHienThi) ?></td></tr>
                <tr><th>Điểm thực hành</th><td><?= $diemThucHanh ?></td></tr>
                <tr><th>Điểm quá trình</th><td><?= $diemQuaTrinh ?></td></tr>
                <tr><th>Tổng điểm</th><td><?= dinhDangSo($tongDiem) ?></td></tr>
                <tr><th>Xếp loại</th><td><?= h($hocLuc) ?></td></tr>
                <tr><th>Kết quả</th><td><span class="nhan <?= $lopNhan ?>"><?= h($ketQua) ?></span></td></tr>
                <tr><th>Học phí</th><td><?= $daDongHocPhi ? 'Đã đóng' : 'Chưa đóng' ?></td></tr>
                <tr><th>Cấp chứng nhận</th><td><?= $duDieuKienCapChungNhan ? 'Đủ điều kiện' : 'Chưa đủ điều kiện' ?></td></tr>
            </table>
        </section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>