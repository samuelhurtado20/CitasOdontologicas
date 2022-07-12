<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

	<section class="p-5">
		<h1>Datos Odontólogo:</h1>        
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
            <input type="text" class="form-control" id="position" placeholder="Cargo" value="<?php echo $dentist->position; ?>" disabled>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="phone" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="phone" placeholder="Telefono" value="<?php echo $dentist->phone; ?>" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <a class="btn btn-success form-control" href="<?php echo $routes->get('dentistIndex')->getPath(); ?>">Atrás</a>
            </div>
        </div>
	<section>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>