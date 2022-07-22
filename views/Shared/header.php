<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo constant("SITE_NAME"); ?></title>

    <link href="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/lib/bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../../<?php echo constant("URL_SUBFOLDER"); ?>/public/css/site.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>
<body>
    <header class="">
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark bg-primary border-bottom box-shadow mb-3">
            <div class="container">
                <a class="navbar-brand" href="<?php echo $routes->get('homepage')->getPath(); ?>"><?php echo constant("SITE_NAME"); ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex justify-content-between">
                    <ul class="navbar-nav flex-grow-1">

                        <li class="nav-item">
                            <a class="nav-link" href="../../<?php echo constant("URL_SUBFOLDER"); ?>/dentist">Odontólogos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../<?php echo constant("URL_SUBFOLDER"); ?>/patient">Pacientes</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <main role="main" class="pb-3">