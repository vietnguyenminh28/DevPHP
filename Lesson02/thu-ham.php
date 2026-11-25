<?php

declare(strict_types=1);

require_once __DIR__ . '/includes/ham.php';

echo dinhDangTien(12_500_000), "<br>";
echo taoMaHocVien(42), "<br>";
echo tinhTongPhaiDong(12_500_000, true), "<br>";
echo tinhTongPhaiDong(12_500_000, false), "<br>";
echo xepLoai(81.75), "<br>";
echo dinhDangSo(81.75), "<br>";