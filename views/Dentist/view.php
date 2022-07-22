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
            <label for="identification" class="col-sm-2 col-form-label">Cédula</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="identification" placeholder="Cedula" value="<?php echo $dentist->identification; ?>" disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nombres</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="name" placeholder="Nombres" value="<?php echo $dentist->name; ?>" disabled>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="lastName" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="lastName" placeholder="Apellidos" value="<?php echo $dentist->lastName; ?>" disabled>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="position" class="col-sm-2 col-form-label">Cargo</label>
            <div class="col-sm-6">
                <select class="form-select form-control" id="position" disabled>
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
            <input type="text" class="form-control" id="phone" placeholder="Teléfono" value="<?php echo $dentist->phone; ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-primary form-control" href="<?php echo $routes->get('dentistIndex')->getPath(); ?>"><i class="fas fa-arrow-left"></i> Atrás</a>
            </div>
        </div>
	<section>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>