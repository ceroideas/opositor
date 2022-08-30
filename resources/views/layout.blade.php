<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Administración Opositor Bomberos @yield('title_page')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/template_content/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/template_content/css/bootstrap-reset.css') }}" rel="stylesheet">
    <!--external css-->
    <link href="{{ asset('/template_content/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('/template_content/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css') }}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{ asset('/template_content/css/owl.carousel.css') }}" type="text/css">

    <!--right slidebar-->
    <link href="{{ asset('/template_content/css/slidebars.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="{{ asset('/template_content/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/template_content/css/style-responsive.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">



    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    <link href="{{ asset('/template_content/assets/advanced-datatable/media/css/demo_page.css') }}" rel="stylesheet" />
    <link href="{{ asset('/template_content/assets/advanced-datatable/media/css/demo_table.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('/template_content/assets/data-tables/DT_bootstrap.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset('/template_content/dropify/dist/css/dropify.min.css') }}"> -->
    <link href="{{ asset('/template_content/bootstrap-switch/bootstrap-switch.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/template_content/pnotify/PNotifyBrightTheme.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" integrity="sha256-FdatTf20PQr/rWg+cAKfl6j4/IY3oohFAJ7gVC3M34E=" crossorigin="anonymous" />
    <link href="{{ asset('/template_content/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/template_content/assets/bootstrap-datepicker/css/datepicker.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/template_content/assets/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" />
    <script src="{{ asset('/template_content/js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/template_content/css/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
	@yield('css')
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      <header class="header white-bg">
              <div class="sidebar-toggle-box">
                  <i class="fa fa-bars"></i>
              </div>
            <!--logo start-->
            <a href="{{ url('/admin') }}" class="logo">OPOSITOR<span>BOMBEROS</span></a>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    {{-- <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li> --}}
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username">Administrador</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li><a href="{{url('/admin/temas-show')}}"><i class="fa fa-cog"></i> Administrar Temas</a></li>
                            <li class="text-center"><a href="#"><i class="fa fa-key"></i> Salir</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div style="z-index: 2" id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                  <li>
                      <a class="active" href="{{url('/')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Inicio</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                        {{-- <i class="fa fa-globe"></i> --}}
                        <span>Menu 1</span>
                      </a>
                      <ul class="sub">
                          <li>
                              <a href="#">
                                  Submenu 1
                              </a>
                          </li>
                      </ul>
                  </li>                    

                  <li>
                      <a href="#">
                          Salir
                      </a>
                  </li>
                </ul>
              </ul>
              <!-- sidebar menu end-->
            </div>
        </aside>
      <!--sidebar end-->
      <!--main content start-->
	<main>
	      @yield('body')
	</main>
      
      <!--main content end-->

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2022 &copy; FlatLab.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="{{ asset('/template_content/js/bootstrap.min.js') }}"></script>
    <script class="include" type="text/javascript" src="{{ asset('/template_content/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('/template_content/js/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('/template_content/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/template_content/js/jquery.sparkline.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/template_content/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js') }}"></script>
    <script src="{{ asset('/template_content/js/owl.carousel.js') }}" ></script>
    <script src="{{ asset('/template_content/js/jquery.customSelect.min.js') }}" ></script>
    <script src="{{ asset('/template_content/js/respond.min.js') }}" ></script>

    <!--right slidebar-->
    <script src="{{ asset('/template_content/js/slidebars.min.js') }}"></script>

    <!--common script for all pages-->

    <!--script for this page-->
    <script src="{{ asset('/template_content/js/sparkline-chart.js') }}"></script>
    <script src="{{ asset('/template_content/js/easy-pie-chart.js') }}"></script>
    <script src="{{ asset('/template_content/js/count.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js" integrity="sha256-vucLmrjdfi9YwjGY/3CQ7HnccFSS/XRS1M/3k/FDXJw=" crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="{{ asset('/template_content/assets/advanced-datatable/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/template_content/assets/data-tables/DT_bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/pnotify/PNotify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/template_content/assets/ckeditor/ckeditor.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript" src="{{ asset('/template_content/assets/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/template_content/assets/bootstrap-daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/template_content/assets/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('/template_content/js/common-scripts.js') }}"></script>
    {{-- <script src="{{ asset('/template_content/js/advanced-form-components.js') }}"></script> --}}
  <script>

  </script>
    @yield('scripts')
  </body>

</html>
