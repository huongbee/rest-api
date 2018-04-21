<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:42:50 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="source/img/favicon.html">

    <title>@yield('title')</title>
    <base href="{{asset('')}}"/>
    <!-- Bootstrap core CSS -->
    <link href="source/css/bootstrap.min.css" rel="stylesheet">
    <link href="source/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="source/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="source/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="source/css/owl.carousel.css" type="text/css">

      <!--right slidebar-->
      <link href="source/css/slidebars.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="source/css/style.css" rel="stylesheet">
    <link href="source/css/style-responsive.css" rel="stylesheet" />


	<script type="text/javascript" src="{{ url('source/ckeditor/ckeditor.js')}}"></script>
	<script type="text/javascript" src="{{ url('source/ckfinder/ckfinder.js')}}"></script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="source/js/html5shiv.js"></script>
      <script src="source/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!--header start-->
      @include('header')
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              @include('menu_left')
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              @yield('content')
          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      @include('footer')
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="source/js/jquery.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="source/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="source/js/jquery.scrollTo.min.js"></script>
    <script src="source/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="source/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="source/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="source/js/owl.carousel.js" ></script>
    <script src="source/js/jquery.customSelect.min.js" ></script>
    <script src="source/js/respond.min.js" ></script>

    <!--right slidebar-->
    <script src="source/js/slidebars.min.js"></script>

    <!--common script for all pages-->
    <script src="source/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="source/js/sparkline-chart.js"></script>
    <script src="source/js/easy-pie-chart.js"></script>
    <script src="source/js/count.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:43:32 GMT -->
</html>
