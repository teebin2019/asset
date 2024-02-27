<!DOCTYPE html>
<html>

<head>
    <title>เพิ่มข้อมูลวิธีการที่ได้มา</title>
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
        <h3 class="text-center">เพิ่มข้อมูลวิธีการที่ได้มา</h3>
        <form method="post" id="add_create" name="add_create" action="<?= site_url('/Method_submit') ?>">
            <div class="form-group">
                <label>ชื่อ</label>
                <input type="text" name="acquisition_method_name" class="form-control">
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
                    acquisition_method_name: {
                        required: true,
                        // ต้องมีความยาวอย่างน้อย 5 ตัว
                        minlength: 5,
                    },

                },
                messages: {
                    acquisition_method_name: {
                        required: "ยังไม่กรอกข้อมูล",
                        minlength: "กรอกข้อมูลต้องมีความยาวอย่างน้อย 5 ตัวอักษร",
                    },

                },
            })
        }
    </script>
</body>

</html>