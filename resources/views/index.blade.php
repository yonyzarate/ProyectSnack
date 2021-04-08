<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <meta name="Author" content="Yony Zarate Paco">
    <title>Proyecto</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main stweassetlc for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
          <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Dashbord</a>
            </li>
           
        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">usuario </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="" method="POST" style="display: none;">
                      
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        @include('Plantilla.sidebar')

        <!-- Contenido principal  -->

        @yield('contenido')
        
       
        <!-- Fin del contenido principal -->
       
    </div>   

    <footer class="app-footer">
        <span><a href="http://www.webtraining-it.com/">Snack-will.com</a> &copy; 2019</span>
        <span class="ml-auto">Desarrollado por <a data="targer" href="https://tecsa-rs.blogspot.com/">Yony Zarate Paco</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins anassetd scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- Genesis'I assetmain scripts -->
    <script src="{{asset('js/template.js')}}"></script>
</body>
<script>
//  EDITAR CATEGORIA EN VENTANA MODAL
    $('#abrirmodalEditar').on('show.bs.modal',function(event){

        var button = $(event.relatedTarget)
        var tcnombre = button.data('nombre')
        var tcdescripcion = button.data('descripcion')
        var tnid_categoria = button.data('id_categoria')
        var modal = $(this)
        modal.find('.modal-body #nombre').val(tcnombre);
        modal.find('.modal-body #descripcion').val(tcdescripcion);
        modal.find('.modal-body #id_categoria').val(tnid_categoria);
    })
    // CAMBIAR ESTADO EN VENTANA MODAL
    $('#cambiarestado').on('show.bs.modal',function(event){

        var button = $(event.relatedTarget)
        var tnid_categoria = button.data('id_categoria')
        var modal = $(this)
        modal.find('.modal-body #id_categoria').val(tnid_categoria);
        })
        // EDITAR PRODUCTO EN VENTANA MODAL
        $('#proabrirmodalEditar').on('show.bs.modal',function(event){

        var button = $(event.relatedTarget)
        var tccodigo = button.data('codigo')
        var tcnombre = button.data('nombre')
        var tcprecioventa = button.data('precioventa')
        var tcstock = button.data('stock')
        var tnid_producto = button.data('id_producto')
        var tccategoria = button.data('categoria')
        var modal = $(this)
        modal.find('.modal-body #codigo').val(tccodigo);
        modal.find('.modal-body #nombre').val(tcnombre);
        modal.find('.modal-body #precioventa').val(tcprecioventa);
        modal.find('.modal-body #stock').val(tcstock);
        modal.find('.modal-body #categoria').val(tccategoria);
        modal.find('.modal-body #id_producto').val(tnid_producto);
        })

</script>

</html>