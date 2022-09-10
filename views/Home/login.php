<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>
    <div class="row">
        <div class="col-12">
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <img class="img-responsive" src="public/img/image1.jpeg" />
        </div>
        <div class="col-4">
            <form class="p-0" id="formLogin">
                <h2>Ingresar</h2>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="email" name='email'>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="password" name='password'>
                </div>
                <br />
                <button type="button" onclick="Login()" class="btn btn-primary">Validar</button>
            </form>
        </div>
    </div>

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>
    $(document).ready(function () {
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
</script>