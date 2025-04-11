<?php
// Require composer autoload

// เพิ่ม Font ให้กับ mPDF
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/tmp',
    'format' => 'A4-L',
    'fontdata' => $fontData + [
        'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => "THSarabunNew BoldItalic.ttf",
        ]
    ],
]);

ob_start(); // Start get HTML code
?>


<!DOCTYPE html>
<html>

<head>
    <title>ครุภัณฑ์
        <?= $asset['department_name'] ?>
    </title>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: sarabun;
        }

        p {
            margin-top: 0;
            margin-bottom: auto;
            font-size: 12pt;
        }

        table tr {
            width: 100%;

            border: 1px solid;
        }
    </style>
</head>

<body>

    <!-- ทะเบียนคุมทรัพย์สินขอเป็นตัวหนา -->



    <h2 class="text-center " style=" font-size: 20pt; font-weight: bold; ">ทะเบียนคุมทรัพย์สิน</h2>
    <p class="text-start ">รายการที่..... </p>
    <p>ประเภท...
        <?= $asset['name_type'] . "\t" ?>
        รหัส...
        <?= $asset['asset_id'] ?>...........
    </p>
    <p>สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ...
        <?= $asset['name_location'] . " (" . $asset['department_name'] . ")\t" ?>..ชื่อผู้ขาย/ผู้รับบริจาค
        <?= $asset['contact_person'] ?>
    </p>
    <p>ที่อยู่
        <?= $asset['address'] . "\t" ?>โทรศัพท์
        <?= $asset['phone_number'] ?>
    </p>
    <p>ประเภทเงิน :
        <?= $asset['currency_name'] ?>
    </p>
    <p>วิธีการที่ได้รับ :
        <?= $asset['acquisition_method_name'] ?>
    </p>

    <table class="table table-bordered mt-1  " style="font-size: 16pt;">
        <tr>
            <th class="text-center" style="border:1px solid #00000;" width="10%"> วัน/เดือน/ปี</th>
            <th class="text-center" style="border:1px solid #00000;" width="3%">เอกสารที่</th>
            <th class="text-center" style="border:1px solid #00000;" width="25%">รายการ</th>
            <th class="text-center" style="border:1px solid #00000;" width="10%">มูลค่ารวม</th>
            <th class="text-center" style="border:1px solid #00000;" width="5%">อายุใช้งาน</th>
            <th class="text-center" style="border:1px solid #00000;" width="5%">อัตราค่าเสื่อมราคา (%)</th>
            <th class="text-center" style="border:1px solid #00000;" width="10%">ค่าเสื่อมประจำปี</th>
            <th class="text-center" style="border:1px solid #00000;" width="10%">ค่าเสื่อมสะสม</th>
            <th class="text-center" style="border:1px solid #00000;" width="10%">มูลค่าสุทธิ</th>
        </tr>
        <tr>
            <td class="text-center" style="border:1px solid #00000;">
                <?= thaidate('j M Y', $asset['purchase_date']); ?>
            </td>
            <td class="text-center" style="border:1px solid #00000;">1</td>
            <td style="border:1px solid #00000;">
                <?= $asset['name'] ?>
            </td>
            <td style="border:1px solid #00000;" class="text-end">
                <?= number_format($asset['purchase_price'], 2)
                    ?>
            </td>
            <td style="border:1px solid #00000;">
            </td>
            <td style="border:1px solid #00000;"></td>
            <td style="border:1px solid #00000;"></td>
            <td style="border:1px solid #00000;"></td>
            <td style="border:1px solid #00000;"> </td>
        </tr>
        <?php
        if (($asset['UsageLife'] != 0 && $asset['purchase_price'] != 0)):
            ?>
            <?php  // คำนวณจำนวนวันที่ใช้งานในปีนี้
            
                for ($year = 1; $year <= $usefulLife + 1; $year++):
                    // คำนวณจำนวนวันที่ใช้งานในปีนี้
            
                    ?>
                <tr>
                    <td style="border:1px solid #00000;" class="text-center">
                        <!-- เพิ่มปีทีละ 1 -->
                        <?= thaidate('j M ', $startDate); ?>
                        <?= thaidate('Y', $startDate) + $year; ?>
                    </td>
                    <td style="border:1px solid #00000;"></td>
                    <td style="border:1px solid #00000;"></td>
                    <td style="border:1px solid #00000;" class="text-end">
                        <?= number_format($asset['purchase_price'], 2) ?>
                    </td>
                    <td style="border:1px solid #00000;" class="text-end">
                        <?= $asset['UsageLife'] ?>
                    </td>
                    <td style="border:1px solid #00000;" class="text-end">
                        <?= $asset['DepreciationRate'] ?>
                    </td>



                    <td style="border:1px solid #00000;" class="text-end">
                        <?php if ($year == 1): ?>
                            <?= number_format(($annualDepreciation)) ?>
                        <?php elseif ($year == $usefulLife + 1): ?>
                            <?= number_format(($annualDepreciation1)) ?>
                        <?php else: ?>
                            <?= number_format(($nextYearDepreciation)) ?>
                        <?php endif; ?>
                    </td>
                    <td style="border:1px solid #00000;" class="text-end">
                        <?php if ($year == 1): ?>
                            <?= number_format(($annualDepreciation)) ?>
                        <?php elseif ($year == $usefulLife + 1): ?>
                            <?= number_format(($annualDepreciation1 + $nextYearDepreciation + $annualDepreciation * ($year - 1)) - 1) ?>
                        <?php else: ?>
                            <?= number_format($nextYearDepreciation + $annualDepreciation * ($year - 1)) ?>
                        <?php endif; ?>
                    </td>
                    <td style="border:1px solid #00000;" class="text-end">
                        <?php if ($year == 1): ?>
                            <?= number_format(($asset['purchase_price'] - $annualDepreciation)) ?>
                        <?php elseif ($year == $usefulLife + 1): ?>
                            <?= number_format((1)) ?>
                        <?php else: ?>
                            <?= number_format($asset['purchase_price'] - ($nextYearDepreciation + $annualDepreciation * ($year - 1))) ?>
                        <?php endif; ?>

                    </td>
                </tr>
            <?php endfor ?>
        <?php endif; ?>

    </table>






</body>

</html>

<?php
$html = ob_get_contents();
$mpdf->WriteHTML($html);
ob_end_clean(); // ปิดการใช้งาน buffer
$mpdf->Output("MyPDF.pdf", "I");
exit;
?>