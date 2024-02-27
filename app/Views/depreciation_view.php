<!-- app/Views/depreciation_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Depreciation Calculation</title>
</head>

<body>
    <h1>Depreciation Calculation</h1>

    <p>Cost: <?= number_format($cost, 2) ?> บาท</p>
    <p>Salvage Value: <?= number_format($salvageValue, 2) ?> บาท</p>
    <p>Useful Life: <?= $usefulLife ?> ปี</p>
    <p>Annual Depreciation: <?= number_format($annualDepreciation, 2) ?> บาท/ปี</p>

    <h2>Accumulated Depreciation</h2>
    <?php
    $startDate = new DateTime($startDate);
    $totalDaysInUse = 0; // จำนวนวันที่ใช้งาน

    for ($year = 1; $year <= $usefulLife; $year++) :
        // คำนวณจำนวนวันที่ใช้งานในปีนี้
        $nextStartDate = clone $startDate;
        $nextStartDate->modify('+1 year');
        $daysInUse = $nextStartDate->diff($startDate)->days;
        $totalDaysInUse += $daysInUse;

        $currentYearDate = $startDate->format('Y-m-d');
        // เปลี่ยน ค.ศ เป็น พ.ศ
        $currentYearDate = str_replace('-', '/', $currentYearDate);
        $annualDepreciation = $cost * $annualDepreciation / 100; // ค่าปัจจุบัน 
        $nextYearDepreciation = $cost * $nextYearDepreciation / 100; // ค่าปัจจุบัน 
    ?>
        <?php if ($year == 1) : ?>
            <p>Year <?= $year ?> (<?= $currentYearDate ?>): <?= number_format(($annualDepreciation * $totalDaysInUse) / 365, 2) ?> บาท</p>
        <?php else : ?>
            <p>Year <?= $year ?> (<?= $currentYearDate ?>): <?= number_format(($nextYearDepreciation * $totalDaysInUse) / 365, 2) ?> บาท</p>
        <?php endif; ?>
    <?php
        $startDate = $nextStartDate;
    endfor;
    ?>
</body>

</html>