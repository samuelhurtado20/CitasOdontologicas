
        </main>
    </div>

    <footer class="border-top footer bg-dark text-white">        
        <div class="row container">
            <div class="col-10">
                &copy; 2022 - <?php echo constant("SITE_NAME"); ?>
            </div>
            <div class="col-2">
                <a class="btn btn-primary form-control <?php  if(!isset($_SESSION['login'])) echo 'd-none'; ?>" href="<?php echo $routes->get('logout')->getPath(); ?>">
                    <i class="fas fa-arrow-left"></i> 
                    Salir
                </a>
            </div>
        </div>
    </footer>

    <script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/lib/jquery/dist/jquery.min.js" type="text/javascript"></script>
    <script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/js/site.js" asp-append-version="true"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/e19c476714.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <script type="text/javascript">
        

$("#formOdontologo").validate({
    rules: {
        identification: {
            required: true,
            minlength: 6
        },
        name: {
            required: true,
            minlength: 3
        },
        lastName: {
            required: true,
            minlength: 3
        },
        position: {
            required: true
        },
        phone: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        identification: {
            required: "Ingrese la Cédula",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        name: {
            required: "Ingrese el Nombre",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        lastName: {
            required: "Ingrese el Apellido",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        position: {
            required: "Seleccione un cargo"
        },
        phone: {
            required: "Ingrese el Teléfono",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        }
    }
});

$("#formPaciente").validate({
    rules: {
        identification: {
            required: true,
            minlength: 6
        },
        name: {
            required: true,
            minlength: 3
        },
        lastName: {
            required: true,
            minlength: 3
        },
        position: {
            required: true
        },
        phone: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        identification: {
            required: "Ingrese la Cédula",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        name: {
            required: "Ingrese el Nombre",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        lastName: {
            required: "Ingrese el Apellido",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        position: {
            required: "Seleccione un cargo"
        },
        phone: {
            required: "Ingrese el Teléfono",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        }
    }
});

$("#formLogin").validate({
    rules: {
        email: {
            required: true,
            minlength: 6
        },
        password: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        email: {
            required: "Ingrese un email",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        },
        password: {
            required: "Ingrese un password",
            minlength: jQuery.validator.format("¡Se requieren al menos {0} caracteres!")
        }
    }
});
    </script>
</body>
</html>