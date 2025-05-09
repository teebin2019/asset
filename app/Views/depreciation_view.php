<!-- app/Views/depreciation_view.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ค่าเสื่อมราคา</title>
</head>

<body>
    <h1>ค่าเสื่อมราคา</h1>

    <p>Cost:
        <?= number_format($cost, 2) ?> บาท
    </p>

    <p>Useful Life:
        <?= $usefulLife ?> ปี
    </p>
    <p>Annual Depreciation:
        <?= number_format($annualDepreciation, 2) ?> บาท/ปี
    </p>

    <h2>Accumulated Depreciation</h2>
    <?php
    $startDate = new DateTime($startDate);
    $totalDaysInUse = 0; // จำนวนวันที่ใช้งาน
    
    for ($year = 1; $year <= $usefulLife + 1; $year++):
        // คำนวณจำนวนวันที่ใช้งานในปีนี้
        $nextStartDate = clone $startDate;
        $nextStartDate->modify('+1 year');

        $daysInUse = $nextStartDate->diff($startDate)->days;
        $totalDaysInUse += $daysInUse;


        $currentYearDate = $startDate->format('Y-m-d');


        ?>
        <?php if ($year == 1): ?>
            <p>Year
                <?= $year ?> (
                <?= $currentYearDate ?>):
                <?= number_format(($annualDepreciation)) ?> บาท
            </p>
        <?php elseif ($year == $usefulLife + 1): ?>
            <p>Year
                <?= $year ?> (
                <?= $currentYearDate ?>):
                <?= number_format(($annualDepreciation1)) ?>
            <?php else: ?>
            <p>Year
                <?= $year ?> (
                <?= $currentYearDate ?>):
                <?= number_format(($nextYearDepreciation)) ?> บาท
            </p>
        <?php endif; ?>
        <?php
        $startDate = $nextStartDate;
    endfor;
    ?>
</body>

</html>