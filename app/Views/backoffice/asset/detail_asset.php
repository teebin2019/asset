<?php $session = session(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <title>รายละเอียด</title>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-danger text-light">
                รายละเอียด
            </div>
            <div class="card-body">
                <!-- Trying to access array offset on value of type null -->
                <label for="">รหัส :
                    <?= $asset['asset_id'] ?>
                </label><br>
                <label for="">ชื่อ :
                    <?= $asset['name'] ?>
                </label><br>
                <label for="">วันที่ :
                    <?php $data = thaidate('j F Y', $asset['purchase_date']);

                    echo $data;
                    ?>

                </label><br>
                <label for="">ราคาทุน :
                    <?= $asset['purchase_price'] ?>
                </label><br>
                <label for="">อายุการใช้งาน :
                    <?= $asset['UsageLife'] ?>
                </label><br>
                <label for="">อัตราค่าเสื่อมราคา :
                    <?= $asset['DepreciationRate'] ?>
                </label><br>
                <label for="">ประเภทเงิน :
                    <?= $asset['currency_name'] ?>
                </label><br>
                <label for="">ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค :
                    <?= $asset['contact_person'] ?>
                </label><br>
                <label for="">โทรศัพท์ :
                    <?= $asset['phone_number'] ?>
                </label><br>
                <label for="">ที่อยู่ :
                    <?= $asset['address'] ?>
                </label><br>
                <label for="">สาขาวิชา :
                    <?= $asset['department_name'] ?>
                </label><br>
                <label for="">วิธีการที่ได้มา :
                    <?= $asset['acquisition_method_name'] ?>
                </label><br>
                <label for="">ประเภท :
                    <?= $asset['name_type'] ?>
                </label><br>
                <label for="">สถานที่ตั้ง/หน่วยงานที่รับผิดชอบ :
                    <?= $asset['name_location'] ?>
                </label><br>
            </div>
        </div>

        <?php $role = $session->get('role');
        if ($role == 0) { ?>
            <div class="text-start mt-2">
                <a href="<?= site_url('/asset-list') ?>"> <button class="btn btn-primary">ย้อนกลับ</button></a>
            </div>
        <?php } elseif ($role == 1 or !$role) { ?>
            <div class="text-start mt-2">
                <a href="<?= site_url('/search') ?>"> <button class="btn btn-primary">ย้อนกลับ</button></a>
            </div>
        <?php } ?>

</body>

</html>