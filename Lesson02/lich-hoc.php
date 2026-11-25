<?php 

declare(strict_types=1);

$tieuDe = 'Lịch học lớp PLFD-K07';
$trangHienTai = 'lich-hoc.php';
require_once __DIR__ . '/includes/header.php';

const SO_BUOI = 12;
const TEN_THU = [1 => 'Thứ Hai', 2 => 'Thứ Ba', 3 => 'Thứ Tư', 4 => 'Thứ Năm', 5 => 'Thứ Sáu', 6 => 'Thứ Bảy', 7 => 'Chủ Nhật'];

$ngayKhaiGiang = new DateTimeImmutable('2026-12-02');
$thuHoc = [1, 3, 5]; // Thứ Hai, Thứ Tư, Thứ Sáu
$lich = [];
$ngay = $ngayKhaiGiang;
while (count($lich) < SO_BUOI) {
    if (in_array((int) $ngay ->format('N'), $thuHoc, true)){
        $lich[] = $ngay;
    }
    $ngay = $ngay->modify('+1 day');
}
$ngayKetThuc = $lich[SO_BUOI - 1];
?>
<section class="card">
    <h2> Lịch <?= SO_BUOI  ?> buổi đầu tiên </h2>
    <p> Khai giảng <?= $ngayKhaiGiang->format('d/m/Y') ?> </p>
    <p> Kết thúc <?= $ngayKetThuc->format('d/m/Y') ?> </p>
    <table class = "bang">
        <tr><th>Buổi</th><th>Thứ</th><th>Ngày</th><th>Ghi chú</th></tr>
        <?php foreach ($lich as $i => $buoi): ?>
            <?php
            $soBuoi = $i + 1;
            $ghiChu = match (true) {
                $soBuoi === 1 => 'Khai giảng',
                $soBuoi === SO_BUOI => 'Buổi cuối của đợt học',
                $soBuoi %4 === 0 => 'Kiểm tra định kỳ',
                default => '',
            };
            ?>
            <tr>
                <td class = "so"><?= $soBuoi ?></td>
                <td><?= TEN_THU[(int) $buoi->format('N')] ?></td>
                <td><?= $buoi->format('d/m/Y') ?></td>
                <td><?= $ghiChu ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</section>
<?php require_once __DIR__ . '/includes/footer.php'; ?>