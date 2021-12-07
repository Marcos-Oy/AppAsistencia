<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Fundación Música Para la integración</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
  <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">


</head>
<!-- /.SE OBTIENE EL VALOR DEL ROL QUE ESTA INGRESADO -->
<p type="hidden" {{$rol=Auth::user()->role }}></p>

<body class="hold-transition skin-black-light sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="{{url('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Fun</b>I</I></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Fundación Música para la integración</b></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Navegación</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->

            <!-- User Account: style can be found in dropdown.less 
                  Cuenta de usuario, de referencia es el cuadrito para cerrar sesión-->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <small class="bg-green">Conectado</small>
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                <small>:</small>
                <span class="hidden-xs">{{ Auth::user()->role }}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <p>
                    www.ElClubPinturillo.com - Desarrollando Software
                    <small>Gracias por preferirnos como su empresa<br></small>
                  </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-right">
                    <a href="{{url('/logout')}}" class="fa fa-power-off text-center"> Cerrar Sesion</a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>

      </nav>

    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu">
          <li class="header"></li>



          <li id="liEscritorio">
            <a href="{{url('home')}}">
              <i class="fa fa-home"></i><span>Home</span>
              <small class="label pull-right bg-blue">Ir</small>
            </a>
          </li>



          @if($rol == 'Administrador' || $rol == 'Coordinador'||$rol == 'Docente')
          <li>
            <a href="{{url('Actividades')}}">
              <i class="fa fa-book"></i> <span>Actividades</span>
              <small class="label pull-right bg-blue">Ir</small>
            </a>
          </li>
          @endif



          @if($rol == 'Administrador' || $rol == 'Coordinador')
          <li>
            <a href="{{url('seguridad/usuario')}}">
              <i class="fa fa-user"></i> <span>Personas</span>
              <small class="label pull-right bg-blue">Ir</small>
            </a>
          </li>
          @endif



          @if($rol == 'Administrador' || $rol == 'Coordinador')
          <li>
            <a href="{{url('Establecimiento')}}">
              <i class="fa fa-university"></i> <span>Establecimientos</span>
              <small class="label pull-right bg-blue">Ir</small>
            </a>
          </li>
          @endif



          @if($rol == 'Administrador' || $rol == 'Coordinador')
          <li>
            <a href="{{url('Banco')}}">
              <i class="fa fa-money"></i> <span>Banco</span>
              <small class="label pull-right bg-blue">Ir</small>
            </a>
          </li>
          @endif



          @if($rol == 'Administrador' || $rol == 'Coordinador' )
          <li>
            <a href="{{url('CuentaPago')}}">
              <i class="fa fa-money"></i> <span>Cuentas de pago</span>
              <small class="label pull-right bg-blue">Ir</small>
            </a>
          </li>
          @endif


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>





    <!--Contenido-->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Fundación Música para la integración</h3>
                <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

                  <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                    <!--Contenido-->
                    @yield('contenido')
                    <!--Fin Contenido-->
                  </div>
                </div>

              </div>
            </div><!-- /.row -->
          </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->

  </section><!-- /.content -->
  </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <footer class="main-footer">
    <strong>Copyright &copy; <a href="https://www.ipchile.cl/"> El Club Pinturillo</a>.</strong> Todos los derechos
    reservados.
  </footer>


  <!-- jQuery 2.1.4 -->
  <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
  @stack('scripts')
  <!-- Bootstrap 3.3.5 -->
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('js/app.min.js')}}"></script>

</body>

</html>