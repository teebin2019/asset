<!DOCTYPE html>
<html>

<head>
    <title>แก้ไขข้อมูลผู้ซื้อขาย</title>
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
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center">แก้ไขข้อมูลผู้ซื้อขาย</h3>
        <form method="post" id="add_create" name="add_create" action="<?= site_url('/Suppliers_update') ?>">
            <div class="form-group">
                <label>ชื่อผู้ซื้อ/ผู้ขาย</label>
                <input type="hidden" name="supplier_id" class="form-control" value="<?= $suppliers['supplier_id'] ?>">
                <input type="text" name="contact_person" class="form-control" value="<?= $suppliers['contact_person'] ?>">
            </div>
            <div class="form-group">
                <label>อีเมลล์</label>
                <input type="email" name="contact_email" class="form-control" value="<?= $suppliers['contact_email'] ?>">
            </div>
            <div class="form-group">
                <label>เบอร์โทรศัพท์</label>
                <input type="text" name="phone_number" class="form-control" value="<?= $suppliers['phone_number'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="form-label">ที่อยู่</label>
                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" value="<?= $suppliers['address'] ?>"><?= $suppliers['address'] ?></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">ยืนยัน</button>
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
                    contact_person: {
                        required: true,
                        // ต้องมีความยาวอย่างน้อย 5 ตัว
                        minlength: 5,
                    },

                },
                messages: {
                    contact_person: {
                        required: "ยังไม่กรอกข้อมูล",
                        minlength: "กรอกข้อมูลต้องมีความยาวอย่างน้อย 5 ตัวอักษร",
                    },

                },
            })
        }
    </script>
</body>

</html>