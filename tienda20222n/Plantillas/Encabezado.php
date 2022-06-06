<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Tienda</title> 

</head>

<body  style="background: url('fond/fondo10.jpg') no-repeat; background-size:cover">


    <!--menu-->

    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid" style="font-size: 1.3rem;">
            <a class="navbar-brand" href="index.php">TIENDA</a>
            <ul class="navbar-nav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info" >PRODUCTOS</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split"  data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="formularioproduc.php">Ingresar</a></li>
                            <li><a class="dropdown-item" href="tablaproductos.php">Tabla</a></li>

                        </ul>
                    </div>

        <li class="nav-item">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">CLIENTES</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="formulariocliente.php">Ingresar</a></li>
                            <li><a class="dropdown-item" href="tablacliente.php">Tabla</a></li>

                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info">USUARIOS</button>
                        <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">

                            <li><a class="dropdown-item" href="registro.php">Ingresar</a></li>
                            <li><a class="dropdown-item" href="listausuarios.php">Tabla</a></li>

                        </ul>
                    </div>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="factura.php">Factura</a>
                </li>
             
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Regresar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Salir</a>

                </li>
                </li>
                
            </ul>
        </div>

    </nav>
    <br>