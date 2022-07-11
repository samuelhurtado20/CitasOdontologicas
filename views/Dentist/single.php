<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

	<section class="p-5">
		<h1>Datos Odontólogo:</h1>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="id" placeholder="Id" value="<?php echo $dentist->id; ?>" disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="identification" class="col-sm-2 col-form-label">Cedula</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="identification" placeholder="Cedula" value="<?php echo $dentist->identification; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="name" placeholder="Nombres" value="<?php echo $dentist->name; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="lastName" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="lastName" placeholder="Apellidos" value="<?php echo $dentist->lastName; ?>">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="position" class="col-sm-2 col-form-label">Cargo</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="position" placeholder="Cargo" value="<?php echo $dentist->position; ?>">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Telefono</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="phone" placeholder="Telefono" value="<?php echo $dentist->phone; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <button type="submit" class="btn btn-primary form-control">Actualizar</button>
            </div>
            <div class="col-2">
                <a asp-action="Index" class="btn btn-success form-control" href="<?php echo $routes->get('dentistIndex')->getPath(); ?>">Back</a>
            </div>
        </div>
        <!-- <a class="btn btn-primary" href="<?php echo $routes->get('dentistIndex')->getPath(); ?>"><i class="fas fa-left"></i> Atras</a> -->
	<section>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>

$('button').on('click', function() { 
    var params = new FormData();
    params.append('id', $('#id').val());
    params.append('identification', $('#identification').val());
    params.append('name', $('#name').val());
    params.append('lastName', $('#lastName').val());
    params.append('position', $('#position').val());
    params.append('phone', $('#phone').val());
    params.append('dateOfBirth', $('#dateOfBirth').val());
    params.append('status', 1);

    $.ajax({
        type: 'POST',
        url: '/CitasOdontologicas/dentistUpdate',
        data: params,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            console.log(data)
            if (data.success) {
                window.location.replace("../../CitasOdontologicas/dentistList/" + data.msg);
                //toastr.success(data.msg);
                //datatable.ajax.reload();
            }
            else {
                toastr.error(data.msg);
            }
        }
    });
});
</script>