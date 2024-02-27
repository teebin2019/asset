<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DepreciationController extends Controller
{
    public function index()
    {
        // ข้อมูลที่ใช้ในการคำนวณ
        $cost = 100000;         // ราคาทรัพย์สิน
        $salvageValue = 20000;  // มูลค่าคงเหลือ
        $usefulLife = 5;        // อายุการใช้งาน

        $startDate = "2021-03-4";
        $endDate = "2021-09-30";
        $startYear = 2021;

        // คำนวณเวลาในปี
        $years = date_diff(date_create($startDate), date_create($endDate))->y;
        $months = date_diff(date_create($startDate), date_create($endDate))->m;

        // print_r($months);
        // echo "ปี: {$years} เดือน: {$months}";
        // die();

        // คำนวณค่าเสื่อมราคาต่อปี
        $annualDepreciation = (($cost - $salvageValue) / $usefulLife) * $months / 12;
        // คำนวณค่าเสื่อมปีถัดไป
        $nextYearDepreciation = (($cost - $salvageValue) / $usefulLife);
        $annualDepreciation = (($cost - $salvageValue) / $usefulLife) * $months / 12;

        // ข้อมูลวันที่เริ่มต้น
        $startYear = 2023;
        $startDate = "{$startYear}-09-30"; // 30 กันยายน

        // ส่งข้อมูลไปยัง View
        $data = [
            'cost' => $cost,
            'salvageValue' => $salvageValue,
            'usefulLife' => $usefulLife,
            'annualDepreciation' => $annualDepreciation,
            'startDate' => $startDate,
            'nextYearDepreciation' => $nextYearDepreciation,
        ];

        return view('depreciation_view', $data);
    }
}
