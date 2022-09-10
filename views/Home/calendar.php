<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

<div class="container py-5" id="page-container">
    <div class="row tran">
        <div class="col-md-9">
            <div id="calendar"></div>
        </div>
        <div class="col-md-3">
            <div class="cardt rounded-0 shadow">
            <form action="/CitasOdontologicas/eventSave" method="post" id="schedule-form">
                <div class="card-header bg-gradient bg-primary text-light">
                    <h5 class="card-title">Programar cita</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                            <input type="hidden" name="id" value="">
                            <div class="form-group mb-2">
                                <label for="title" class="control-label">Titulo</label>
                                <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" value="" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="description" class="control-label">Descripcion</label>
                                <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" value="" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="start_datetime" class="control-label">Fecha y Hora de la cita</label>
                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" value="" required>
                            </div>
                            <!-- <div class="form-group mb-2">
                                <label for="end_datetime" class="control-label">Fin</label>
                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" value="" required>
                            </div> -->
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <button class="btn btn-primary btn-sm rounded-0" id='saveEvent' type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                        <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                    </div>
                </div>                
            </form>
            </div>
        </div>
    </div>
</div>

<!-- Event Details Modal -->
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0">
            <div class="modal-header rounded-0">
                <h5 class="modal-title">Detalles de la cita</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body rounded-0">
                <div class="container-fluid">
                    <dl>
                        <dt class="text-muted">Title</dt>
                        <dd id="title" class="fw-bold fs-4"></dd>
                        <dt class="text-muted">Description</dt>
                        <dd id="description" class=""></dd>
                        <dt class="text-muted">Start</dt>
                        <dd id="start" class=""></dd>
                        <dt class="text-muted">End</dt>
                        <dd id="end" class=""></dd>
                    </dl>
                </div>
            </div>
            <div class="modal-footer rounded-0">
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-sm rounded-0" id="edit" data-id="">Edit</button>
                    <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/js/calendar.js" type="text/javascript"></script>

<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>');
    //console.log(scheds)

$('#saveEvent').on('click', function() {
    //if(!$("#formEvent").valid()) return;

    var params = new FormData();
    params.append('id', 0);
    params.append('title', $('#title').val());
    params.append('description', $('#description').val());
    params.append('start_datetime', $('#start_datetime').val());
    params.append('end_datetime', $('#end_datetime').val());
    //console.log(params)
    $.ajax({
        type: 'POST',
        url: '/CitasOdontologicas/eventSave',
        data: params,
        cache: false,
        contentType: true,
        processData: true,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            if (data.success) {
                window.location.replace("../../CitasOdontologicas/Calendar");
                //location.reload();
            }
            else {
                //window.location.replace("../../CitasOdontologicas/Calendar");
                toastr.error(data.msg);
            }
        }
    });
                //location.reload();
});
</script>