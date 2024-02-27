<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เก็บข้อมูลครุภัณฑ์</title>
    <link rel="stylesheet" href="<?= base_url('frontend/css/index.css') ?>">
    <link rel="stylesheet" href="<?= base_url('frontend/css/footter.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
<body>
    <!-- แทบด้นบน -->
    <?= $this->include('frontend/headder') ?>

    <!-- เนื้อหา -->
    <?= $this->include('frontend/hero') ?>

    <!-- footter -->
    <?= $this->include('frontend/footter') ?>

</body>
</html>