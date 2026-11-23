<?php

declare(strict_types=1);

// ===== Lab 4: Phiếu thông tin và kết quả học tập của học viên =====

const TEN_TRUNG_TAM = 'Trung tâm đào tạo DevMaster';
const DIEM_DAT = 60;              // tổng điểm từ 60% trở lên là đạt
const TY_TRONG_THUC_HANH = 0.5;   // điểm thi thực hành tính 50%
const TY_TRONG_QUA_TRINH = 0.5;   // điểm quá trình tính 50%

// Dữ liệu học viên
$soThuTu = 42;
$hoTen = 'Nguyễn Văn <An>';       // cố ý có ký tự đặc biệt để thử htmlspecialchars()
$namSinh = 2006;
$email = null;                    // học viên chưa cung cấp email
$diemThucHanh = 78;               // thang 100
$diemQuaTrinh = 85.5;             // thang 100
$daDongHocPhi = true;

// Tính toán
$maHocVien = sprintf('HV%05d', $soThuTu);           // HV00042
$tuoi = (int) date('Y') - $namSinh;
$tongDiem = $diemThucHanh * TY_TRONG_THUC_HANH + $diemQuaTrinh * TY_TRONG_QUA_TRINH;
$dat = $tongDiem >= DIEM_DAT;
$duDieuKienCapChungNhan = $dat && $daDongHocPhi;

// Chuẩn bị dữ liệu hiển thị
$ketQua = $dat ? 'Đạt' : 'Chưa đạt';
$lopNhan = $dat ? 'nhan-dat' : 'nhan-chua-dat';
$emailHienThi = $email ?? 'Chưa cập nhật';
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học viên - <?= TEN_TRUNG_TAM ?></title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="site">
        <h1><?= TEN_TRUNG_TAM ?></h1>
        <p>Phiếu thông tin học viên</p>
    </header>
    <nav class="menu">
        <a href="index.php">Trang chủ</a>
        <a href="khoa-hoc.php">Khóa học</a>
        <a href="hoc-vien.php">Học viên</a>
    </nav>
    <main>
        <section class="card">
            <h2><?= $maHocVien ?> - <?= htmlspecialchars($hoTen) ?></h2>
            <table class="info">
                <tr>
                    <th>Năm sinh</th>
                    <td><?= $namSinh ?> (<?= $tuoi ?> tuổi)</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($emailHienThi) ?></td>
                </tr>
                <tr>
                    <th>Điểm thực hành</th>
                    <td><?= $diemThucHanh ?></td>
                </tr>
                <tr>
                    <th>Điểm quá trình</th>
                    <td><?= $diemQuaTrinh ?></td>
                </tr>
                <tr>
                    <th>Tổng điểm</th>
                    <td><?= number_format($tongDiem, 2, ',', '.') ?></td>
                </tr>
                <tr>
                    <th>Kết quả</th>
                    <td><span class="nhan <?= $lopNhan ?>"><?= $ketQua ?></span></td>
                </tr>
                <tr>
                    <th>Học phí</th>
                    <td><?= $daDongHocPhi ? 'Đã đóng' : 'Chưa đóng' ?></td>
                </tr>
                <tr>
                    <th>Cấp chứng nhận</th>
                    <td><?= $duDieuKienCapChungNhan ? 'Đủ điều kiện' : 'Chưa đủ điều kiện' ?></td>
                </tr>
            </table>
        </section>

    </main>
    <footer class="site">&copy; <?= date('Y') ?> <?= TEN_TRUNG_TAM ?></footer>
</body>

</html>