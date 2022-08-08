<?php  require_once APP_ROOT . '/views/Shared/header.php';
if($msg == 'none') echo "<span class='success d-none'>Operacion Exitosa</span>";
else echo "<span class='error d-none'>$msg</span>"; 
?>
    <div class="row">
        <div class="col-9">
            <h2 class="text-primary"> Odontólogos </h2>
        </div>
        <div class="col-2">
            <a class="btn btn-success form-control" href="../../<?php echo constant("URL_SUBFOLDER"); ?>/dentistAdd"> <i class="fas fa-plus"></i> Agregar nuevo </a>
        </div>
    </div>

    <br />

    <div class="p-4 border rounded tran">
        <table id="tblData" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <th>Cédula</th>
                <th>Nombres y Apellidos</th>
                <th>Cargo</th>
                <th>Teléfono</th>
                <th>Opciones</th>
            </thead>
            <tbody>
                <?php if(!empty($result)) { ?>
                    <?php foreach($result as $data) { ?>
                        <tr>
                            <td><?php echo $data['identification']; ?></td>
                            <td><?php echo $data['name'] . " " . $data['lastName']; ?></td>
                            <td><?php echo $data['position']; ?></td>
                            <td><?php echo $data['phone']; ?></td>
                            <td>
                                <a onclick="View(<?php echo $data['id']; ?>)" title="Ver detalles" class="text-info" style="cursor:pointer; text-decoration: none">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a onclick="Single(<?php echo $data['id']; ?>)" title="Actualizar" class="text-info" style="cursor:pointer; text-decoration: none">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a onclick="Delete(<?php echo $data['id']; ?>)" title="Eliminar" class="text-danger" style="cursor:pointer; text-decoration: none">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <br />
    <div class="row">
        <div class="col-2">
            <a class="btn btn-primary form-control" href="<?php echo $routes->get('homepage')->getPath(); ?>"><i class="fas fa-arrow-left"></i> Atrás</a>
        </div>
    </div>
    
<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>
    var datatable;

    $(document).ready(function () {
            $('#tblData').DataTable({
                "language": { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" }
            });
        if($('span.error').text()) toastr.error($('span.error').text());
        if($('span.success').text()) toastr.success($('span.success').text());
    });

    function View(id) {
        window.location.replace("../../CitasOdontologicas/dentistView/" + id);
    }

    function Single(id) {
        window.location.replace("../../CitasOdontologicas/dentistSingle/" + id);
    }

    function Delete(id) {
        swal({
            title: "Estas seguro de eliminar?",
            text: "Esta eliminacion es permanente.",
            icon: "warning",
            buttons: true,
            dangerMode: true
        }).then((yes) => {
            if (yes) {
                window.location.replace("../../CitasOdontologicas/dentistDelete/" + id);
            }
        });
    }
</script>