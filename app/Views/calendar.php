<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<?= base_url('caladar/fonts/icomoon/style.css') ?>">

    <link href="<?= base_url('caladar/fullcalendar/packages/core/main.css') ?>" rel='stylesheet' />
    <link href="<?= base_url('caladar/fullcalendar/packages/daygrid/main.css') ?>" rel='stylesheet' />


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('caladar/css/bootstrap.min.css') ?>">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('caladar/css/style.css') ?>">

    <title>ปฎิทิน</title>
</head>

<body>

    <div class="content">
        <h3 class="text-center">กิจกรรมคณะวิศวกรรมศาสตร์</h3>
        <div id='calendar'></div>
    </div>



    <script src="<?= base_url('caladar/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="<?= base_url('caladar/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('caladar/js/bootstrap.min.js') ?>"></script>

    <script src="<?= base_url('caladar/fullcalendar/packages/core/main.js') ?>"></script>
    <script src="<?= base_url('caladar/fullcalendar/packages/interaction/main.js') ?>"></script>
    <script src="<?= base_url('caladar/fullcalendar/packages/daygrid/main.js') ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            const date = new Date()



            var calendar = new FullCalendar.Calendar(calendarEl, {

                locale: "th",
                plugins: ['interaction', 'dayGrid'],
                // ค่าเริ่มต้ม วันนี้
                defaultDate: date,
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?php foreach ($events as $event) : ?> {
                            title: '<?= $event['title'] ?>',
                            start: '<?= $event['start_date'] ?>',
                            end: '<?= $event['end_date'] ?>',
                        },
                    <?php endforeach; ?>

                ]
            });

            calendar.render();
        });
    </script>

</body>

</html>