<?php

declare(strict_types=1);

// ===== Các hằng số dùng chung của dự án =====
const TEN_TRUNG_TAM = 'Trung tâm đào tạo DevMaster';
const KHAU_HIEU = 'Learn To Work - Học để làm được việc';
const NAM_THANH_LAP = 2015;
const DIA_CHI = 'Hà Nội, Việt Nam';

const TY_LE_GIAM_DANG_KY_SOM = 0.10;
const PHI_TAI_LIEU = 200_000;

const DIEM_DAT = 60;
const TY_TRONG_THUC_HANH = 0.5;
const TY_TRONG_QUA_TRINH = 0.5;

/** Thoát ký tự đặc biệt để hiển thị an toàn ra HTML. */
function h(?string $giaTri): string
{
    return htmlspecialchars($giaTri ?? '', ENT_QUOTES, 'UTF-8');
}

/** Định dạng số tiền kiểu Việt Nam: 12500000 -> "12.500.000 đ". */
function dinhDangTien(int|float $soTien): string
{
    return number_format($soTien, 0, ',', '.') . ' đ';
}

/** Mã học viên từ số thứ tự: 42 -> "HV00042". */
function taoMaHocVien(int $soThuTu): string
{
    return sprintf('HV%05d', $soThuTu);
}

/** Tuổi tính theo năm hiện tại. */
function tinhTuoi(int $namSinh): int
{
    return (int) date('Y') - $namSinh;
}

/** Tiền được giảm khi đăng ký sớm. */
function tinhTienGiam(int $hocPhiGoc, bool $dangKySom): int
{
    return $dangKySom ? (int) round($hocPhiGoc * TY_LE_GIAM_DANG_KY_SOM) : 0;
}

/** Tổng học viên phải đóng = học phí gốc - giảm giá + phí tài liệu. */
function tinhTongPhaiDong(int $hocPhiGoc, bool $dangKySom): int
{
    return $hocPhiGoc - tinhTienGiam($hocPhiGoc, $dangKySom) + PHI_TAI_LIEU;
}

/** Điểm tổng kết thang 100 từ điểm thực hành và điểm quá trình. */
function tinhTongKet(float $diemThucHanh, float $diemQuaTrinh): float
{
    return $diemThucHanh * TY_TRONG_THUC_HANH + $diemQuaTrinh * TY_TRONG_QUA_TRINH;
}

/** Xếp loại học lực theo điểm tổng kết. */
function xepLoai(float $diem): string
{
    return match (true) {
        $diem >= 85 => 'Giỏi',
        $diem >= 70 => 'Khá',
        $diem >= DIEM_DAT => 'Trung bình',
        default => 'Chưa đạt',
    };
}

/** Định dạng số thập phân kiểu Việt Nam: 81.75 -> "81,75". */
function dinhDangSo(float $so, int $soLe = 2): string
{
    return number_format($so, $soLe, ',', '.');
}