<!DOCTYPE html>
<html>

<head>
    <title>แก้ไขข้อมูลวิธีการได้รับ</title>
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
        <form method="post" id="edit_create" name="edit_create" action="<?= site_url('/User_update') ?>">
            <div class="form-group">
                <input type="hidden" name="id" class="form-control" value="<?= $users_old['id'] ?>">
                <label>username</label>
                <input type="text" name="username" class="form-control" value="<?= $users_old['username'] ?>">
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="email" name="email" class="form-control" value="<?= $users_old['email'] ?>">
            </div>
            <div class="form-group">
                <label>role</label>
                <select name="role">
                    <option value="<?= $users_old['role'] ?>" hidden><?php if ($users_old['role'] == 0) : ?>
                            Admin
                        <?php else : ?>
                            Users
                        <?php endif; ?>
                    </option>
                    <option value="0">Admin</option>
                    <option value="1">Users</option>
                </select>
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
        if ($("#edit_create").length > 0) {
            $("#edit_create").validate({
                rules: {
                    username: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },

                },
                messages: {
                    username: {
                        required: "ยังไม่กรอกข้อมูล",
                    },
                    email: {
                        required: "ยังไม่กรอกข้อมูล",
                    },

                },
            })
        }
    </script>
</body>

</html>