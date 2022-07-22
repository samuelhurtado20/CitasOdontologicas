<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

	<form class="p-5" id="formPaciente">
		<h1>Agregar Paciente</h1>        
        <div class="mb-3 row">
            <label for="identification" class="col-sm-2 col-form-label">Cédula</label>
            <div class="col-sm-6">
            <input type="number" name='identification' class="form-control" id="identification" placeholder="Cédula">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-6">
            <input type="text" name='name' class="form-control" id="name" placeholder="Nombres">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="lastName" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" name='lastName' id="lastName" placeholder="Apellidos">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="position" class="col-sm-2 col-form-label">Cargo</label>
            <div class="col-sm-6">
                <select class="form-select form-control" id="position" name="position" disabled>
                    <option value='Paciente' selected>Paciente</option>
                </select>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-6">
            <input type="number" class="form-control" id="phone" name='phone' placeholder="Teléfono">
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-primary form-control" href="<?php echo $routes->get('patientIndex')->getPath(); ?>"><i class="fas fa-arrow-left"></i> Atrás</a>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success form-control"><i class="fas fa-save"></i> Agregar</button>
            </div>
        </div>
    </form>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>

$('button').on('click', function() {
    if(!$("#formPaciente").valid()) return;

    var params = new FormData();
    params.append('id', 0);
    params.append('identification', $('#identification').val());
    params.append('name', $('#name').val());
    params.append('lastName', $('#lastName').val());
    params.append('position', $('#position').val());
    params.append('phone', $('#phone').val());
    params.append('dateOfBirth', $('#dateOfBirth').val());
    params.append('status', 1);

    $.ajax({
        type: 'POST',
        url: '/CitasOdontologicas/patientSave',
        data: params,
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        success: function (data) {
            //console.log(data)
            if (data.success) {
                window.location.replace("../../CitasOdontologicas/patientList/" + data.msg);
            }
            else {
                toastr.error(data.msg);
            }
        }
    });
});
</script>