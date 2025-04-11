<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class DepreciationController extends Controller
{
    public function index()
    {
        // ข้อมูลที่ใช้ในการคำนวณ
        $cost = 17895000;         // ราคาทรัพย์สิน
        $usefulLife = 5;        // อายุการใช้งาน

        $startDate = "2020-12-21";
        $yearsstartDate = date('Y', strtotime($startDate));
        $monthsstartDate = date('m', strtotime($startDate));
        $daystartDate = date('d', strtotime($startDate));
        if ($monthsstartDate > 9) {
            $yearsstartDate = date('Y', strtotime($startDate))+1;
            $endDate = "{$yearsstartDate}-09-30";
        }else{
            $yearsstartDate = date("Y", strtotime($startDate));
            $endDate = "{$yearsstartDate}-09-30";
        }
      


        // คำนวณเวลาในปี
        $day = date_diff(date_create($startDate), date_create($endDate))->days;
        $months = $day / 30;
        $months = number_format($months);
        // print_r($months);
        // echo "ปี: {$years} เดือน: {$months}";
        // die();

        // คำนวณค่าเสื่อมราคาต่อปี
        $annualDepreciation = ($cost / $usefulLife) * $months / 12;
        // คำนวณค่าเสื่อมปีถัดไป
        $nextYearDepreciation = ($cost / $usefulLife);
        $annualDepreciation1 = ($cost / $usefulLife) * (12 - $months) / 12;


        // ข้อมูลวันที่เริ่มต้น
        $startYear = date('Y', strtotime($startDate));
        $startDate = "{$startYear}-09-30"; // 30 กันยายน

        // ส่งข้อมูลไปยัง View
        $data = [
            'cost' => $cost,
            'usefulLife' => $usefulLife,
            'annualDepreciation' => $annualDepreciation,
            'annualDepreciation1' => $annualDepreciation1,
            'startDate' => $startDate,
            'nextYearDepreciation' => $nextYearDepreciation,
        ];

        return view('depreciation_view', $data);
    }
}
