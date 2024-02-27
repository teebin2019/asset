<?php
// Require composer autoload

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([


    'tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' =>  'THSarabunNew Bold.ttf',
            'BI' => "THSarabunNew BoldItalic.ttf",
        ]
    ],
]);

ob_start(); // Start get HTML code
ini_set("pcre.backtrack_limit", "5000000");
?>


<!DOCTYPE html>
<html>

<head>
    <title>PDF</title>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: sarabun;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            padding: 8px;
            text-size-adjust: 50px;
        }

        /* ปรับขนาดตัวอักษรตอนprintpdfแล้ว */
        @media print {
            body * {
                visibility: hidden;

            }
            /* ขนาดตัวอักษร 16 px ตอนprintpdf */

            .table-pdf, .table-pdf * {
                visibility: visible;    
                font-size: 16px !important;     
            }
        }


        .table {
            border-collapse: collapse;
            width: 100%;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

</head>

<body>

    <!-- ปิดปุ่มคลิกที่นี้ -->

    <!-- เมื่อ print pdf ให้ทำปุ่มออก -->


    <h1 style="text-align: center">ครุภัณฑ์</h1>
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th style="text-align: center">รหัส</th>
                <th style="text-align: center">ชื่อ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asset as $as) : ?>
                <tr>
                    <td><?= $as['asset_id'] ?></td>
                    <td><?= $as['name'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            // แสดงเป็นภาษาไทย   
            $('#myTable').DataTable({
                "language": {
                    "lengthMenu": "แสดง _MENU_ รายการ",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
                    "infoEmpty": "แสดง 0 ถึง 0 จาก 0 รายการ",
                    "infoFiltered": "(กรองข้อมูล _MAX_ ทุกรายการ)",
                    "search": "ค้นหา:",
                    "paginate": {
                        "first": "หน้าแรก",
                        "last": "หน้าสุดท้าย",
                        "next": "หน้าต่อไป",
                        "previous": "หน้าก่อน"
                    },
                }

            });
        });
    </script>

</body>




</html>

<?php
$html = ob_get_contents();
// ปิดปุ่ม คลิกที่นี้

$mpdf->WriteHTML($html);
$mpdf->Output("MyPDF.pdf");

ob_end_flush()
?>

ดาวโหลดรายงานในรูปแบบ PDF <a href="<?= base_url('MyPDF.pdf') ?>" target="_blank">คลิกที่นี้</a>