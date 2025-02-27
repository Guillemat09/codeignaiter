<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Dinámico</title>
    <link href="<?= base_url('assets/metronic/css/style.bundle.css') ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css" rel="stylesheet">
</head>
<body>
    <div class="kt-container">
        <h2>Calendario Dinámico</h2>
        <div id="calendar"></div>
    </div>

    <script src="<?= base_url('assets/metronic/js/scripts.bundle.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                selectable: true,
                editable: true,
                events: '<?= base_url('fetch-events') ?>',
                select: function (info) {
                    Swal.fire({
                        title: 'Añadir Evento',
                        input: 'text',
                        showCancelButton: true,
                        confirmButtonText: 'Guardar'
                    }).then((result) => {
                        if (result.value) {
                            $.post('<?= base_url('add-event') ?>', {
                                TITLE: result.value,
                                START_DATE: info.startStr
                            }, function () {
                                calendar.refetchEvents();
                            });
                        }
                    });
                },
                eventClick: function (info) {
                    Swal.fire({
                        title: '¿Eliminar este evento?',
                        showCancelButton: true,
                        confirmButtonText: 'Eliminar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?= base_url('delete-event/') ?>' + info.event.id,
                                type: 'DELETE',
                                success: function () {
                                    calendar.refetchEvents();
                                }
                            });
                        }
                    });
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>

