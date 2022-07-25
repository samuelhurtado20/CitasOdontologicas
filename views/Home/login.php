<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

    <!-- <h1><?php echo constant('SITE_NAME'); ?></h1> -->
    <br />
    <div class="row">
        <div class="col-6">
            <form class="p-5" id="formLogin">
                <h2>Ingresar</h2>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" name='email'>
                    <!-- <small id="email" class="form-text text-muted">email</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name='password'>
                </div>
                <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <br />
                <button type="button" onclick="Login()" class="btn btn-primary">Validar</button>
            </form>
        </div>
    </div>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>
    //var datatable;

    $(document).ready(function () {
        // $('#tblData').DataTable({
        //     "language": { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json" }
        // });
        if($('span.error').text()) toastr.error($('span.error').text());
        if($('span.success').text()) toastr.success($('span.success').text());
    });

    function Login() {
        if(!$("#formLogin").valid()) return;
        var email = $('#email').val();
        var pass  = $('#password').val();
        console.log(email);
        console.log(pass);
        window.location.replace("../../CitasOdontologicas/login/" + email + "/" + pass);
    }

    // function Single(id) {
    //     window.location.replace("../../CitasOdontologicas/dentistSingle/" + id);
    // }

    // function Delete(id) {
    //     swal({
    //         title: "Estas seguro de eliminar?",
    //         text: "Esta eliminacion es permanente.",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true
    //     }).then((yes) => {
    //         if (yes) {
    //             window.location.replace("../../CitasOdontologicas/dentistDelete/" + id);
    //         }
    //     });
    // }
</script>