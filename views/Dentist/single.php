<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

    <form class="p-5" id="formOdontologo">
		<h1>Datos Odontólogo:</h1>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">Id</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="id" placeholder="Id" value="<?php echo $dentist->id; ?>" disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="identification" class="col-sm-2 col-form-label">Cédula</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="identification" name="identification" placeholder="Cedula" value="<?php echo $dentist->identification; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombres" value="<?php echo $dentist->name; ?>">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="lastName" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Apellidos" value="<?php echo $dentist->lastName; ?>">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="position" class="col-sm-2 col-form-label">Cargo</label>
            <div class="col-sm-6">
                <select class="form-select form-control" id="position" name="position">
                    <option value="<?php echo $dentist->position; ?>"><?php echo $dentist->position; ?></option>
                    <option value="Cirugía e implantologia">Cirugía  e implantologia</option>
                    <option value="Ortodoncia">Ortodoncia</option>
                    <option value="Rehabilitación oral">Rehabilitación oral</option>
                    <option value="Odontología">Odontología</option>
                </select>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono" value="<?php echo $dentist->phone; ?>">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $dentist->userEmail; ?>">
            </div>
        </div>
        
        <!-- <div class="mb-3 row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $dentist->userPassword; ?>">
            </div>
        </div> -->

        <div class="row">
            <div class="col-2">
                <a asp-action="Index" class="btn btn-primary form-control" href="<?php echo $routes->get('dentistIndex')->getPath(); ?>"><i class="fas fa-arrow-left"></i> Atrás</a>
            </div>
            <div class="col-2">
                <button type="button" class="btn btn-success form-control"><i class="fas fa-save"></i> Actualizar</button>
            </div>
        </div>

    </form>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>

$('button').on('click', function() {
    if(!$("#formOdontologo").valid()) return;
    
    var params = new FormData();
    params.append('id', $('#id').val());
    params.append('identification', $('#identification').val());
    params.append('name', $('#name').val());
    params.append('lastName', $('#lastName').val());
    params.append('position', $('#position').val());
    params.append('phone', $('#phone').val());
    params.append('dateOfBirth', $('#dateOfBirth').val());
    params.append('status', 1);
    params.append('userEmail', $('#email').val());
    // params.append('userPassword', $('#password').val());

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