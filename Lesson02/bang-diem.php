<?php

declare(strict_types=1);

// ===== Lab 3: Bảng điểm lớp học bằng vòng lặp foreach =====

$tieuDe = 'Bảng điểm lớp PLFD-K07';
$trangHienTai = 'bang-diem.php';
require_once __DIR__ . '/includes/header.php';

// Dữ liệu mẫu: mỗi học viên là một mảng (mảng sẽ học kỹ ở bài CB03)
$danhSach = [
    ['stt' => 1, 'ten' => 'Nguyễn Văn An', 'thucHanh' => 78, 'quaTrinh' => 85.5],
    ['stt' => 2, 'ten' => 'Trần Thị Bình', 'thucHanh' => 90, 'quaTrinh' => 88],
    ['stt' => 3, 'ten' => 'Lê Hoàng Cường', 'thucHanh' => 55, 'quaTrinh' => 62],
    ['stt' => 4, 'ten' => 'Phạm Minh Dũng', 'thucHanh' => 70, 'quaTrinh' => 70],
    ['stt' => 5, 'ten' => 'Võ Thu Hà', 'thucHanh' => 62, 'quaTrinh' => 66],
    ['stt' => 6, 'ten' => 'Đặng Quốc Huy', 'thucHanh' => 45, 'quaTrinh' => 50],
];

$soDat = 0;
$tongDiemCaLop =0.0;
$diemCaoNhat = -1.0;
$tenCaoNhat = '';
$soHocVien = 0;
foreach ($danhSach as $hv) {
    $tongDiem = tinhTongKet($hv['thucHanh'], $hv['quaTrinh']);
    $soHocVien++;
    $tongDiemCaLop += $tongDiem;
    if ($tongDiem >= DIEM_DAT) {
        $soDat++;
    }
    if ($tongDiem > $diemCaoNhat) {
        $diemCaoNhat = $tongDiem;
        $tenCaoNhat = $hv['ten'];
    }
}
$diemTrungBinh = $tongDiemCaLop / $soHocVien;
?>

<section class="card">
            <h2>Kết quả học tập</h2>
            <table class="bang">
                <tr><th>Mã HV</th><th>Họ tên</th><th>Thực hành</th><th>Quá trình</th><th>Tổng kết</th><th>Xếp loại</th></tr>
                <?php foreach ($danhSach as $hv): ?>
                    <?php $tongKet = tinhTongKet($hv['thucHanh'], $hv['quaTrinh']); ?>
                    <tr>
                        <td><?= taoMaHocVien($hv['stt']) ?></td>
                        <td><?= h($hv['ten']) ?></td>
                        <td class="so"><?= dinhDangSo($hv['thucHanh'], 1) ?></td>
                        <td class="so"><?= dinhDangSo($hv['quaTrinh'], 1) ?></td>
                        <td class="so"><?= dinhDangSo($tongKet) ?></td>
                        <td><span class="nhan <?= $tongKet >= DIEM_DAT ? 'nhan-dat' : 'nhan-chua-dat' ?>"><?= xepLoai($tongKet) ?></span></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
        <section class="card">
            <h2>Thống kê</h2>
            <table class="info">
                <tr><th>Số học viên đạt</th><td><?= $soDat ?> / <?= $soHocVien ?></td></tr>
                <tr><th>Điểm trung bình lớp</th><td><?= dinhDangSo($diemTrungBinh) ?></td></tr>
                <tr><th>Điểm cao nhất</th><td><?= dinhDangSo($diemCaoNhat) ?> (<?= h($tenCaoNhat) ?>)</td></tr>
            </table>
        </section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>