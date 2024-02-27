<!DOCTYPE html>
<html>

<head>
    <title>แก้ไขข้อมูลครุภัณฑ์</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px;
        }

        .error {
            display: block;
            padding-top: 5px;
            font-size: 14px;
            color: red;
        }

        .vnumgf {
            color: rgb(217, 48, 37);
            padding-left: 0.25em;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h3 class="text-center mb-3">แก้ไขข้อมูล</h3>
        <form method="post" id="add_create" name="add_create" action="<?= site_url('/assets-update') ?>">
            <div class="form-group">
                <label>รหัสครุภัณฑ์ </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>
                <input type="text" name="asset_id" value="<?= $asset_obj['asset_id'] ?>">
            </div>
            <div class="form-group">
                <label>สาขาวิชา </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>
                <select name="department_id" class="form-select">
                    <option value="<?= $asset_obj['department_id'] ?>" hidden><?= $asset_obj['department_name'] ?></option>
                    <?php foreach ($department as $department) : ?>
                        <option value="<?= $department['department_id'] ?>"><?= $department['department_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>ชื่อครุภัณฑ์ </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>
                <input type="text" name="name" class="form-control" value="<?= $asset_obj['name'] ?>">
            </div>
            <div class="form-group">
                <label>ประเภท </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>

                <select name="id_type" class="form-select">
                    <option value="<?= $asset_obj['id_type'] ?>" hidden><?= $asset_obj['name_type']  ?></option>
                    <?php foreach ($type_assets as $type_assets) : ?>
                        <option value="<?= $type_assets['id_type'] ?>"><?= $type_assets['name_type'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>วิธีการที่ได้มา </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>

                <select name="method_id" class="form-select">
                    <option value="<?= $asset_obj['method_id'] ?>" hidden><?= $asset_obj['acquisition_method_name'] ?></option>
                    <?php foreach ($acquisition_method as $acquisition_method) : ?>
                        <option value="<?= $acquisition_method['method_id'] ?>"><?= $acquisition_method['acquisition_method_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>วันที่ซื้อ </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>

                <input type="date" name="purchase_date" class="form-control" value="<?= $asset_obj['purchase_date'] ?>">
            </div>
            <div class="form-group">
                <label>ราคา </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>

                <input type="number" name="purchase_price" class="form-control" value="<?= $asset_obj['purchase_price'] ?>">
            </div>
            <div class="form-group">
                <label>สถานที่ตั้ง </label>
                <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>

                <select name="id_localtion" class="form-select">
                    <option value="<?= $asset_obj['id_localtion'] ?>" hidden><?= $asset_obj['name_location'] ?></option>
                    <?php foreach ($location as $location) : ?>
                        <option value="<?= $location['id_location'] ?>"><?= $location['name_location'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>สถานะ</label>
                <input type="text" name="status" class="form-control" value="<?= $asset_obj['status'] ?>">
            </div>
            <div class="form-group">
                <label>อายุการใช้งาน</label>
                <input type="number" name="UsageLife" class="form-control" value="<?= $asset_obj['UsageLife'] ?>">
            </div>
            <div class="form-group">
                <label>อัตราค่าเสื่อมราคา</label>
                <input type="number" name="DepreciationRate" class="form-control" value="<?= $asset_obj['DepreciationRate'] ?>">
            </div>
            <div class="form-group">
                <label>ประเภทเงิน</label>
                <select name="currency_id" class="form-select">
                    <option value="<?= $asset_obj['currency_id'] ?>" hidden><?= $asset_obj['currency_name'] ?></option>
                    <?php foreach ($currency_types as $currency_types) : ?>
                        <option value="<?= $currency_types['currency_id'] ?>"><?= $currency_types['currency_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค *</label>
                <select name="supplier_id">
                    <option value="<?= $asset_obj['supplier_id'] ?>" hidden><?= $asset_obj['contact_person'] ?></option>
                    <?php foreach ($supplier as $s) : ?>
                        <option value="<?= $s['supplier_id'] ?>"><?= $s['contact_person'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary btn-block" name="submit">ยืนยัน</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script>
        if ($("#add_create").length > 0) {
            $("#add_create").validate({
                rules: {
                    asset_id: {
                        required: true,
                        // ต้องมีความยาวอย่างน้อย 5 ตัว
                        minlength: 5,
                    },
                    department_id: {
                        required: true,
                        //    เปลี่ยนตัวเลข
                        number: true,
                    },
                    name: {
                        required: true,
                        //    เปลี่ยนตัวเลข
                    },
                },
                messages: {
                    asset_id: {
                        required: "ยังไม่กรอกข้อมูล",
                        minlength: "กรอกข้อมูลต้องมีความยาวอย่างน้อย 5 ตัวอักษร",
                    },
                    department_id: {
                        required: "ยังไม่กรอกข้อมูล",
                        number: "กรอกข้อมูลต้องเป็นตัวเลข",
                    },
                    name: {
                        required: "ยังไม่กรอกข้อมูล",
                    },


                },
            })
        }
    </script>
</body>

</html>