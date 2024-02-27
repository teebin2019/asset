<!DOCTYPE html>
<html>

<head>
    <title>เพิ่มข้อมูลครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        .error {
            display: block;
            padding-top: 5px;
            font-size: 14px;
            color: red;
        }

        .date-selector {
            position: relative;
        }

        .date-selector>input[type=date] {
            text-indent: -500px;
        }

        .vnumgf {
            color: rgb(217, 48, 37);
            padding-left: 0.25em;
        }
    </style>
</head>

<body>
    <div class="container mt-3">
        <h3 class="text-center mb-3">เพิ่มข้อมูลครุภัณฑ์</h3>
        <form method="post" id="add_create" name="add_create" action="<?= site_url('/asset_submit') ?>">
            <div class="row mb-3">
                <div class="col">
                    <label>รหัสครุภัณฑ์ </label>
                    <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span>
                    <input type="text" name="asset_id" class="form-control">
                </div>
                <div class="col">
                    <label>สาขาวิชา <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span> </label>
                    <select name="department_id" class="form-select">

                        <option disabled selected>กรุณาเลือกสาขาวิชา </option>
                        <?php foreach ($department as $department) : ?>
                            <option value="<?= $department['department_id'] ?>"><?= $department['department_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>สาขาวิชาเพิ่มเติ่ม</label>
                    <input type="text" name="department_other" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>ชื่อครุภัณฑ์ <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="col">
                    <label>ประเภท <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <select name="id_type" class="form-select">
                        <option disabled selected>กรุณาเลือกประเภท</option>
                        <?php foreach ($type_assets as $type_assets) : ?>
                            <option value="<?= $type_assets['id_type'] ?>"><?= $type_assets['name_type'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>ประเภทเพิ่มเติ่ม </label>
                    <input type="text" name="type_other" class="form-control">
                </div>
            </div>
            <div class="row mb-3">

                <div class="col">
                    <label>สถานที่ตั้ง <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <select name="id_localtion" class="form-select">
                        <option disabled selected>กรุณาเลือกสถานที่ตั้ง</option>
                        <?php foreach ($location as $location) : ?>
                            <option value="<?= $location['id_location'] ?>"><?= $location['name_location'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>สถานที่ตั้งเพิ่มเติ่ม </label>
                    <input type="text" name="localtion_other" class="form-control">
                </div>
                <div class="col">
                    <label>วิธีการที่ได้มา <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <select name="method_id" class="form-select">
                        <option disabled selected>กรุณาเลือกวิธีการที่ได้มา</option>
                        <?php foreach ($acquisition_method as $acquisition_method) : ?>
                            <option value="<?= $acquisition_method['method_id'] ?>"><?= $acquisition_method['acquisition_method_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>วิธีการที่ได้มาเพิ่มเติ่ม </label>
                    <input type="text" name="method_other" class="form-control">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label>ประเภทเงิน <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <select name="currency_id" class="form-select">
                        <option disabled selected>กรุณาเลือกประเภทเงิน</option>
                        <?php foreach ($currency_types as $currency_types) : ?>
                            <option value="<?= $currency_types['currency_id'] ?>"><?= $currency_types['currency_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>ประเภทเงินเพิ่มเติ่ม</label>
                    <input type="text" name="currency_other" class="form-control">
                </div>
            </div>
            <div class="row mb-3">

                <div class="col">
                    <label>ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <select name="supplier_id" class="form-select">
                        <option disabled selected>กรุณาเลือกชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค</option>
                        <?php foreach ($supplier as $s) : ?>
                            <option value="<?= $s['supplier_id'] ?>"><?= $s['contact_person'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col">
                    <label>ชื่อผู้ขาย/ผู้รับจ้าง/ผู้บริจาค เพิ่มเติ่ม </label>
                    <input type="text" name="supplier_other" class="form-control">
                </div>
                <div class="col">
                    <label>วันที่ซื้อ <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <div class="date-selector">
                        <input id="datePicker" name="purchase_date" class="form-control" type="date" onkeydown="return false" />
                        <span id="datePickerLbl" style="pointer-events: none;"></span>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>ราคา <span class="vnumgf" id="i4" aria-label="คำถามที่ต้องตอบ"> *</span></label>
                    <input type="number" name="purchase_price" class="form-control">
                </div>


                <div class="col">
                    <label>สถานะ</label>
                    <input type="text" name="status" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label>อายุการใช้งาน</label>
                    <input type="number" name="UsageLife" class="form-control">
                </div>
                <div class="col">
                    <label>อัตราค่าเสื่อมราคา</label>
                    <input type="number" name="DepreciationRate" class="form-control">
                </div>
            </div>
            <!-- เพิ่มจำนวนที่ต้องการเพิ่ม -->
            <div class="row mb-3">
                <div class="col">
                    <label>จำนวนที่ต้องการเพิ่ม</label>
                    <input type="number" name="quantity" class="form-control">
                </div>
            </div>
            <!-- ถ้ากรอกจำนวนที่ต้องการเพิ่มให้ช่องกรอกข้อมูล อัตโนมัติ-->
            <?php if (isset($_GET['quantity'])) : ?>
                <div class="row mb-3">
                    <div class="col">
                        <label>ข้อมูลอุปกรณ์ที่ต้องการเพิ่ม</label>
                        <input type="text" name="equipment_name" class="form-control" placeholder="ชื่ออุปกรณ์">
                    </div>
                    <div class="col">
                        <label>ราคา</label>
                        <input type="number" name="equipment_price" class="form-control" placeholder="ราคาอุปกรณ์">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>วันที่ซื้อ</label>
                        <input type="date" name="purchase_date" class="form-control">
                    </div>
                    <div class="col">
                        <label>อายุการใช้งาน</label>
                        <input type="number" name="warranty_period" class="form-control" placeholder="อายุการใช้งาน">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>สถานะ</label>
                        <select name="equipment_status" class="form-control">
                            <option value="">-- เลือกสถานะ --</option>
                            <option value="ใช้งานได้">ใช้งานได้</option>
                            <option value="ไม่สามารถใช้งานได้">ไม่สามารถใช้งานได้</option>
                        </select>
                    </div>
                    <div class="col">
                        <label>หมายเหตุ</label>
                        <textarea name="remark" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label>รูปภาพ</label>
                        <input type="file" name="equipment_image" class="form-control">
                    </div>
                </div>
            <?php endif; ?>




            <div class="form-group mt-2">
                <button type="submit" class="btn btn-primary btn-block" name="submit">ยืนยัน</button>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script>
        $("#datePicker").on("change", function(e) {

            displayDateFormat($(this), '#datePickerLbl', $(this).val());

        });

        function displayDateFormat(thisElement, datePickerLblId, dateValue) {

            $(thisElement).css("color", "rgba(0,0,0,0)")
                .siblings(`${datePickerLblId}`)
                .css({
                    position: "absolute",
                    left: "10px",
                    top: "3px",
                    width: $(this).width()
                })
                .text(dateValue.length == 0 ? "" : (`${getDateFormat(new Date(dateValue))}`));

        }

        function getDateFormat(dateValue) {

            let d = new Date(dateValue);

            // this pattern dd/mm/yyyy
            // you can set pattern you need
            let dstring = `${("0" + d.getDate()).slice(-2)}/${("0" + (d.getMonth() + 1)).slice(-2)}/${d.getFullYear()+543}`;

            return dstring;
        }
    </script>
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

    <!-- เพิ่มช่องกรอกข้อมูลเมื่อเพิ่มจำนวนที่ต้องการ -->




</body>

</html>