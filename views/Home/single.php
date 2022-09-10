<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

<div class="container py-5" id="page-container">
    <div class="row tran">
        <div class="col-md-6">
            <div class="cardt rounded-0 shadow">
            <form action="/CitasOdontologicas/eventSave" method="post" id="schedule-form">
                <div class="card-header bg-gradient bg-primary text-light">
                    <h5 class="card-title">Schedule Form</h5>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                            <input type="hidden" name="id" value="">
                            <div class="form-group mb-2">
                                <label for="title" class="control-label">Tiulo</label>
                                <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" value="<?php echo $event->title; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="description" class="control-label">Descripcion</label>
                                <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" value="<?php echo $event->description; ?>" required></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="start_datetime" class="control-label">Inicio</label>
                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" value="<?php echo $event->start_datetime; ?>" required>
                            </div>
                            <div class="form-group mb-2">
                                <label for="end_datetime" class="control-label">Fin</label>
                                <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" value="<?php echo $event->end_datetime; ?>" required>
                            </div>
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

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>
